<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class MakeService extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:service {name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new service file';
	
	/**
     * Execute the constuct command.
     */
	public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = $this->argument('name');
        $path = app_path("Services/{$name}.php");
		
		// Check if the service file already exists
        if (File::exists($path)) {
            $this->error("Service {$name} already exists!");
            return;
        }
		
		// Create the Services directory if it doesn't exist
        if (!File::isDirectory(app_path('Services'))) {
            File::makeDirectory(app_path('Services'));
        }
		
		$stub = <<<EOT
		<?php

		namespace App\Services;

		class {$name}
		{
			// Add your service methods here
		}
		EOT;
		
		// Create the service file
        File::put($path, $stub);

        $this->info("Service {$name} created successfully.");
    }
}
