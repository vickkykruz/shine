<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class PhoneNumber extends Component
{
	#[Validate('required|max:10')] 
	public $mobileNumber = '';
	
	#[Validate('required|max:10')] 
	public $phoneNumber = '';
	
	public $countryName;
    public $countries;
	
	public function mount($selectedcountry)
    {
        $this->countryName = $selectedcountry;
        $authToken = $this->getAccessToken();
        $this->countries = $this->getCountries($authToken);
    }
	
	public function updatedCountryName($newCountry)
    {
        $this->countryName = $newCountry;
        $authToken = $this->getAccessToken();
        $this->countries = $this->getCountries($authToken);
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
	
    public function render()
    {
        return view('livewire.phone-number');
    }
}
