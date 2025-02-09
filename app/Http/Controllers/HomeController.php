<?php

namespace App\Http\Controllers;

use App\Mail\BookingPaymentDetails;
use App\Models\GymProgress;
use App\Models\MembershipDetail;
use App\Models\MemberVisit;
use App\Models\Payment;
use App\Models\PaymentMethod;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\ServiceCategory;
use App\Models\User;
use App\Models\Workout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Spatie\Permission\Models\Role;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('homepage');
    }

    public function dashboard()
    {
        $userDetail = MembershipDetail::where('client_id', Auth::user()->id)->first();
        $workoutProgress = GymProgress::where('user_id', Auth::id())->orderBy('progress_date', 'desc')->limit(5)->get();
        if ($userDetail) {
            $timelog = MemberVisit::where('client_rfid_id', $userDetail->rfid_number)
                ->orderBy('created_at', 'desc')
                ->limit(3)
                ->get();
        } else {
            $timelog = collect(); // Empty collection to prevent errors in the view
        }

        $progressData = GymProgress::where('user_id', auth()->id())
            ->orderBy('progress_date', 'asc')
            ->get(['progress_date', 'weight', 'reps', 'bmi']);

        // Prepare data for Chart.js
        $labels = $progressData->pluck('progress_date'); // x-axis labels
        $weightData = $progressData->pluck('weight');    // y-axis: weight
        $repsData = $progressData->pluck('reps');        // y-axis: reps
        $bmiData = $progressData->pluck('bmi');
        // y-axis: BMI
        return view('dashboard', compact('timelog', 'workoutProgress', 'labels', 'weightData', 'repsData', 'bmiData'));
    }

    public function bookings()
    {

        $reservations = Reservation::where('user_id', Auth::user()->id)->get();
        return view('booking', compact('reservations'));
    }

    public function gymProgress()
    {
        $workoutProgress = GymProgress::where('user_id', Auth::id())->orderBy('progress_date', 'desc')->get();
        return view('myProgress', compact('workoutProgress'));
    }

    public function viewProfile()
    {
        // $profile = MembershipDetail::where('client_id', '=', Auth::user()->id)->firstOrFail();
        $profile = User::where('id', Auth::id())->firstOrFail();
        // dd($profile);
        return view('member.profile', compact('profile'));
    }

    public function updateProfile(Request $request)
    {
        // dd($request->all());
        // Fetch the user profile
        $memberDetail = MembershipDetail::firstOrCreate(['client_id' => Auth::id()]);
        $user = User::where('id', Auth::id())->firstOrFail();

        // Validate input fields
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'profileEmail' => ['required', 'email', 'max:255'],
            'birthdate' => ['required', 'date', 'before:today'],
            'gender' => ['required', 'string'], // Adjust the values as per your requirement
            'contact_number' => ['required', 'string', 'max:13', 'regex:/^[\d\s\-+()]*$/'], // Allows phone number formats
            'address' => ['required', 'string', 'max:255'],
            'height' => ['nullable', 'numeric', 'min:1'], // Assuming height in cm or other unit
            'weight' => ['nullable', 'numeric', 'min:1'], // Assuming weight in kg or other unit
            'medical_info' => ['nullable', 'string', 'max:255'],
            'guardian' => ['nullable', 'string', 'max:255'],
        ]);

        // Update Client Profile Fields
        $user->name = $request->name;
        $user->email = $request->profileEmail;
        // If password fields are provided and valid, hash and update the password
        if ($request->filled('profilePassword')) {
            $user->password = Hash::make($request->profilePassword);
        }

        // Update Gym Details Fields
        $memberDetail->phone = $request->contact_number;
        $memberDetail->address = $request->address;
        $memberDetail->birthdate = $request->birthdate;
        $memberDetail->medical_info = $request->medical_info;
        $memberDetail->civil_status = $request->civil_status;
        $memberDetail->gender = $request->gender;
        $memberDetail->guardian = $request->guardian;

        // Save updated user details
        $memberDetail->save();
        $user->save();


        // Redirect back with a success message
        return redirect()->route('profile')->with('success', 'Profile updated successfully.');
    }

    public function bookNow()
    {
        $profile = User::where('id',  Auth::id())->first();
        $serviceCategories = ServiceCategory::all();
        $paymentMethods = PaymentMethod::all();
        return view('book_now', compact('profile', 'serviceCategories', 'paymentMethods'));
    }

    public function bookNowPost(Request $request)
    {
        \Log::info($request->all());
        try {  // Validate the incoming request
            DB::beginTransaction();
            $request->validate([
                'service_category' => 'required',
                'service_name' => 'required',
                'formTime' => 'required',
                'payment_method' => 'required',
            ]);

            // Create a new service reservation record
            $reservation = new Reservation();
            $reservation->user_id = Auth::id();
            $reservation->service_category_id = $request->input('service_category');
            $reservation->service_name_id = $request->input('service_name');
            $reservation->reservation_date = $request->input('selected_date');
            $reservation->reservation_time = $request->input('formTime');
            $reservation->payment_method = $request->input('payment_method');

            // You can also add hidden fields if needed
            if ($request->filled('name')) {
                $reservation->name = $request->input('name');
            } else {
                $reservation->name = $request->input('hidden_name');
            }

            if ($request->filled('email')) {
                $reservation->email = $request->input('email');
            } else {
                $reservation->email = $request->input('hidden_email');
            }

            if ($request->filled('phone')) {
                $reservation->phone = $request->input('phone');
            } else {
                $reservation->phone = $request->input('hidden_phone');
            }


            // Calculate the total amount or handle payment-related logic
            $service_price = $this->getServicePrice($request->input('service_name'));
            $reservation->total_amount = $service_price; // Example, adjust based on logic
            // $reservation->total_amount = 0; // Example, adjust based on logic

            // Save the reservation
            $reservation->save();

            // Create a payment invoice
            Payment::create([
                'user_id' => Auth::id(),
                'reservation_id' => $reservation->id,
                'payment_method' => $reservation->payment_method,
                'amount' => $reservation->total_amount,
                'payment_status' => 'Pending',
            ]);

            $payment_details = PaymentMethod::where('id', $reservation->payment_method)->first();

            Mail::to(Auth::user()->email)->send(new BookingPaymentDetails($reservation, $payment_details));

            DB::commit(); // Commit transaction
            // return view('book_now');
            return response()->json(['success' => true, 'redirect_url' => route('booked.now')]);

        } catch (\Exception $e) {
            DB::rollBack(); // Rollback transaction
            Log::error('Donation error: ' . $e->getMessage());
            Log::error('Booking error: ' . $e->getMessage() . ' on line ' . $e->getLine());
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function bookedNow()
    {
        return view('book_now_success');
    }



    private function getServicePrice($serviceId)
    {
        // Example of getting service price (adjust as per your model)
        $service = Service::find($serviceId);
        return $service->price ?? 0; // Default to 0 if price not found
    }

    // public function workoutView(Request $request)
    // {

    //     // Retrieve the filter values from the request
    //     $skillLevel = $request->get('excercise_type', 'all');
    //     $bodyPart = $request->get('body-part', 'all');

    //     // Query the workouts based on the selected filters
    //     $workouts = Workout::query();

    //     if ($skillLevel !== 'all') {
    //         $workouts->where('experience_level', $skillLevel);
    //     }

    //     if ($bodyPart !== 'all') {
    //         $workouts->where('target_muscle_group', $bodyPart);
    //     }

    //     // Get the results
    //     $workouts = $workouts->get();

    //     // Generate YouTube thumbnails
    //     foreach ($workouts as $workout) {
    //         // Assuming `youtube_url` is a column in your workouts table
    //         if ($workout->video_url) {
    //             $workout->youtube_thumbnail = $this->getYouTubeThumbnail($workout->video_url);
    //         } else {
    //             $workout->youtube_thumbnail = null;
    //         }
    //     }

    //     return view('workouts', compact('workouts'));
    // }

    // public function getYouTubeThumbnail($youtubeUrl) {
    //     parse_str(parse_url($youtubeUrl, PHP_URL_QUERY), $queryParams);
    //     if (isset($queryParams['v'])) {
    //         $videoId = $queryParams['v'];
    //         return "https://img.youtube.com/vi/{$videoId}/hqdefault.jpg";
    //     }
    //     return null;
    // }

    // public function workoutDetails($workoutId)
    // {
    //     $workout = Workout::find($workoutId);
    //     return view('workouts_page', compact('workout'));
    // }

}
