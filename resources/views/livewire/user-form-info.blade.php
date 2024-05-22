<div>
    {{-- Care about people's approval and you will be their prisoner. --}}
	<div class="stepper mb-8" style="display:flex; justify-content:center">
        <div class="stepper-center">
            <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        1
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Account Creation</h3>
                        <p class="text-sm">Step details here</p>
                    </span>
                </li>
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">User info</h3>
                        <p class="text-sm">Step details here</p>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Contact Verification</h3>
                        <p class="text-sm">Step details here</p>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        4
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Company info</h3>
                        <p class="text-sm">Step details here</p>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        5
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Go to Dashboard</h3>
                        <p class="text-sm">Step details here</p>
                    </span>
                </li>
            </ol>
        </div>
    </div>
    {{-- Be like water. --}}
    @if ($userData)
		@if (session('error'))
			<div id="alert-2" class="flex items-center p-4 mb-4 text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
				<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
				  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
				</svg>
				<span class="sr-only">Info</span>
				<div class="ms-3 text-sm font-medium">
				  {{ session('error') }}
				</div>
				<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700" data-dismiss-target="#alert-2" aria-label="Close">
				  <span class="sr-only">Close</span>
				  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
					<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
				  </svg>
				</button>
			  </div>
		@endif
        <form action="{{ route('post_request_user_info') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
                <div class="text-gray-600">
                    <p class="font-medium text-lg mb-2">Profile Photo</p>

                    <div class="user-img" style="display:flex; justify-content:center" >
					
                        <img src="{{ $userData->profile_photo_path ?
								(Str::startsWith($userData->profile_photo_path, ['http', 'https']) ?
									$userData->profile_photo_path :
									asset($userData->profile_photo_path)
								) :
								asset('build/assets/images/Liza-happy-cat-with-laptop-in-christmas-costume-drinking-tea-2f6120ee-b8e0-4f56-8d70-e0bad66f07ee-1.jpg')
							}}" 
						   alt="{{ $userData->name }}'s Avatar" class="rounded-lg object-cover object-center" style="width: 250px; height: 250px;">
                    </div>
                    <div class="md:col-span-5 mt-3">
                        <label class="block mb-1 text-sm font-medium text-gray-900" for="file_input">Change Profile Photo</label>
                        <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50" aria-describedby="file_input_help" name="user_profile" id="file_input" type="file">
                        <small class="mt-1 text-sm text-gray-500 dark:text-gray-300" id="file_input_help">SVG, PNG, JPG or GIF (MAX. 800x400px).</small>
                    </div>
                </div>

                <div class="lg:col-span-2">
                    <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
                        <div class="md:col-span-5 mb-2">
                            <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Full Name</label>
                            <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $userData['name'] }}" readonly>
                        </div>

                        <div class="md:col-span-5 mb-2">
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Email Address</label>
                            <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="{{ $userData['email'] }}" readonly>
                        </div>

                        <div class="md:col-span-5 mb-2">
                            <label for="account_type" class="block">Account Type</label>
                            <select id="account_type" name="account_type" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" required>
                                <option selected>Choose an account</option>
                                <option value="Recruiter">Recruiter</option>
                                <option value="Employee">Employee</option>
                                <option value="Organisation">Organisation</option>
                            </select>
                        </div>

                        <div class="md:col-span-5 mb-2">
                            @livewire('location-list')
                        </div>

                        {{-- Address and Zonal Number --}}
                        <div class="md:col-span-3 mb-2">
                            <label for="address" class="block">Address / Street</label>
                            <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="" placeholder="Eg Pharse 7, Fine street, Gberigbe Road." required />
                        </div>

                        <div class="md:col-span-2">
                            <label for="zipcode" class="block">Zipcode</label>
                            <input type="number" name="zipcode" id="zipcode" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" placeholder="Eg 11011" value="" required />
                        </div>

                        {{-- Submit Button --}}
                        <div class="md:col-span-5 text-right">
                            <div class="inline-flex items-end">
                                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </form> 
    @else
        <p>No user data available.</p>
    @endif
</div>
