<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}
	
	<div class="mt-2">
		<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
			<div class="text-gray-600">
				<div class="user-img flex justify-center">
					<img src="{{ asset('build/assets/images/Illustrations/Interview.png') }}" height="400" width="400" alt="Interview" class="mx-auto" />
				</div>
			</div>
			
			<div class="lg:col-span-2 mt-5">
				<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
					<div class="md:col-span-5 mb-2">
						<label for="message" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Personal Bio</label>
						<textarea id="message" rows="3" maxlength="255" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
					</div>
					<div class="md:col-span-5 mb-2">
						<label class="block mb-1 text-sm font-semibold text-gray-900" for="file_input">Upload your Resume / CV</label>
						<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="file_input_help" name="user_profile" id="file_input" type="file">
						<small class="text-xs text-gray-900" id="file_input_help">PDF, DOC (MAX. 800x400px).</small>
					</div>
					
					<div class="md:col-span-5 mb-2" id="locationErrAlert">
						<div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
							<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
							  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
							</svg>
							<div class="ms-3 text-sm font-medium">
							  <p id="locationErrMes"></p>
							</div>
							<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
							  <span class="sr-only">Dismiss</span>
							  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
							  </svg>
							</button>
						</div>
					</div>

					<div class="md:col-span-5 mb-2">
						<h5 class="text-sm mb-2 font-semibold text-gray-900 card-title">Preferred Job Location(s)</h5>
						<div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
							<div class="w-full md:w-1/3">
								<label class="block mb-1 text-sm font-semibold text-gray-900" for="countries">Country(ies)</label>
								<textarea name="selectedcountries" placeholder="Enter desired country(ies)" id="countries" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
								<label for="countries" class="sr-only">Countries</label>
							</div>
							
							<div class="w-full md:w-1/3">
								<label class="block mb-1 text-sm font-semibold text-gray-900" for="states">State(s) / Region(s)</label>
								<textarea name="selectedstates" id="states" placeholder="Enter desired state(s)" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
								<label for="states" class="sr-only">States / Regions</label>
							</div>
							
							<div class="w-full md:w-1/3">
								<label class="block mb-1 text-sm font-semibold text-gray-900" for="cities">City(ies)</label>
								<textarea name="selectedcities" id="cities" placeholder="Enter desired city(ies)" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
								<label for="cities" class="sr-only">Cities</label>
							</div>
						</div>
					</div>
					
					<div class="md:col-span-5 mb-2" id="desiredJobWarnAlert">
						<div id="alert-border-4" class="flex items-center p-4 mb-4 text-yellow-800 border-t-4 border-yellow-300 bg-yellow-50 dark:text-yellow-300 dark:bg-gray-800 dark:border-yellow-800" role="alert">
							<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
							  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
							</svg>
							<div class="ms-3 text-sm font-medium">
							  <p id="desiredJobWarnText"> A simple danger alert with an </p> <a href="#" class="font-semibold underline hover:no-underline">Learn More</a>.
							</div>
							<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-yellow-50 text-yellow-500 rounded-lg focus:ring-2 focus:ring-yellow-400 p-1.5 hover:bg-yellow-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-yellow-300 dark:hover:bg-gray-700" data-dismiss-target="#alert-border-4" aria-label="Close">
							  <span class="sr-only">Dismiss</span>
							  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
								<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
							  </svg>
							</button>
						</div>
					</div>
					
					<div class="md:col-span-5 mb-2">
						<div class="flex flex-col md:flex-row justify-around items-center gap-3 w-full">
							<!-- Mode of Employment -->
							<div class="w-full md:w-1/2">
								<label class="block mb-1 text-sm font-semibold text-gray-900" for="employment_mode">Mode of Employment</label>
								<div class="flex flex-wrap">
									<div class="flex items-center mr-4 mb-2">
										<input id="full-time" type="radio" value="full-time" name="employment_mode" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
										<label for="full-time" class="ml-2 text-sm font-medium text-gray-900">Full Time</label>
									</div>
									<div class="flex items-center mr-4 mb-2">
										<input id="part-time" type="radio" value="part-time" name="employment_mode" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
										<label for="part-time" class="ml-2 text-sm font-medium text-gray-900">Part Time</label>
									</div>
									<div class="flex items-center mr-4 mb-2">
										<input id="contract" type="radio" value="contract" name="employment_mode" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
										<label for="contract" class="ml-2 text-sm font-medium text-gray-900">Contract</label>
									</div>
									<div class="flex items-center mr-4 mb-2">
										<input id="temporary" type="radio" value="temporary" name="employment_mode" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
										<label for="temporary" class="ml-2 text-sm font-medium text-gray-900">Temporary</label>
									</div>
								</div>
							</div>
							
							<!-- Desired Job -->
							<div class="w-full md:w-1/2">
								<label class="block mb-1 text-sm font-semibold text-gray-900" for="desired_job">Do You Have A Desired Job?</label>
								<select wire:model="selectedOption" id="desired_job" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
									<option value="None">Choose an Option</option>
									<option value="yeah">I have</option>
									<option value="none">I don't have</option>
									
								</select>
							</div>
						</div>
					</div>

					{{-- Preferred Or Desired Job --}}
					<div class="md:col-span-5 mb-2" id="desiredApplyJob">
						@livewire('desired-jobs')
					</div>
					
					<div class="md:col-span-5 mb-2" id="preferredJob">
						@livewire('preferred-jobs')
					</div>

				</div>
			</div>
			
			{{-- Submit Button --}}
			<div class="md:col-span-5 mt-5 text-right">
				<div class="inline-flex items-end">
					<button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
				</div>
			</div>
		</div>
	</div>
	<script>
		const desiredJob = document.getElementById('desired_job');
		const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		const locationErrAlert = document.getElementById('locationErrAlert');
		const locationErrMes = document.getElementById('locationErrMes');
		const desiredJobWarnAlert = document.getElementById('desiredJobWarnAlert');
		const desiredJobWarnText = document.getElementById('desiredJobWarnText');
		const desiredApplyJob = document.getElementById('desiredApplyJob');
		const preferredJob = document.getElementById('preferredJob');
		
		
		let countries = document.querySelector('#countries');
		let states = document.querySelector('#states');
		let cities = document.querySelector('#cities');
		
		locationErrAlert.style.display = 'none';
		desiredJobWarnAlert.style.display = 'none';
		desiredApplyJob.style.display = 'none';
		preferredJob.style.display = 'none';
		
		document.addEventListener('DOMContentLoaded', function() {
			
			fetchJobDecision()
			
			let countriesTagify = new Tagify(countries, {
				whitelist: Object.values(@json($countries).flatMap(country => country.country_name)),
				dropdown: {
					enabled: 0
				}
			});
			
			let statesTagify = new Tagify(states, {
				dropdown: {
					 enabled: 0
				},
				enforceWhitelist: true,
			});
			
			let citiesTagify = new Tagify(cities, {
				dropdown: {
					 enabled: 0
				},
				enforceWhitelist: true,
			});
			
			countriesTagify.on('add', function(event) {
				let selectedCountries = countriesTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-country', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedCountries: selectedCountries })
				})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					// Parse the JSON data from the response body
					return response.json();
				})
				.then(data => {
					fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/fetch-states', {
						method: 'GET',
						headers: {
							'Content-Type': 'application/json',
							'X-CSRF-TOKEN': csrfToken
						},
					})
					.then(response => {
						if (!response.ok) {
							throw new Error('Network response was not ok');
						}
						// Parse the JSON data from the response body
						return response.json();
					})
					.then(data => {
						const stateNames = Object.values(data.states).flatMap(state => state.map(item => item.state_name));
						if (statesTagify) {
							statesTagify.settings.whitelist = stateNames;
							statesTagify.dropdown.refilter();
						}
						loader.style.display = 'none';
					})
					.catch(error => {
						locationErrAlert.style.display = 'block';
						locationErrAlert.textContent = "Failed to fetch data. Please refresh the page to try again.";
						loader.style.display = 'none';
					});
				})
				.catch(error => {
					locationErrAlert.style.display = 'block';
					locationErrAlert.textContent = "Failed to process request. Please refresh the page to try again.";
					loader.style.display = 'none';
				});
			});
			
			countriesTagify.on('remove', function(event) {
				let selectedCountries = countriesTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-country', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedCountries: selectedCountries })
				})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					// Parse the JSON data from the response body
					return response.json();
				})
				.then(data => {
					fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/fetch-states', {
						method: 'GET',
						headers: {
							'Content-Type': 'application/json',
							'X-CSRF-TOKEN': csrfToken
						},
					})
					.then(response => {
						if (!response.ok) {
							throw new Error('Network response was not ok');
						}
						// Parse the JSON data from the response body
						return response.json();
					})
					.then(data => {
						const stateNames = Object.values(data.states).flatMap(state => state.map(item => item.state_name));
						if (statesTagify) {
							statesTagify.settings.whitelist = stateNames;
							statesTagify.removeAllTags();
							statesTagify.dropdown.refilter();
						}
						loader.style.display = 'none';
					})
					.catch(error => {
						locationErrAlert.style.display = 'block';
						locationErrAlert.textContent = "Failed to fetch data. Please refresh the page to try again.";
						loader.style.display = 'none';
					});
				})
				.catch(error => {
					locationErrAlert.style.display = 'block';
					locationErrAlert.textContent = "Failed to process request. Please refresh the page to try again.";
					loader.style.display = 'none';
				});
			});
			
			// States to affeect cities
			statesTagify.on('add', function(event) {
				let selectedStates = statesTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-states', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedStates: selectedStates })
				})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					// Parse the JSON data from the response body
					return response.json();
				})
				.then(data => {
					fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/fetch-cities', {
						method: 'GET',
						headers: {
							'Content-Type': 'application/json',
							'X-CSRF-TOKEN': csrfToken
						},
					})
					.then(response => {
						if (!response.ok) {
							throw new Error('Network response was not ok');
						}
						// Parse the JSON data from the response body
						return response.json();
					})
					.then(data => {
						const citesNames = Object.values(data.cities).flatMap(city => city.map(item => item.city_name));
						if (citiesTagify) {
							citiesTagify.settings.whitelist = citesNames;
							citiesTagify.dropdown.refilter();
						}
						loader.style.display = 'none';
					})
					.catch(error => {
						locationErrAlert.style.display = 'block';
						locationErrAlert.textContent = "Failed to fetch data. Please refresh the page to try again.";
						loader.style.display = 'none';
					});
				})
				.catch(error => {
					locationErrAlert.style.display = 'block';
					locationErrAlert.textContent = "Failed to process request. Please refresh the page to try again.";
					loader.style.display = 'none';
				});
			});
			
			statesTagify.on('remove', function(event) {
				let selectedStates = statesTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-states', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedStates: selectedStates })
				})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					// Parse the JSON data from the response body
					return response.json();
				})
				.then(data => {
					fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/fetch-cities', {
						method: 'GET',
						headers: {
							'Content-Type': 'application/json',
							'X-CSRF-TOKEN': csrfToken
						},
					})
					.then(response => {
						if (!response.ok) {
							throw new Error('Network response was not ok');
						}
						// Parse the JSON data from the response body
						return response.json();
					})
					.then(data => {
						const citesNames = Object.values(data.cities).flatMap(city => city.map(item => item.city_name));
						if (citiesTagify) {
							citiesTagify.settings.whitelist = citesNames;
							citiesTagify.removeAllTags();
							citiesTagify.dropdown.refilter();
						}
						loader.style.display = 'none';
					})
					.catch(error => {
						locationErrAlert.style.display = 'block';
						locationErrAlert.textContent = "Failed to fetch data. Please refresh the page to try again.";
						loader.style.display = 'none';
					});
				})
				.catch(error => {
					locationErrAlert.style.display = 'block';
					locationErrAlert.textContent = "Failed to process request. Please refresh the page to try again.";
					loader.style.display = 'none';
				});
			});
			
			// cites
			
			citiesTagify.on('add', function(event) {
				let selectedCities = citiesTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-cities', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedCities: selectedCities })
				})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					// Parse the JSON data from the response body
					return response.json();
				})
				.then(data => {
					loader.style.display = 'none';
				})
				.catch(error => {
					locationErrAlert.style.display = 'block';
					locationErrAlert.textContent = "Failed to process request. Please refresh the page to try again.";
					loader.style.display = 'none';
				});
			});
			
			citiesTagify.on('remove', function(event) {
				let selectedCities = citiesTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-cities', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedCities: selectedCities })
				})
				.then(response => {
					if (!response.ok) {
						throw new Error('Network response was not ok');
					}
					// Parse the JSON data from the response body
					return response.json();
				})
				.then(data => {
					loader.style.display = 'none';
				})
				.catch(error => {
					locationErrAlert.style.display = 'block';
					locationErrAlert.textContent = "Failed to process request. Please refresh the page to try again.";
					loader.style.display = 'none';
				});
			});
			
			
			
			desiredJob.addEventListener('change', function() {
				const selectedOption = this.value;
				loader.style.display = 'block';
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/select-update', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({
						selectedOption: selectedOption
					})
				})
				.then(response => response.json())
				.then(data => {
					fetchJobDecision();
				})
				.catch(error => {
					console.error('Error:', error);
					loader.style.display = 'none';
				});
			});
			
		});
		
		function fetchJobDecision() {
            
            fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/show-job-decision', {
                method: 'GET',
                headers: {
                    'Content-Type': 'application/json',
					'X-CSRF-TOKEN': csrfToken
                }
            })
            .then(response => response.json())
            .then(updatedData => {
				desiredJobWarnAlert.style.display = 'block';
                if (updatedData.selectedOption == "yeah") {
					if (desiredJobWarnText) {
						desiredJobWarnText.textContent = "To know about the desired job role and its offers, please click here";
					}
					desiredApplyJob.style.display = 'block';
					preferredJob.style.display = 'none';					
				} else if (updatedData.selectedOption == "none") {
					desiredJobWarnText.textContent = "To know about preferred job role and it offers, please click here";
					preferredJob.style.display = 'block';
					desiredApplyJob.style.display = 'none'; 
				}
				loader.style.display = 'none';
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }
	</script>
</div>
