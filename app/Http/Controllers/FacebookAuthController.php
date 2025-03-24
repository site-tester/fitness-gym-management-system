<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class FacebookAuthController extends Controller
{
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->user();

            dd($facebookUser);

            $user = User::updateOrCreate([
                'email' => $facebookUser->getEmail(),
            ], [
                'name' => $facebookUser->getName(),
                'facebook_id' => $facebookUser->getId(),
                'password' => bcrypt(uniqid()), // Random password for Facebook users
            ]);

            $user->assignRole('member'); // Assign the member role to the user

            Auth::login($user);
            session()->flash('login_success', 'Welcome back, ' . $user->name . '!');
            return redirect()->route('dashboard'); // Change this to your dashboard route

        } catch (\Exception $e) {
            return redirect()->route('login')->with('error', 'Facebook login failed');
        }
    }
}

