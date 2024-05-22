<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UsersInfo;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class UserFormInfo extends Component
{
	public $userData;

    public function mount($userData)
    {
        $this->userData = $userData;
    }
	
	public function submit_user_info(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'account_type' => 'required',
			'selectedcountry' => 'required',
			'selectedstate' => 'required',
			'mobile-input' => 'required|string',
			'country_phone_code' => 'required',
			'selectedcity' => 'required',
			'address' => 'required',
			'zipcode' => 'required',
			'user_profile' => ['nullable', 'image', 'mimes:jpeg,png,jpg,', 'max:1024'],
		]);

		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}

		try {
			// Retrieve the authenticated user details
			$user = auth()->user();
			$user_bind_id = $user->bind_id;

			$user = User::where('bind_id', $user_bind_id)->firstOrFail();
			
			// Check if a profile photo was uploaded
			if ($request->hasFile('user_profile')) {
				Log::info("Yes. I have an image");
				Log::info("User Data: ". $user);
				
				// Delete the old profile photo if it exists
				if ($user->profile_photo_path) {
					Storage::disk('public')->delete($user->profile_photo_path);
				}
				
				// Exatract the name of the image and the extenction
				$file = $request->file('user_profile');
				
				// Get the original file name and extension
				$originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
				$extension = $file->getClientOriginalExtension();
				
				// Generate a unique filename using UUID
				$uniqueFilename = $originalName . '-' . Str::uuid() . '.' . $extension;
				
				// Define the storage path
				$avatarPath = 'images/users/' . $uniqueFilename;
				
				// Store the file in the 'public' disk
				$path = $file->storeAs('public/' . 'images/users', $uniqueFilename);
				
				// Get the public URL of the stored image
				$publicPath = Storage::url($avatarPath);
				
				Log::info('Path Image Link: ' . $publicPath);
				// Update the user's profile photo path
				$user->profile_photo_path = $publicPath;
				$user->save();
			}
			
			// Insert the information into the database
			UsersInfo::create([
				'clientID' => $user_bind_id,
				'accountType' => $request->input('account_type'),
				'countryPhoneCode' => $request->input('country_phone_code'),
				'mobileNumber' => $request->input('mobile-input'),
				'phoneNumber' => $request->input('phone-input'), // Handle absence of 'phone-input' gracefully
				'country' => $request->input('selectedcountry'),
				'state' => $request->input('selectedstate'),
				'city' => $request->input('selectedcity'),
				'address' => $request->input('address'),
				'zonalCode' => $request->input('zipcode'),
			]);
			
			// Get the record of the user from users table
			

			return redirect()->route('dashboard')->with('success', 'User information submitted successfully.');
		} catch (\Exception $e) {
			// Log the error for debugging purposes
			Log::error('Error submitting user info: ' . $e->getMessage());

			return redirect()->route('dashboard')->with('error', 'An error occurred while submitting user information. Please try again later.');
		}
	}
	
    public function render()
    {
        return view('livewire.user-form-info');
    }
}
