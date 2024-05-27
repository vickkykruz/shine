<div>
    {{-- Do your work, then step back. --}}
	<div class="mt-2">
		<form action="{{ route('post_request_employee_info') }}" method="POST" enctype="multipart/form-data">
			@csrf
			<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
			
					<div class="text-gray-600">
						<div class="user-img flex justify-center">
							<img src="{{ asset('build/assets/images/Illustrations/Personal_info.png') }}" height="400" width="400" alt="Personal_info" class="mx-auto" />
						</div>
					</div>
					
					<div class="lg:col-span-2 mt-5">
					
						<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
							<div class="md:col-span-5 mb-2">
								<label for="message" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Personal Bio</label>
								<textarea id="message" name="personalBio" rows="3" maxlength="255" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
							</div>
							
							<div class="md:col-span-5 mb-2">
								<label for="message" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Position / Job Title</label>
								<input id="message" name="jobTitle" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Position / Job Title" />
							</div>
							
					
							
							<div class="md:col-span-5 mb-2">
								<div class="flex flex-col md:flex-row justify-around items-center gap-3 w-full">
									<!-- Mode of Employment -->
									<div class="w-full md:w-1/2">
										<label for="message" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Department</label>
								<input id="message" name="department" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Department" />
									</div>
									
									<!-- Desired Job -->
									<div class="w-full md:w-1/2">
										<label for="message" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Upload Working ID</label>
										<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="file_input_help" name="userWorkingId" id="file_input" type="file" />
									</div>
								</div>
							</div>
							
							<div class="md:col-span-5 mb-2">
								<div class="flex flex-col md:flex-row justify-around items-center gap-3 w-full">
									<!-- Mode of Employment -->
									<div class="w-full md:w-1/2">
										<label for="message" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">Start Date</label>
										<input id="message" type="date" name="startDate" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Department" />
									</div>
									
									<!-- Desired Job -->
									<div class="w-full md:w-1/2">
										<label for="message" class="block mb-2 text-sm font-semibold text-gray-900 dark:text-white">End Date</label>
										<input id="message" type="date" name="endDate" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Enter Department" />
									</div>
								</div>
							</div>
							

							
							
							<div class="md:col-span-5 mb-2">
								<div class="flex flex-col md:flex-row justify-around items-center gap-3 w-full">
									<!-- Mode of Employment -->
									<div class="w-full md:w-1/2">
										<label class="block mb-1 text-sm font-semibold text-gray-900" for="employment_mode">Mode of Employment</label>
										<div class="flex flex-wrap">
											<div class="flex items-center mr-4 mb-2">
												<input id="full-time" type="radio" value="Full" name="employment_mode" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
												<label for="full-time" class="ml-2 text-sm font-medium text-gray-900">Full Time</label>
											</div>
											<div class="flex items-center mr-4 mb-2">
												<input id="part-time" type="radio" value="Part" name="employment_mode" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
												<label for="part-time" class="ml-2 text-sm font-medium text-gray-900">Part Time</label>
											</div>
											<div class="flex items-center mr-4 mb-2">
												<input id="contract" type="radio" value="Contract" name="employment_mode" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
												<label for="contract" class="ml-2 text-sm font-medium text-gray-900">Contract</label>
											</div>
											<div class="flex items-center mr-4 mb-2">
												<input id="temporary" type="radio" value="Temporary" name="employment_mode" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500">
												<label for="temporary" class="ml-2 text-sm font-medium text-gray-900">Temporary</label>
											</div>
										</div>
									</div>
									
									<!-- Desired Job -->
									<div class="w-full md:w-1/2">
										<label class="block mb-1 text-sm font-semibold text-gray-900" for="desired_job">Community Involvement Interests</label>
										<select id="desired_job" name="interest" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
											<option value="None">Choose an Option</option>
											<option value="Volunteer Work">Volunteer Work</option>
											<option value="Community Projects">Community Projects</option>
											<option value="Educational Outreach">Educational Outreach</option>
											<option value="Health and Wellness Initiatives">Health and Wellness Initiatives</option>
											<option value="Youth and Family Services">Youth and Family Services</option>
											<option value="Elderly Support">Elderly Support</option>
											<option value="Environmental Conservation">Environmental Conservation</option>
											<option value="Arts and Culture">Arts and Culture</option>
											<option value="Special Events">Special Events</option>
										</select>
									</div>
								</div>
							</div>
							
							<div class="md:col-span-5 mb-2">
								<h5 class="text-sm mb-2 font-semibold text-gray-900 card-title">Identification and Documentation</h5>
								<div class="flex flex-col md:flex-row justify-around items-center gap-3 w-full">
									<!-- Mode of Employment -->
									<div class="w-full md:w-1/2">
										<label class="block mb-1 text-sm font-semibold text-gray-900" for="desired_job">Document Type</label>
										<select id="desired_job" name="documentType" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
											<option value="None">Choose an Option</option>
											<option value="ID Card">ID Card</option>
											<option value="Driver License">Driver License</option>
											<option value="Passport">Passport</option>
										</select>
									</div>
									
									<!-- Desired Job -->
									<div class="w-full md:w-1/2">
										<label class="block mb-1 text-sm font-semibold text-gray-900" for="file_input">Upload Document</label>
										<input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="file_input_help" name="userIdenityDoc" id="file_input" type="file">
										<small class="text-xs text-gray-900" id="file_input_help">Let's it be clear and visiable</small>
									</div>
								</div>
							</div>
							
							<div class="md:col-span-5 mb-2">
								<div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
									<div class="w-full md:w-1/2">
										<label class="block mb-1 text-sm font-semibold text-gray-900" for="skills">Skills</label>
										<textarea name="skills" placeholder="Enter skills" id="DesiredSkills" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
										<label for="skills" class="sr-only">Skills</label>
									</div>
									<div class="w-full md:w-1/2">
										<label class="block mb-1 text-sm font-semibold text-gray-900" for="qualifications">Qualifications</label>
										<textarea name="selectedcountries" placeholder="Enter Qualifications" id="DesiredQualifications" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
										<label for="countries" class="sr-only">Qualifications</label>
									</div>
								</div>
							</div>

							<div class="md:col-span-5 mb-2">
								<label for="linkedin-url" class="block mb-1 text-sm font-medium text-gray-900">LinkedIn URL</label>
								<input type="url" id="pLinkedin-url" name="linkedin-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://www.linedin.com?id=34253" required>
							</div>
							
							<div class="md:col-span-5 mb-2">
								<div class="flex items-center mb-4">
									<input id="default-checkbox" type="checkbox" value="" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
									<label for="default-checkbox" name="agree_to_terms" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I have agree to the <a href="#">Terms and Conditions</a></label>
								</div>
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
		</form>
	</div>
	<script>
		// Handle Skills and Quanlifications
		const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
		let DesiredSkills = document.querySelector('#DesiredSkills');
		let DesiredQualifications = document.querySelector('#DesiredQualifications');

		document.addEventListener('DOMContentLoaded', function() {
			let skillsTagify = new Tagify(DesiredSkills, {
				whitelist: ["Communication Skills", "Financial Skills", "Interpersonal Skills", "Problem-Solving Skills", "Technical Skills", "Management Skills", "Sales and Marketing Skills", "Language Skills"],
				dropdown: {
					enabled: 0
				}
			});
			
			skillsTagify.on('add', function(event) {
				let selectedSkills = skillsTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-skills', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedSkills: selectedSkills })
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
					generalErrAlert.style.display = 'block';
					loader.style.display = 'none';
				});
			});
			
			skillsTagify.on('remove', function(event) {
				let selectedSkills = skillsTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-skills', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedSkills: selectedSkills })
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
					generalErrAlert.style.display = 'block';
					loader.style.display = 'none';
				});
			});
			
			let qualificationsTagify = new Tagify(DesiredQualifications, {
				whitelist: ["High School Diploma", "Associate Degree", "Bachelor’s Degree", "Master’s Degree", "Doctorate (Ph.D.)",
							"Project Management Professional (PMP)", "Certified Public Accountant (CPA)", "Certified Information Systems Security Professional (CISSP)",
							"Six Sigma Certification", "Certified Nursing Assistant (CNA)", "Apprenticeships", "Journeyman Certification", "Trade School Diplomas",
							"Vocational Training Certificates", "Test of English as a Foreign Language (TOEFL)", "International English Language Testing System (IELTS)", "Diplôme d'études en langue française (DELF)",
							"Test of Proficiency in Korean (TOPIK)", "Medical Doctor (MD)", "Registered Nurse (RN)", "Licensed Practical Nurse (LPN)", "Board Certification in Specialties",
							"CompTIA A+", "Cisco Certified Network Associate (CCNA)", "Microsoft Certified: Azure Fundamentals", "AWS Certified Solutions Architect", "Oracle Certified Professional",
							"Juris Doctor (JD)", "Bar Exam Certification", "Certified Paralegal"],
				dropdown: {
					 enabled: 0
				},
				enforceWhitelist: true,
			});
			
			qualificationsTagify.on('add', function(event) {
				let selectedQualifications = qualificationsTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-qualifications', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedQualifications: selectedQualifications })
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
					generalErrAlert.style.display = 'block';
					loader.style.display = 'none';
				});
			});
			
			qualificationsTagify.on('remove', function(event) {
				let selectedQualifications = qualificationsTagify.value.map(tag => tag.value);
				loader.style.display = 'block';
				fetch(document.querySelector('meta[name="base-url"]').getAttribute('content') + '/update-qualifications', {
					method: 'POST',
					headers: {
						'Content-Type': 'application/json',
						'X-CSRF-TOKEN': csrfToken
					},
					body: JSON.stringify({ selectedQualifications: selectedQualifications })
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
					generalErrAlert.style.display = 'block';
					loader.style.display = 'none';
				});
			});
		});
	</script>
</div>
