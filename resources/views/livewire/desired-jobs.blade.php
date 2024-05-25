<div>
    {{-- Success is as dangerous as failure. --}}
	<div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
		<div class="w-full md:w-1/2">
			<label for="desired-job-title" class="block mb-1 text-sm font-semibold text-gray-900">Desired Job Title</label>
			<input type="text" id="desired-job-title" name="desired-job-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Director of Oil and Gas" required>
		</div>
		<div class="w-full md:w-1/2">
			<label for="position-role" class="block mb-1 text-sm font-semibold text-gray-900">Position / Role</label>
			<input type="text" id="position-role" name="position-role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Role" required>
		</div>
	</div>

	{{-- Skills and Target Industries --}}
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
    <div class="flex flex-col md:flex-row justify-around items-center gap-3 w-full">
		<div class="w-full md:w-1/3">
			<label for="responsibility-level" class="block mb-1 text-sm font-semibold text-gray-900">Level Of Responsibility</label>
			<select id="responsibility-level" name="responsibility-level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
				<option selected>Choose an Option</option>
				<option value="High">High</option>
				<option value="Medium">Medium</option>
				<option value="Low">Low</option>
			</select>
		</div>
		<div class="w-full md:w-1/3">
			<label for="portfolio-url" class="block mb-1 text-sm font-semibold text-gray-900">Portfolio URL</label>
			<input type="url" id="dPortfolio-url" name="portfolio-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://www.me.com" required>
		</div>
		<div class="w-full md:w-1/3">
			<label for="linkedin-url" class="block mb-1 text-sm font-semibold text-gray-900">LinkedIn URL</label>
			<input type="url" id="dLinkedin-url"name="linkedin-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://www.linedin.com?id=34253" required>
		</div>
	</div>
	<script>
		// Handle Skills and Quanlifications
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
