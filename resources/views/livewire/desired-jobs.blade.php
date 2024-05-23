<div>
    {{-- Success is as dangerous as failure. --}}
	<div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
		<div class="w-full md:w-1/2">
			<label for="desired-job-title" class="block mb-1 text-sm font-semibold text-gray-900">Desired Job Title</label>
			<input type="text" id="desired-job-title" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Director of Oil and Gas" required>
		</div>
		<div class="w-full md:w-1/2">
			<label for="position-role" class="block mb-1 text-sm font-semibold text-gray-900">Position / Role</label>
			<input type="text" id="position-role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Role" required>
		</div>
	</div>

	{{-- Skills and Target Industries --}}
	<div class="flex flex-col md:flex-row justify-around items-center mb-3 gap-3 w-full">
		<div class="w-full">
			<label class="block mb-1 text-sm font-semibold text-gray-900" for="skills-qualification">Skills & Qualification</label>
			<select id="skills-qualification" multiple class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
				<option value="1">One</option>
				<option value="2">Two</option>
				<option value="3">Three</option>
				<option value="4">Four</option>
				<option value="5">Five</option>
				<option value="6">Six</option>
				<option value="7">Seven</option>
				<option value="8">Eight</option>
			</select>
		</div>
	</div>
    <div class="flex flex-col md:flex-row justify-around items-center gap-3 w-full">
		<div class="w-full md:w-1/3">
			<label for="responsibility-level" class="block mb-1 text-sm font-semibold text-gray-900">Level Of Responsibility</label>
			<select id="responsibility-level" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
				<option selected>Choose an Option</option>
				<option value="High">High</option>
				<option value="Medium">Medium</option>
				<option value="Low">Low</option>
			</select>
		</div>
		<div class="w-full md:w-1/3">
			<label for="portfolio-url" class="block mb-1 text-sm font-semibold text-gray-900">Portfolio URL</label>
			<input type="url" id="portfolio-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="flowbite.com" required>
		</div>
		<div class="w-full md:w-1/3">
			<label for="linkedin-url" class="block mb-1 text-sm font-semibold text-gray-900">LinkedIn URL</label>
			<input type="url" id="linkedin-url" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="flowbite.com" required>
		</div>
	</div>
</div>
