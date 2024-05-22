<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Support\Str;
use App\Services\GravatarService;
use Illuminate\Support\Facades\Log;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;
	
	protected $gravatarService;

    // Inject GravatarService into the controller
    public function __construct(GravatarService $gravatarService)
    {
        $this->gravatarService = $gravatarService;
    }

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
		]);
		
		// Using Gravatar to get the image
        $user_image = $this->getGravatarUrl($user->email, 250);
		Log::info('Gravater User Profile link: '. $user_image);

        // Update user's profile photo path
        $user->profile_photo_path = $user_image ? $user_image : null;

        $user->save();
		
		return $user;
	}
	
	protected function passwordRules()
    {
        return ['required', 'string', 'min:8', 'confirmed'];
    }
	
	protected function getGravatarUrl($email, $size)
    {
        return $this->gravatarService->getGravatarUrl($email, $size);
    }
}
