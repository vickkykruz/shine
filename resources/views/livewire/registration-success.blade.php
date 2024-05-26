<div>
	{{-- In work, do what you enjoy. --}}
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
				<li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5 rtl:space-x-reverse">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
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
    
	<div class="mt-2">
		<div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
			<div class="text-gray-600">
				<div class="user-img flex justify-center">
					<img src="{{ asset('build/assets/images/Illustrations/winners.png') }}" height="400" width="400" alt="Interview" class="mx-auto" />
				</div>
			</div>
			
			<div class="lg:col-span-2 mt-5 flex justify-center">
			  <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
				<div class="md:col-span-5 mb-2" id="locationErrAlert">
					<h2 class="text-4xl font-bold text-blue-500 mb-5 text-center">Congratulation</h2>
					<p class="mb-3 mt-10 text-lg text-gray-500 md:text-xl dark:text-gray-400 text-center">
						You have successfully completed the registration of you account. Kindly click on 
						<b>Go To Dashboard</b>, to connect with potential recruiters, employees and top 
						organization globally.
					</p>
					<form action="{{ route('post_request_update_registration_status') }}" method="POST">
						@csrf
						<button type="submit" class="text-white w-full mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Go To Dashboard</button>
					</form>
				</div>
			  </div>
			</div>
		</div>
	</div>	
</div>
