<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ClearAllCaches extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'clear-caches';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Clear all caches in the application';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $this->callSilent('config:clear');
        $this->callSilent('cache:clear');
        $this->callSilent('event:clear');
        $this->callSilent('route:clear');
        $this->callSilent('view:clear');

        // $this->info("All caches cleared.");
        $this->components->info('All caches cleared.');
    }
}
