<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;

class RecruiterForm extends Component
{
	public $selectedCountries = [];
	public $selectedStates = [];
	public $countries;
    public $selectedOption;
    public $states;
	
	public function mount()
	{
		$this->selectedOption = 'Yes';
		$authToken = $this->getAccessToken();
		$this->countries = $this->getCountries($authToken);
		$this->selectedOption = '';
	}
	
	public function updatedSelectedOption($value)
    {
        // Handle the change
		dd("Hi");
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
	
	public function getStates()
	{
		try {
			if (Redis::exists('client_desired_job_country')) {
				$this->selectedCountries = Redis::lrange('client_desired_job_country', 0, -1);
				$authToken = $this->getAccessToken();
				$stateData = $this->fetchStatesFromCache($authToken, $this->selectedCountries);
				return $stateData;
			}else {
				Log::error('No selected countrie stored in the redis key client_desired_job_country');
			}
		} catch (\Exception $e) {
		   Log::error('Error fetching countries: ' . $e->getMessage());
		}
	}
	
	private function fetchStatesFromCache($authToken, $countries)
	{
		$allStates = [];
		
		foreach ($countries as $countryName) {
			$cachedData = Redis::get('states_data_' . $countryName);
			if ($cachedData) {
				$allStates[$countryName] = json_decode($cachedData, true);
			} else {
				$response = $this->fetchStatesFromAPI($authToken, $countryName);
				Redis::setex('states_data_' . $countryName, 86400, json_encode($response));
				$allStates[$countryName] = $response;
			}
		}
		return $allStates;
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
			if (Redis::exists('client_desired_job_state')) {
				$this->selectedStates = Redis::lrange('client_desired_job_state', 0, -1);
				$authToken = $this->getAccessToken();
				$cityData = $this->fetchCitiesFromCache($authToken, $this->selectedStates);
				return $cityData;
			}else {
				Log::error('No selected state stored in the redis key client_desired_job_state');
			}
		} catch (\Exception $e) {
		   Log::error('Error fetching state: ' . $e->getMessage());
		}
	}
	
	private function fetchCitiesFromCache($authToken, $states)
	{
		$allCities = [];
		
		foreach ($states as $stateName) {
			$cachedData = Redis::get('cities_data_' . $stateName);
			if ($cachedData) {
				$allCities[$stateName] = json_decode($cachedData, true);
			} else {
				$response = $this->fetchCitiesFromAPI($authToken, $stateName);
				Redis::setex('cities_data_' . $stateName, 86400, json_encode($response));
				$allCities[$stateName] = $response;
			}
		}
		return $allCities;
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
	
	public function addCountry(Request $request)
	{
		$dataCountry = $request->input('selectedCountries');
		
		// Store the selected user desired job countries as a set
		if (Redis::exists('client_desired_job_country')) {
			Redis::del('client_desired_job_country');
		}
		
		// Add each selected country to the set
		foreach ($dataCountry as $country) {
			Log::info($country);
			Redis::rpush('client_desired_job_country', $country);
		}
		
		return response()->json(['message' => 'Data received successfully']);
	}
	
	public function addState(Request $request)
	{
		$dataState = $request->input('selectedStates');
		
		// Store the selected user desired job countries as a set
		if (Redis::exists('client_desired_job_state')) {
			Redis::del('client_desired_job_state');
		}
		
		// Add each selected country to the set
		foreach ($dataState as $state) {
			Log::info($state);
			Redis::rpush('client_desired_job_state', $state);
		}
		
		return response()->json(['message' => 'Data received successfully']);
	}
	
	public function addCity(Request $request)
	{
		$dataCity = $request->input('selectedCities');
		
		// Store the selected user desired job countries as a set
		if (Redis::exists('client_desired_job_city')) {
			Redis::del('client_desired_job_city');
		}
		
		// Add each selected country to the set
		foreach ($dataCity as $city) {
			Log::info($city);
			Redis::rpush('client_desired_job_city', $city);
		}
		
		return response()->json(['message' => 'Data received successfully']);
	}
	
	public function fetchStates(Request $request)
	{
		try {
            $updatedStates = $this->getStates();
            return response()->json(['states' => $updatedStates]);
        } catch (\Exception $e) {
			Log::error('Failed to fetch states data');
            return response()->json(['error' => 'Failed to fetch states data'], 500);
        }
	}
	
	public function fetchCities(Request $request)
	{
		try {
            $updatedCities = $this->getCities();
            return response()->json(['cities' => $updatedCities]);
        } catch (\Exception $e) {
			Log::error('Failed to fetch cities data');
            return response()->json(['error' => 'Failed to fetch states data'], 500);
        }
	}
	
	public function updateJobDecision(Request $request)
    {
		try {
			$selectedOption = $request->input('selectedOption');
		
			// Store the selected user desired job countries as a set
			if (Redis::exists('job_deceions')) {
				Redis::del('job_deceions');
			}
			
			Redis::setex('job_deceions', 86400, $selectedOption);
			return response()->json(['selectedOption' => $selectedOption]);
		} catch (\Exception $e) {
			Log::error('Failed to update user job decision');
            return response()->json(['error' => 'Failed to fetch states data'], 500);
        }
    }
	
	public function showJobDecision()
	{
		try {
			$selectedOption = Redis::get('job_deceions');
			return response()->json(['selectedOption' => $selectedOption]);
		} catch (\Exception $e) {
			Log::error('Failed to get the user job desison');
            return response()->json(['error' => 'Failed to fetch states data'], 500);
        }
		
	}
	
	public function updateSkills(Request $request)
	{
		$dataSkills = $request->input('selectedSkills');
		
		// Store the selected user desired job countries as a set
		if (Redis::exists('client_skills')) {
			Redis::del('client_skills');
		}
		
		// Add each selected country to the set
		foreach ($dataSkills as $skill) {
			Redis::rpush('client_skills', $skill);
		}
		
		return response()->json(['message' => 'Data received successfully']);
	}
	
    public function render()
    {
        return view('livewire.recruiter-form');
    }
}
