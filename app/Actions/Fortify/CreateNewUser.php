<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Laravolt\Avatar\Facade as Avatar;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array<string, string>  $input
     */
    public function create(array $input): User
	{
		// Validate the input
		Validator::make($input, [
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
			'password' => $this->passwordRules(),
			'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['accepted', 'required'] : '',
		])->validate();

		// Create the user first
		$user = User::create([
			'name' => $input['name'],
			'email' => $input['email'],
			'password' => Hash::make($input['password']),
			'bind_id' => Str::uuid(),
			'profile_photo_path' => $input['profile_photo_path'] ?? null,
		]);

		// Generate an avatar for the user using their name
        $avatar = Avatar::create($user->name)->toBase64();
        
        // Save the avatar to a file and update the path
        $avatarPath = 'images/users/avatar-' . Str::uuid() . '.png';
        Storage::put('public/' . $avatarPath, base64_decode($avatar));
        $user->profile_photo_path = $avatarPath;
        $user->save();

		return $user;
	}
	
	protected function passwordRules()
    {
        return ['required', 'string', 'min:8', 'confirmed'];
    }
}
