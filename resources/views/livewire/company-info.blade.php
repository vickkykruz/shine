<div>
    {{-- The Master doesn't talk, he acts. --}}
	<div class="stepper mb-8" style="display:flex; justify-content:center">
        <div class="stepper-center">
            <ol class="items-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0 rtl:space-x-reverse">
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        1
                    </span>
                    <span>
                        <h3 class="font-semibold leading-tight">Account Creation</h3>
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
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Contact Verification</h3>
                        <p class="text-sm">Step details here</p>
                    </span>
                </li>
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
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
	
	<div id="generalErrAlert">
		<div id="alert-border-2" class="flex items-center p-4 mb-4 text-red-800 border-t-4 border-red-300 bg-red-50 dark:text-red-400 dark:bg-gray-800 dark:border-red-800" role="alert">
			<svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
			  <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z"/>
			</svg>
			<div class="ms-3 text-sm font-medium">
			  An Error Occured. Please Try Again Later.
			</div>
			<button type="button" class="ms-auto -mx-1.5 -my-1.5 bg-red-50 text-red-500 rounded-lg focus:ring-2 focus:ring-red-400 p-1.5 hover:bg-red-200 inline-flex items-center justify-center h-8 w-8 dark:bg-gray-800 dark:text-red-400 dark:hover:bg-gray-700"  data-dismiss-target="#alert-border-2" aria-label="Close">
			  <span class="sr-only">Dismiss</span>
			  <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
				<path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
			  </svg>
			</button>
		</div>
	</div>
	
	{{-- Differniate the users based on their account type --}}
	@switch($this->getUserInfo()->accountType)
        @case("Recruiter")
            @livewire('recruiter-form')
            @break
        @case("Employee")
			@livewire('employee-form')
            @break
        @case("Organzation")

            @break

        @default
            <h1>Error: Data Error</h1>
    @endswitch
</div>
