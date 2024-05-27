<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UsersInfo;
use App\Models\VerifyContact;
use Illuminate\Contracts\View\View;
use App\Models\RecruiterInfo;
use App\Models\EmplyoeeForm;

class DashBoardController extends Controller
{
    public function index(): View
	{
		// Retrieve the authenticated user
		$user = auth()->user();
		$userRegistrationStatus = $user->registration_status;
		$userClientId = $user->bind_id;

		// Check the registration progress
		if (!$userRegistrationStatus) {
			// Check if the user has uploaded their information
			$userInfoStatus = UsersInfo::where('bind_id', $userClientId)->first();

			if ($userInfoStatus) {
				// Check if the user has verified their contact information
				$contactVerifyStatus = VerifyContact::where('bind_id', $userClientId)->first();

				if ($contactVerifyStatus) {
					
					// Check if the user has verified their contact information
					$clientRecruiterStatus = RecruiterInfo::where('bind_id', $userClientId)->first();
					// If employe and orgainastion ....
					$clientEmployeeStatus = EmplyoeeForm::where('bind_id', $userClientId)->first();
					
					if ($clientRecruiterStatus || $clientEmployeeStatus) {
						
						// User has completed all steps, redirect to the company info
						return view('dashboard', [
							'user' => $user,
							'register_status' => '5',
							'user_info' => $userInfoStatus,
						]);
					}
					
					// User has completed all steps, redirect to the company info
					return view('dashboard', [
						'user' => $user,
						'register_status' => '4',
						'user_info' => $userInfoStatus,
					]);
				}

				// User has uploaded info but not verified contact, redirect to the contact verification page
				return view('dashboard', [
					'user' => $user,
					'register_status' => '3',
					'user_info' => $userInfoStatus,
				]);
			}

			// User has not uploaded personal info, redirect to upload info page
			return view('dashboard', [
				'user' => $user,
				'register_status' => '2',
				'user_info' => null,
			]);
		}

		// User is fully registered, redirect to the welcome page
		return view('pages.home', ['message' => 'You are welcome']);
	}
}
