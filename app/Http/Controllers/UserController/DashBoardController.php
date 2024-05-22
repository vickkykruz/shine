<?php

namespace App\Http\Controllers\UserController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;

class DashBoardController extends Controller
{
    public function index(): View
	{
		// Retrieve the authenticated user
		$user = auth()->user();
		$userRegistrationStatus = $user->registration_status;
		$userClientId = $user->bind_id;

		// Checking the registration progress
		if (!$userRegistrationStatus) {
			// Check if the user has uploaded their information
			$userInfoStatus = DB::table('users_info')->where('clientID', $userClientId)->first();

			if ($userInfoStatus) {
				// Check if the user has uploaded their information
				$contactVerifyStatus = DB::table('verify_contacts')->where('clientID', $userClientId)->first();

				if ($contactVerifyStatus) {
					// Redirect the user to the company info
					return view('dashboard', [
						'user' => $user,
						'register_status' => '4',
						'user_info' => $userInfoStatus,
					]);
				}

				// Redirect to the verified contact Page
				return view('dashboard', [
					'user' => $user,
					'register_status' => '3',
					'user_info' => $userInfoStatus,
				]);
			}

			// Redirect the user to upload personal info
			return view('dashboard', [
				'user' => $user,
				'register_status' => '2',
				'user_info' => null,
			]);
		}

		// Redirect the user to the welcome page
		return view('dashboard', [
			'user' => $user,
			'register_status' => '5',
		]);
	}
}
