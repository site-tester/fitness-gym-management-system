<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
            $user = User::updateOrCreate([
                'email' => $googleUser->getEmail(),
            ], [
                'name' => $googleUser->getName(),
                'google_id' => $googleUser->getId(),
                'password' => bcrypt(uniqid()), // Random password for Google users
            ]);

            $user->assignRole('member'); // Assign the member role to the user

            Auth::login($user);
            session()->flash('login_success', 'Welcome back, ' . $user->name . '!');
            return redirect()->route('dashboard'); // Change this to your dashboard route

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Google login failed');
        }
    }
}

