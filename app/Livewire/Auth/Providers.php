<?php

namespace App\Livewire\Auth;

use Livewire\Component;
use App\Actions\Fortify\CreateNewUser;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Providers extends Component
{
	public function redirectProvider($provider)
    {
        // dd('Reaches the function ``redirectToGoogle``');
        return Socialite::driver($provider)->redirect();
    }
	
	public function handleProviderCallback($provider, CreateNewUser $createNewUser)
	{
		try {
			$user = Socialite::driver($provider)->user();

			// if user was fetched successfully
			if ($user) {
				// Define the variables
				$clientId = $user->getId();
				$clientName = $user->getName();
				$clientEmail = $user->getEmail();
				$clientProfile = $user->getAvatar();
				$emailVerifiedAt = now(); // Assuming the user is verified if authenticated successfully

				// Check if the user already exists
				$existingUser = User::where('email', $clientEmail)->first();

				if ($existingUser) {
					// Grant the user access
					Auth::login($existingUser);
					return redirect()->route('dashboard');
				} else {
					// Create a new user
					$newUser = User::create([
						'name' => $clientName,
						'email' => $clientEmail,
						'password' => Hash::make($clientId), // It's better to generate a random password
						'bind_id' => Str::uuid(),
						'profile_photo_path' => $clientProfile,
						'email_verified_at' => $emailVerifiedAt,
					]);

					Auth::login($newUser);
					return redirect()->route('dashboard');
				}
			}
		} catch (\Exception $e) {
			// Log the exception
			\Log::error('Socialite callback error: ' . $e->getMessage());
		}

		return redirect()->route('login')->withErrors(['msg' => 'Error during authentication.']);
	}
	
    public function render()
    {
        return view('livewire.auth.providers');
    }
}
