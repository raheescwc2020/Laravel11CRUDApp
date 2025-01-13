<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // Handle the Google Callback
    public function handleGoogleCallback()
    {
        try {
            $socialUser = Socialite::driver('google')->user();

            // Find or create user
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName(),
                    'provider' => 'google',
                    'provider_id' => $socialUser->getId(),
                    'email_verified_at' => now(),
                ]
            );

            // Log the user in
            Auth::login($user);

            // Redirect to the dashboard
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Google login failed.']);
        }
    }
}
