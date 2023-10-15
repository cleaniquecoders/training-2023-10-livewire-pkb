<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class ResetUserPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:reset-password';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset user password';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if(app()->isProduction()) {
            return;
        }

        $email = $this->ask('Email address?');

        $password = $this->secret('New password?');

        User::where('email', $email)->update([
            'password' => Hash::make($password),
        ]);

        $this->info("$email password has been reset.");
        $this->newLine();
        // $this->warn("$email password has been reset.");
        // $this->error("$email password has been reset.");
        // $this->line("$email password has been reset.");
        // $this->newLine(3);
    }
}
