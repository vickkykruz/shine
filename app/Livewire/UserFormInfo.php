<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\UsersInfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UserFormInfo extends Component
{
	public $userData;

    public function mount($userData)
    {
        $this->userData = $userData;
    }
	
	public function submit_user_info(Request $request)
	{
		$validatedRequest = $request->validate([
			'account_type' => 'required',
			'selectedcountry' => 'required',
			'selectedstate' => 'required',
			'mobile-input' => 'required|string',
			'country_phone_code' => 'required',
			'selectedcity' => 'required',
			'address' => 'required',
			'zipcode' => 'required'
		]);

		try {
			// Retrieve the authenticated user details
			$user = auth()->user();
			$user_bind_id = $user->bind_id;

			// Insert the information into the database
			UsersInfo::create([
				'clientID' => $user_bind_id,
				'accountType' => $validatedRequest['account_type'],
				'countryPhoneCode' => $validatedRequest['country_phone_code'],
				'mobileNumber' => $validatedRequest['mobile-input'],
				'phoneNumber' => $request->input('phone-input'), // Handle absence of 'phone-input' gracefully
				'country' => $validatedRequest['selectedcountry'],
				'state' => $validatedRequest['selectedstate'],
				'city' => $validatedRequest['selectedcity'],
				'address' => $validatedRequest['address'],
				'zonalCode' => $validatedRequest['zipcode'],
			]);

			return redirect()->route('dashboard')->with('success', 'User information submitted successfully.');
		} catch (\Exception $e) {
			// Log the error for debugging purposes
			Log::error('Error submitting user info: ' . $e->getMessage());

			return redirect()->back()->withInput()->with('error', 'An error occurred while submitting user information. Please try again later.');
		}
	}
	
    public function render()
    {
        return view('livewire.user-form-info');
    }
}
