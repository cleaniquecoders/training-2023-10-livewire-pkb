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
        $this->call('config:clear');
        $this->call('cache:clear');
        $this->call('event:clear');
        $this->call('route:clear');
        $this->call('view:clear');
    }
}
