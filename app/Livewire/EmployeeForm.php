<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Models\EmplyoeeForm;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Str;

class EmployeeForm extends Component
{
	
	public function saveRecruiterDetails(Request $request)
	{
		$validator = Validator::make($request->all(), [
			'personalBio' => 'required|string',
			'jobTitle' => 'required|string',
			'department' => 'required|string',
			'userWorkingId' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:1024'],
			'startDate' => 'required|string',
			'endDate' => 'required|string',
			'employment_mode' => 'required|string',
			'interest' => 'required|string',
			'documentType' => 'required|string',
			'userIdenityDoc' => ['required', 'file', 'mimes:png,jpg,jpeg', 'max:1024'],
			'linkedin-url' => 'required|string',
			
		]);

		// Check if the initial validation fails
		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}
		
		$listKeys = [
			'client_skills',
			'client_qualifications'
		];
		
		$allListsExistAndNotEmpty = true;
		foreach ($listKeys as $key) {
			if (!Redis::exists($key) || count(Redis::lrange($key, 0, -1)) === 0) {
				$allListsExistAndNotEmpty = false;
				break;
			}
		}
		
		// Return error if any Redis list is missing or empty
		if (!$allListsExistAndNotEmpty) {
			return back()->withErrors("Internal Error Occurred. Please Try Again")->withInput();
		}
		
		// Step 4: Handle file upload for 'userWorkingId'
		if ($request->hasFile('userWorkingId')) {
			// Extract the original name and extension of the uploaded file
			$file = $request->file('userWorkingId');
			$originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
			$extension = $file->getClientOriginalExtension();
			
			// Generate a unique filename using UUID
			$uniqueFilename = $originalName . '-' . Str::uuid() . '.' . $extension;
			
			// Define the storage path
			$resumePath = 'employeeIdCard/' . $uniqueFilename;
			
			// Store the file in the 'public' disk
			$path = $file->storeAs('public/' . 'employeeIdCard', $uniqueFilename);
			
			// Get the public URL of the stored file
			$userWorkingIdPath = Storage::url($resumePath);
			
		} else {
			return back()->withErrors("Internal Error Occurred. Please Try Again")->withInput();
		}
		
		// Step 4: Handle file upload for 'userIdenityDoc'
		if ($request->hasFile('userIdenityDoc')) {
			// Extract the original name and extension of the uploaded file
			$file = $request->file('userIdenityDoc');
			$originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
			$extension = $file->getClientOriginalExtension();
			
			// Generate a unique filename using UUID
			$uniqueFilename = $originalName . '-' . Str::uuid() . '.' . $extension;
			
			// Define the storage path
			$resumePath = 'employeeIdenityDoc/' . $uniqueFilename;
			
			// Store the file in the 'public' disk
			$path = $file->storeAs('public/' . 'employeeIdenityDoc', $uniqueFilename);
			
			// Get the public URL of the stored file
			$userIdenityPath = Storage::url($resumePath);
			
		} else {
			return back()->withErrors("Internal Error Occurred. Please Try Again")->withInput();
		}
		
		
		try {
			// Retrieve the authenticated user's details
			$user = auth()->user();
			$user_bind_id = $user->bind_id;
			
			// Create and save the RecruiterInfo entry
			$employeeInfo = EmplyoeeForm::create([
				'bind_id' => $user_bind_id,
				'personal_bio' => $request->input('personalBio'),
				'job_title' => $request->input('jobTitle'),
				'department' => $request->input('department'),
				'company_id_path' => $userWorkingIdPath,
				'start_date' => $request->input('startDate'),
				'end_date' => $request->input('endDate'),
				'employment_mode' => $request->input('employment_mode'),
				'interest' => $request->input('interest'),
				'identity_type' => $request->input('documentType'),
				'identity_path' => $userIdenityPath,
				'linkedin_url' => $request->input('linkedin-url'),
				'argement_con' => "Yes",
			]);
			
			// Redirect to the dashboard with a success message
			return redirect()->route('dashboard')->with('success', 'User information submitted successfully.');
			
		} catch (\Exception $e) {
			Log::error('Error submitting user info: ' . $e->getMessage());
			return redirect()->route('dashboard')->with('error', 'An error occurred while submitting user information. Please try again later.');
		} 
	}
	
    public function render()
    {
        return view('livewire.employee-form');
    }
}
