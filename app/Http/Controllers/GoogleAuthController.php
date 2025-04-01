<?php

namespace App\Http\Controllers;

use App\Models\MembershipDetail;
use App\Models\MemberVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->user();
            $user = User::where('google_id', $googleUser->getId())->first();
            // $this->checkWorkoutReminder($user->id); // Call the reminder function
            if ($user) {
                Auth::login($user);
                $this->checkWorkoutReminder($user->id);
                session()->flash('login_success', 'Welcome back, ' . $user->name . '!');
                return redirect()->route('dashboard'); // Change this to your dashboard route
            } else {
                $user = User::create([
                    'email' => $googleUser->getEmail(),
                    'name' => $googleUser->getName(),
                    'google_id' => $googleUser->getId(),
                    'password' => bcrypt(uniqid()),
                    'email_verified_at' => now(),
                ]);

                $user->assignRole('member'); // Assign the member role to the user

                Auth::login($user);
                $this->checkWorkoutReminder($user->id);
                session()->flash('login_success', 'Welcome, ' . $user->name . '!');
                // $this->checkWorkoutReminder($Auth::id()); // Call the reminder function
                return redirect()->route('dashboard'); // Change this to your dashboard route
            }

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Google login failed');
        }
    }

    public function checkWorkoutReminder($userId)
    {

        $userId = MembershipDetail::where('client_id', $userId)->first();
        $today = now()->toDateString();
        $attendance = MemberVisit::where('client_rfid_id', $userId->rfid_number)
            ->whereDate('time_in', $today)
            ->exists();

        if (!$attendance) {
            // Trigger banner display and email sending
            $this->displayWorkoutBanner($userId);
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
        if ($user) {
            Mail::send('emails.workout_reminder', ['user' => $user], function ($message) use ($user) {
                $message->to($user->email)->subject('It\'s Time to Workout!');
            });
        }
    }

}

