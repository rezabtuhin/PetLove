<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Auth;
use Exception;
use Hash;
use Laravel\Socialite\Facades\Socialite;
use Symfony\Component\HttpFoundation\RedirectResponse;

class SocialLoginController extends Controller
{
    public function redirect(string $provider): RedirectResponse
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleCallback(string $provider): RedirectResponse
    {
        try {
            $socialUser = Socialite::driver($provider)->user();
            $user = User::firstOrCreate(
                ['email' => $socialUser->getEmail()],
                [
                    'name' => $socialUser->getName(),
                    'oauth_id' => $socialUser->getId(),
                    'oauth_type' => $provider,
                    'avatar' => $socialUser->getAvatar(),
                    'password' => Hash::make($socialUser->getId()),
                ]
            );
            Auth::login($user);
            return redirect()->route('home');
        } catch (Exception $e) {
            return redirect()->route('login')->withErrors(['error' => 'Unable to login, please try again']);
        }
    }

    public function logout()
    {
        Auth::logout();

        session()->invalidate();
        session()->regenerateToken();

        return redirect()->route('login');
    }
}
