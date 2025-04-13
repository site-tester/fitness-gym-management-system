<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\MembershipDetail;
use App\Models\MemberVisit;
use App\Models\User;
use App\Notifications\GymWorkoutNotification;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected function authenticated(Request $request, $user)
    {
        session()->flash('login_success', 'Welcome back, ' . $user->name . '!');

        if ($user->hasRole('admin')) {
            return redirect()->route('backpack.dashboard'); // Redirect to admin dashboard
        } elseif ($user->hasRole('trainer')) {
            return redirect()->route('trainer.dashboard'); // Redirect to trainer dashboard
        } elseif ($user->hasRole('member')) {
            // $this->checkWorkoutReminder(Auth::id()); // Call the reminder function
            return redirect()->route('landing'); // Redirect to member dashboard
        }

        // Default redirection if no role is matched
        return redirect()->route('home'); // Or wherever you want to send them
    }

    public function checkWorkoutReminder($userId)
    {

        $userId = MembershipDetail::where('client_id', $userId)->first();
        // dd($userId);
        $today = now()->toDateString();
        $attendance = MemberVisit::where('client_rfid_id', $userId->rfid_number)
            ->whereDate('time_in', $today)
            ->exists();
        // Check if the user has not attended a workout today

        if (!$attendance) {
            // Trigger banner display and email sending
            // $this->displayWorkoutBanner($userId);
            $this->sendWorkoutEmail($userId->client_id);
        }
    }

    public function displayWorkoutBanner($userId)
    {
        // Logic to store a session variable or database flag to trigger banner display on the frontend
        session(['workout_reminder' => true]); // Using session for simplicity
    }

    public function sendWorkoutEmail($userId)
    {
        $user = User::find($userId);
        $user->notify(new GymWorkoutNotification());
        dd($user);
        if ($user) {
            Mail::send('emails.workout_reminder', ['user' => $user], function ($message) use ($user) {
                $message->to($user->email)->subject('It\'s Time to Workout!');
            });
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
