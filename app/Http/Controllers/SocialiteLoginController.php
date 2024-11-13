<?php

namespace App\Http\Controllers;

use App\Model\Dcms\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SocialiteLoginController extends Controller
{
    // Facebook login
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleFacebookCallback()
    {
        try {
            // Retrieve user data from Facebook
            $facebookUser = Socialite::driver('facebook')->user();

            // Check if the email is null or missing
            if (!isset($facebookUser->email) || $facebookUser->email === null) {
                return redirect()->route('login')->withErrors(['msg' => 'Facebook account does not provide an email.']);
            }

            // Find or create user
            $user = User::where('email', $facebookUser->email)->first();
            if (!$user) {
                $user = User::create([
                    'name' => $facebookUser->name,
                    'email' => $facebookUser->email,
                    'password' => Hash::make('Softech@123'), // Default password
                    'role_id' => 0,
                    'facebook_id' => $facebookUser->getId(),
                    'last_login_at' => now(),
                ]);
            }

            // Log in the user
            Auth::login($user);

            return redirect()->intended('/');
        } catch (\Exception $e) {
            return redirect()->route('login')->withErrors(['msg' => 'Error occurred while logging in with Facebook.']);
        }
    }

    // Google login
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    // public function handleGoogleCallback()
    // {
    //     try {
    //         // Retrieve user data from Google
    //         $googleUser = Socialite::driver('google')->user();

    //         // Check if the email is null or missing
    //         if (!isset($googleUser->email) || $googleUser->email === null) {
    //             return redirect()->route('login')->withErrors(['msg' => 'Google account does not provide an email.']);
    //         }

    //         // Find or create user
    //         $user = User::where('email', $googleUser->email)->first();
    //         if (!$user) {
    //             $user = User::create([
    //                 'name' => $googleUser->name,
    //                 'email' => $googleUser->email,
    //                 'password' => Hash::make('Softech@123'), // Default password
    //                 'role_super' => 0,
    //                 'google_id' => $googleUser->getId(),
    //                 'last_login_at' => now(),
    //             ]);
    //         }

    //         // Log in the user
    //         Auth::login($user);

    //         // Redirect to intended or a specific route
    //         return redirect()->intended('/home'); // Update the redirection path here
    //     } catch (\Exception $e) {
    //         return redirect()->route('login')->withErrors(['msg' => 'Error occurred while logging in with Google.']);
    //     }
    // }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->user();
        $user = User::where('email', $googleUser->email)->first();
        if (!$user) {
            $user = User::create(['name' => $googleUser->name, 'email' => $googleUser->email, 'password' => Hash::make('Softech@123') , 'role' => 'user' , 'google_id' => $googleUser->getId() , 'last_login_at' => now()]);
        }
        Auth::login($user);

        return redirect('/');
    }

}
