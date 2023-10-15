<?php

namespace App\Console\Commands;

use Database\Seeders\PrepareSeeder;
use Illuminate\Console\Command;

class ReloadDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reload-database';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recreate tables and seed data.';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(app()->isProduction()) {
            return;
        }

        $this->call('migrate:fresh');

        $this->call('db:seed');
        
        $this->call('db:seed', [
            '--class' => PrepareSeeder::class,
        ]);
    }
}
