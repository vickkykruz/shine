<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
	<div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
		<div class="w-full md:w-1/2">
			<label class="block mb-1 text-sm font-semibold text-gray-900" for="industry-sector">Industry / Sector</label>
			<select id="industry-sector" name="industry-sector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
				<option selected>Choose an Industry / Sector</option>
				<option value="Accommodation and Food Services">Accommodation and Food Services</option>
				<option value="Administrative and Support Services">Administrative and Support Services</option>
				<option value="Agriculture">Agriculture</option>
				<option value="Arts, Entertainment, and Recreation">Arts, Entertainment, and Recreation</option>
				<option value="Construction">Construction</option>
				<option value="Education">Education</option>
				<option value="Finance and Insurance">Finance and Insurance</option>
				<option value="Fishing">Fishing</option>
				<option value="Forestry">Forestry</option>
				<option value="Government">Government</option>
				<option value="Health Care and Social Assistance">Health Care and Social Assistance</option>
				<option value="Information and Communication">Information and Communication</option>
				<option value="Information Technology">Information Technology</option>
				<option value="Manufacturing">Manufacturing</option>
				<option value="Media and Entertainment">Media and Entertainment</option>
				<option value="Mining">Mining</option>
				<option value="Nonprofit Organizations">Nonprofit Organizations</option>
				<option value="Oil and Gas Extraction">Oil and Gas Extraction</option>
				<option value="Other Services">Other Services</option>
				<option value="Professional, Scientific, and Technical Services">Professional, Scientific, and Technical Services</option>
				<option value="Quinary Sector">Quinary Sector</option>
				<option value="R&D (Research and Development)">R&D (Research and Development)</option>
				<option value="Real Estate and Rental and Leasing">Real Estate and Rental and Leasing</option>
				<option value="Transportation and Warehousing">Transportation and Warehousing</option>
				<option value="Utilities">Utilities</option>
				<option value="Wholesale and Retail Trade">Wholesale and Retail Trade</option>
			</select>
		</div>
		<div class="w-full md:w-1/2">
			<label class="block mb-1 text-sm font-semibold text-gray-900" for="skills">Skills</label>
			<textarea name="skills" placeholder="Enter skills" rows="2" id="skills" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
			<label for="skills" class="sr-only">Skills</label>
		</div>
	</div>
    <div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
		<div class="w-full md:w-1/3">
			<label class="block mb-1 text-sm font-semibold text-gray-900" for="skills">Qualifications</label>
			<textarea name="selectedcountries" placeholder="Enter Qualifications" rows="2" id="qualifications" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
			<label for="countries" class="sr-only">Qualifications</label>
		</div>
		<div class="w-full md:w-1/3">
			<label for="portfolio-url" class="block mb-1 text-sm font-medium text-gray-900">Portfolio URL</label>
			<input type="url" id="pPortfolio-url" name="portfolio-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://www.me.com" required>
		</div>
		<div class="w-full md:w-1/3">
			<label for="linkedin-url" class="block mb-1 text-sm font-medium text-gray-900">LinkedIn URL</label>
			<input type="url" id="pLinkedin-url" name="linkedin-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="https://www.linedin.com?id=34253" required>
		</div>
	</div>
	<script>
		// Handle Skills and Quanlifications
		let skills = document.querySelector('#skills');
		let qualifications = document.querySelector('#qualifications');

		document.addEventListener('DOMContentLoaded', function() {
			let skillsTagify = new Tagify(skills, {
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
			
			let qualificationsTagify = new Tagify(qualifications, {
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
