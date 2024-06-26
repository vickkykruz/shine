<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\RecruiterInfo;
use App\Models\RecruiterSelectedJobCountry;
use App\Models\RecruiterSelectedJobState;
use App\Models\RecruiterSelectedJobCity;
use App\Models\DesiredJob;
use App\Models\PreferredJob;
use App\Models\RecruiterSkills;
use App\Models\RecruiterQualifications;
use Illuminate\Support\Str;

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
	
	public function updateQualifications(Request $request)
	{
		$dataQualifications = $request->input('selectedQualifications');
		
		// Store the selected user desired job countries as a set
		if (Redis::exists('client_qualifications')) {
			Redis::del('client_qualifications');
		}
		
		// Add each selected country to the set
		foreach ($dataQualifications as $qualification) {
			Redis::rpush('client_qualifications', $qualification);
		}
		
		return response()->json(['message' => 'Data received successfully']);
	}
	
	/**
	 * Handle the saving of recruiter details.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function saveRecruiterDetails(Request $request)
	{
		
		// Step 1: Validate the initial input fields
		
		$validator = Validator::make($request->all(), [
			'personalBio' => 'required|string',
			'userCv' => ['required', 'file', 'mimes:pdf,doc', 'max:1024'],
			'employment_mode' => 'required|string',
			'desired_job' => 'required|string',
			
		]);

		// Check if the initial validation fails
		if ($validator->fails()) {
			return back()->withErrors($validator)->withInput();
		}

		// Step 2: Additional validation based on 'desired_job' input
		if ($request->input('desired_job') == "yeah") {
			$desiredJobValidator = Validator::make($request->all(), [
				'desired-job-title' => 'required|string',
				'position-role' => 'required|string',
				'responsibility-level' => 'required|string',
				'portfolio-url' => 'required|string',
				'linkedin-url'=> 'required|string',
			]);

			// Check if the desired job validation fails
			if ($desiredJobValidator->fails()) {
				return back()->withErrors($desiredJobValidator)->withInput();
			}

		} else if ($request->input('desired_job') == "none") {
			$preferredJobValidator = Validator::make($request->all(), [
				'industry-sector' => 'required|string',
				'portfolio-url' => 'required|string',
				'linkedin-url'=> 'required|string',
			]);

			// Check if the preferred job validation fails
			if ($preferredJobValidator->fails()) {
				return back()->withErrors($preferredJobValidator)->withInput();
			}
		}

		// Step 3: Check if the required Redis keys exist and are not empty
		$listKeys = [
			'client_desired_job_country',
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

		// Step 4: Handle file upload for 'userCv'
		if ($request->hasFile('userCv')) {
			// Extract the original name and extension of the uploaded file
			$file = $request->file('userCv');
			$originalName = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
			$extension = $file->getClientOriginalExtension();
			
			// Generate a unique filename using UUID
			$uniqueFilename = $originalName . '-' . Str::uuid() . '.' . $extension;
			
			// Define the storage path
			$resumePath = 'user_cv/users/' . $uniqueFilename;
			
			// Store the file in the 'public' disk
			$path = $file->storeAs('public/' . 'user_cv/users', $uniqueFilename);
			
			// Get the public URL of the stored file
			$publicPath = Storage::url($resumePath);
			
		} else {
			return back()->withErrors("Internal Error Occurred. Please Try Again")->withInput();
		}

		// Step 5: Insert the data into the database
		try {
			// Retrieve the authenticated user's details
			$user = auth()->user();
			$user_bind_id = $user->bind_id;
			
			// Create and save the RecruiterInfo entry
			$recruiterInfo = RecruiterInfo::create([
				'bind_id' => $user_bind_id,
				'personal_bio' => $request->input('personalBio'),
				'resume_path' => $publicPath,
				'employMode' => $request->input('employment_mode'),
				'desiredJobQues' => $request->input('desired_job'),
				'argement_con' => $request->input('agree_to_terms'),
			]);

			$recruiterInfo->save();
			$fetchRecruiterInfo = RecruiterInfo::where('bind_id', $user_bind_id)->first();
			$recruiterInfoId = $fetchRecruiterInfo->id;
			
			Log::info('RecruiterInfo Id: ', ['id' => $recruiterInfoId]);

			// Step 6: Save the selected countries, states, and cities from Redis
			$clientDesiredJobCountry = Redis::lrange('client_desired_job_country', 0, -1);
			$clientDesiredJobState = Redis::lrange('client_desired_job_state', 0, -1);
			$clientDesiredJobCity = Redis::lrange('client_desired_job_city', 0, -1);

			// Save countries
			foreach($clientDesiredJobCountry as $country) {
				RecruiterSelectedJobCountry::create([
					'recruiterInfoId' => $recruiterInfoId,
					'bind_id' => $user_bind_id,
					'country' => $country
				]);
			}

			// Save states
			if (count($clientDesiredJobState) > 0) {
				foreach($clientDesiredJobState as $state) {
					RecruiterSelectedJobState::create([
						'recruiterInfoId' => $recruiterInfoId,
						'bind_id' => $user_bind_id,
						'state' => $state
					]);
				}
				
				Redis::del('client_desired_job_state');
			}

			// Save cities
			if (count($clientDesiredJobCity) > 0) {
				foreach($clientDesiredJobCity as $city) {
					RecruiterSelectedJobCity::create([
						'recruiterInfoId' => $recruiterInfoId,
						'bind_id' => $user_bind_id,
						'city' => $city
					]);
				}
				
				Redis::del('client_desired_job_city');
			}

			// Delete the Redis keys after saving
			Redis::del('client_desired_job_country');
			
			

			// Step 7: Handle the 'desired_job' input
			if ($fetchRecruiterInfo->desiredJobQues == "yeah") {
				// Save desired job information
				$desiredJobInfo = DesiredJob::create([
					'recruiterInfoId' => $recruiterInfoId,
					'bind_id' => $user_bind_id,
					'desired_job_title' => $request->input('desired-job-title'),
					'job_position' => $request->input('position-role'),
					'responsibility_level' => $request->input('responsibility-level'),
					'portfolio_url' => $request->input('portfolio-url'),
					'linkedIn_url' => $request->input('linkedin-url'),
				]);

				$desiredJobInfo->save();

				// Fetch the desired job ID and save skills and qualifications
				$fetchDesiredJobInfo = DesiredJob::where([
										'recruiterInfoId' => $recruiterInfoId,
										'bind_id' => $user_bind_id,
									])->first();
				$desiredJobInfoId = $fetchDesiredJobInfo->id;

				// Save skills
				$clientSkills = Redis::lrange('client_skills', 0, -1);
				foreach($clientSkills as $skills) {
					RecruiterSkills::create([
						'bind_id' => $user_bind_id,
						'table_type' => "DesiredJob",
						'job_id' => $desiredJobInfoId,
						'skill' => $skills,
					]);
				}

				// Save qualifications
				$clientQualifications = Redis::lrange('client_qualifications', 0, -1);
				foreach($clientQualifications as $qualifications) {
					RecruiterSkills::create([
						'bind_id' => $user_bind_id,
						'table_type' => "DesiredJob",
						'job_id' => $desiredJobInfoId,
						'qualification' => $qualifications,
					]);
				}
			} else if ($fetchRecruiterInfo->desiredJobQues == "none") {
				// Save preferred job information
				$preferredJobInfo = PreferredJob::create([
					'recruiterInfoId' => $recruiterInfoId,
					'bind_id' => $user_bind_id,
					'industry_or_sector' => $request->input('industry-sector'),
					'portfolio_url' => $request->input('portfolio-url'),
					'linkedIn_url' => $request->input('linkedin-url'),
				]);

				$preferredJobInfo->save();

				// Fetch the preferred job ID and save skills and qualifications
				$fetchPreferredJobInfo = PreferredJob::where([
										'recruiterInfoId' => $recruiterInfoId,
										'bind_id' => $user_bind_id,
									])->first();
				$preferredJobInfoId = $fetchPreferredJobInfo->id;

				// Save skills
				$clientSkills = Redis::lrange('client_skills', 0, -1);
				foreach($clientSkills as $skills) {
					RecruiterSkills::create([
						'bind_id' => $user_bind_id,
						'table_type' => "PreferredJob",
						'job_id' => $preferredJobInfoId,
						'skill' => $skills,
					]);
				}

				// Save qualifications
				$clientQualifications = Redis::lrange('client_qualifications', 0, -1);
				foreach($clientQualifications as $qualifications) {
					RecruiterSkills::create([
						'bind_id' => $user_bind_id,
						'table_type' => "PreferredJob",
						'job_id' => $preferredJobInfoId,
						'qualification' => $qualifications,
					]);
				}
			}

			// Redirect to the dashboard with a success message
			return redirect()->route('dashboard')->with('success', 'User information submitted successfully.');
			
		} catch (\Exception $e) {
			// Log the error and redirect to the dashboard with an error message
			Log::error('Error submitting user info: ' . $e->getMessage());
			return redirect()->route('dashboard')->with('error', 'An error occurred while submitting user information. Please try again later.');
		}
	}
	
    public function render()
    {
        return view('livewire.recruiter-form');
    }
}
