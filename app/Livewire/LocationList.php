<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;

class LocationList extends Component
{
	public $countries;
    public $selectedcountry;
    public $states;
    public $selectedstate;
    public $cities;
    public $selectedcity;
	
	public function mount ()
    {
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
	
	public function getStates()
    {
        try {
            $authToken = $this->getAccessToken();
            $this->states = $this->fetchStates($authToken, $this->selectedcountry);
        }catch (\Exception $e) {
           Log::error('Error fetching countries: ' . $e->getMessage());
           $this->states = [];
        };
    }
	
	private function fetchStates($authToken, $countryName)
    {
		$cacheStateDate = Redis::get('states_data_' . $countryName);
		if ($cacheStateDate) {
			return json_decode($cacheStateDate, true); 
		}else {
			$response = $this->fetchStatesFromAPI($authToken, $countryName);
			Redis::setex('states_data_' . $countryName, 86400, json_encode($response));
			return $response;
		}
    }
	
	private function fetchStatesFromAPI($authToken, $countryName)
	{
		$response = Http::withHeaders([
			'Accept' => 'application/json',
			'Authorization' => 'Bearer '. $authToken,
		])->get('https://www.universal-tutorial.com/api/states/'.$countryName.'');

		$this->handleResponseError($response);
		return $response->json();
	}
	
	public function getCities()
    {
        try {
            $authToken = $this->getAccessToken();
            $this->cities = $this->fetchCities($authToken, $this->selectedstate);
        }catch (\Exception $e) {
            Log::error('Error fetching countries: ' . $e->getMessage());
            $this->cities = [];
        };
    }
	
	private function fetchCities($authToken, $stateName)
    {
		$cacheCityData = Redis::get('cities_data_'. $stateName);
		if ($cacheCityData) {
			return json_decode($cacheCityData, true);
		}else {
			$response = $this->fetchCitiesFromAPI($authToken, $stateName);
			Redis::setex('cities_data_' . $stateName, 86400, json_encode($response));
			return $response;
		}
    }
	
	
    private function fetchCitiesFromAPI($authToken, $stateName)
	{
		$response = Http::withHeaders([
			'Accept' => 'application/json',
			'Authorization' => 'Bearer '. $authToken,
		])->get('https://www.universal-tutorial.com/api/cities/'.$stateName.'');

		$this->handleResponseError($response);
		return $response->json();
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
        return view('livewire.location-list');
    }
}
