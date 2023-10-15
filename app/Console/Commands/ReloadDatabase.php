<?php

namespace App\Console\Commands;

use Database\Seeders\DevSeeder;
use Database\Seeders\PrepareSeeder;
use Illuminate\Console\Command;

class ReloadDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reload-database {--demo} {--dev} {--uat}';

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

        if($this->option('demo')) {
            $this->components->info('Seeding demo data');
            // call demo seeder
            // $this->call('db:seed', [
            //     '--class' => PrepareSeeder::class,
            // ]);
        }

        if($this->option('dev')) {
            $this->components->info('Seeding dev data');
            // call dev seeder
            $this->call('db:seed', [
                '--class' => DevSeeder::class,
            ]);
        }

        if($this->option('uat')) {
            $this->components->info('Seeding uat data');
            // call uat seeder
            // $this->call('db:seed', [
            //     '--class' => PrepareSeeder::class,
            // ]);
        }
    }
}
