<?php

namespace App\Livewire;

use Livewire\Component;
use App\Services\PhoneValidationService;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use libphonenumber\PhoneNumberUtil;
use libphonenumber\PhoneNumberFormat;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redis;

class VerifyUserContant extends Component
{
	public $countryName;
    public $countries;
    public $insertNewNumber;
    public $formattedPhoneNumber;
    public $userData;
    private $userInfo;
    public $phoneVerifiedStatus;
    public $verifyEmail;
    public $verifyPhone;
    public $showModal = false;
	
	public function mount($userData, $userInfo)
    {
        $this->userData = $userData;
        $this->userInfo = $userInfo;
        $userMobileNumber = '+'.$userInfo->countryPhoneCode.''.$userInfo->mobileNumber;
        $this->countryName = $userInfo->country;
        $this->insertNewNumber = $userInfo->mobileNumber;

        $authToken = $this->getAccessToken();
        $this->countries = $this->getCountries($authToken);

        // Format the phone number
        $phoneUtil = PhoneNumberUtil::getInstance();
        $numberProto = $phoneUtil->parse($userMobileNumber, 'ZZ');

        // Format the phone number
        $this->formattedPhoneNumber = $phoneUtil->format($numberProto, PhoneNumberFormat::INTERNATIONAL);
    }
	
	public function verifyPhoneNumber(PhoneValidationService $phoneValidationService, $phoneNumber)
    {
        $response = $phoneValidationService->vaildatePhone($phoneNumber);
        $statusNumber = $response['valid'];
        if ($statusNumber == true)
        {
            $this->phoneVerifiedStatus = 'true';
        }else if ($statusNumber == false)
        {
            $this->phoneVerifiedStatus = 'false';
        }
    }
	
	// Public method to access $userInfo
    public function getUserInfo()
    {
        return $this->userInfo;
    }

    public function toggleModal()
    {
        $this->showModal = !$this->showModal;
    }

    public function closeToggleModal()
    {
        $this->showModal = false;
    }
	
	private function getAccessToken()
	{
		try {
			if (Redis::exists('access_token')) {
				return Redis::get('access_token');
			}else {
				$response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'api-token' => 'WUMMoJAIsRVBr8S7-J13qo_M7ObGTZtM3AVxLV9CEY3CBpec_PIZXyk-FPucMx0_j_Q',
                    'user-email' => 'onwuegbuchulemvic02@gmail.com'
                ])->get('https://www.universal-tutorial.com/api/getaccesstoken');

                Redis::setex('access_token', 3600, $response->json()['auth_token']);
                return $response->json()['auth_token'];
			}
		} catch (\Exception $e) {
            // Handle the exception (e.g., log, display an error message, etc.)
            Log::error('Error fetching access token: ' . $e->getMessage());
            return null;
        }
	}
	
	private function getCountries($authToken)
    {
        try {
            if (Redis::exists('countries_data')) {
                return json_decode(Redis::get('countries_data'), true);
            } else {
                $response = Http::withHeaders([
                    'Accept' => 'application/json',
                    'Authorization' => 'Bearer ' . $authToken,
                ])->get('https://www.universal-tutorial.com/api/countries/');

                $this->handleResponseError($response);

                Redis::setex('countries_data', 86400, json_encode($response->json()));

                return $response->json();
            }
        } catch (\Exception $e) {
            // Handle the exception (e.g., log, display an error message, etc.)
            Log::error('Error fetching countries: ' . $e->getMessage());
            return null;
        }
    }
	
	private function handleResponseError($response)
    {
        // Implement your error handling logic here
        if ($response->failed()) {
            throw new \Exception('Error: ' . $response->status());
        }
    }
	
	public function saveNewNumber()
    {
        // Update the user mobile number
        DB::table('user_infos')
        ->where('clientID', '=', $this->userInfo->clientID) // Replace with your actual condition
        ->update(['mobileNumber' => $this->insertNewNumber]);

        // Return the font-end to default
        $this->showModal = false;
        $this->phoneVerifiedStatus = '';
    }
	
	public function saveDetails(Request $request)
{
    // Retrieve the user information
    $user = auth()->user();
    $user_client_id = $user->bind_id;

    // Validate the request inputs
    $validated = $request->validate([
        'verifyEmail' => 'required|string',
        'verifyPhone' => 'required|string',
    ]);

    // Check if the email and phone are verified
    if ($validated['verifyEmail'] !== 'Verified' || $validated['verifyPhone'] !== 'Verified') {
        $errorMessage = 'Ensure you validate your email and mobile number before you continue';
        return redirect()->back()->with('errorMessage', $errorMessage);
    } else {
        // Insert the status of the contact
        DB::table('verify_contacts')->insert([
            'clientID' => $user_client_id,
            'email_verify_status' => $validated['verifyEmail'],
            'mobile_number_verify_status' => $validated['verifyPhone'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('dashboard');
    }
}

    public function render()
    {
        return view('livewire.verify-user-contant');
    }
}
