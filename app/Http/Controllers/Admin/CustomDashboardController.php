<?php

namespace App\Http\Controllers\Admin;

use App\Models\MembershipDetail;
use App\Models\MemberVisit;
use App\Models\Payment;
use App\Models\Reservation;
use App\Models\Service;
use App\Models\User;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\AdminController;
use Carbon\Carbon;
use Illuminate\Http\Request;


class CustomDashboardController extends AdminController
{
    public function dashboard()
    {
        parent::dashboard();

        $memberAttendance = MemberVisit::with('user')->orderBy('updated_at')->get();

        $clientCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'member');
        })->count();
        $trainerCount = User::whereHas('roles', function ($query) {
            $query->where('name', 'trainer');
        })->count();
        $pendingPaymentCount = Payment::where('payment_status', 'Pending')->count();
        return view('vendor.backpack.theme-tabler.dashboard', compact('memberAttendance', 'clientCount', 'trainerCount', 'pendingPaymentCount'));
    }

    public function getGenderStats()
    {
        // Fetch gender counts for users with 'member' role
        // $genderCounts = User::where('role', 'member')
        //     ->groupBy('gender')
        //     ->selectRaw('gender, count(*) as count')
        //     ->get();

        $genderCounts = MembershipDetail::groupBy('gender')
            ->selectRaw('gender, count(*) as count')
            ->get();

        // Return data in JSON format
        return response()->json($genderCounts);
    }

    public function getAgeStats()
    {
        // Get current date to calculate age
        $currentDate = Carbon::now();

        // Group users by age range (e.g., 18-24, 25-34, etc.)
        $ageRanges = MembershipDetail::get()
            ->groupBy(function ($user) use ($currentDate) {
                // Calculate the user's age
                $age = $currentDate->diffInYears(Carbon::parse($user->birthdate));

                // Define age ranges
                if ($age >= 18 && $age <= 24) {
                    return '18-24';
                } elseif ($age >= 25 && $age <= 34) {
                    return '25-34';
                } elseif ($age >= 35 && $age <= 44) {
                    return '35-44';
                } elseif ($age >= 45 && $age <= 54) {
                    return '45-54';
                } elseif ($age >= 55 && $age <= 64) {
                    return '55-64';
                } else {
                    return '65+'; // For users older than 65
                }
            })
            ->map(function ($group) {
                return $group->count(); // Count the number of users in each age group
            });

        // Return the data as JSON for frontend
        return response()->json($ageRanges);
    }

    public function getServiceBookingStats()
    {
        // Fetch the list of all services
        $services = Service::all();

        // Initialize an array to hold the service names and their booking counts
        $serviceBookingCounts = [];

        foreach ($services as $service) {
            // Count the number of reservations for each service
            $bookingCount = Reservation::where('service_name_id', $service->id)
                ->count();

            // Store the service name and the corresponding booking count
            $serviceBookingCounts[$service->id] = $bookingCount;
        }

        // Return the data as JSON for frontend
        return response()->json($serviceBookingCounts);
    }

    public function getClientBookingsByDay()
    {
        // Initialize an array to hold booking counts for each day of the week
        $daysOfWeek = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        $bookingsPerDay = array_fill_keys($daysOfWeek, 0); // Initialize with 0 bookings

        // Query the reservations and group by day of the week
        $reservations = Reservation::selectRaw('DAYOFWEEK(updated_at) as day_of_week')
            ->groupBy('day_of_week')
            ->get();

        // Count bookings for each day
        foreach ($reservations as $reservation) {
            $dayOfWeek = $reservation->day_of_week;
            $dayName = $daysOfWeek[$dayOfWeek - 1];  // Convert to name (1 = Sunday, 7 = Saturday)
            $bookingsPerDay[$dayName]++;
        }

        // Return the data as JSON
        return response()->json($bookingsPerDay);
    }
}
