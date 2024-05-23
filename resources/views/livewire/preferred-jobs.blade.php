<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
	<div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
		<div class="w-full md:w-1/2">
			<label class="block mb-1 text-sm font-semibold text-gray-900" for="industry-sector">Industry / Sector</label>
			<select id="industry-sector" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
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
			<textarea name="skills" placeholder="Enter skills" id="skills" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
			<label for="skills" class="sr-only">Skills</label>
		</div>
	</div>
    <div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
		<div class="w-full md:w-1/3">
			<label class="block mb-1 text-sm font-semibold text-gray-900" for="skills">Qualifications</label>
			<textarea name="selectedcountries" placeholder="Enter Qualifications" id="qualifications" rows="2" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500"></textarea>
			<label for="countries" class="sr-only">Qualifications</label>
		</div>
		<div class="w-full md:w-1/3">
			<label for="portfolio-url" class="block mb-1 text-sm font-medium text-gray-900">Portfolio URL</label>
			<input type="url" id="portfolio-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="flowbite.com" required>
		</div>
		<div class="w-full md:w-1/3">
			<label for="linkedin-url" class="block mb-1 text-sm font-medium text-gray-900">LinkedIn URL</label>
			<input type="url" id="linkedin-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="flowbite.com" required>
		</div>
	</div>
	
</div>
