<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Illuminate\Http\Request;

class RegistrationSuccess extends Component
{
	
	public function updateRegistrationStatus(Request $request)
	{
		try {
			
			// Retrieve the authenticated user details
			$user = auth()->user();
			
			// Update the user registration status
			$user->registration_status = true;
			$user->save();
			
			// Go home (Real Dashboard)
			return redirect()->route('home')->with('success', 'You are welcome');
			
		} catch (\Exception $e) {
			return redirect()->route('dashboard')->with('error', 'An error occurred while submitting user information. Please try again later.');
		}
	}
	
    public function render()
    {
        return view('livewire.registration-success');
    }
}
