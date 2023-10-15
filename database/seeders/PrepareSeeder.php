<?php

namespace Database\Seeders;

use App\Actions\Fortify\CreateNewUser;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrepareSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(! User::where('email', 'superadmin@app.com')->exists()) {
            (new CreateNewUser)->create([
                'name' => 'Superadmin',
                'email' => 'superadmin@app.com',
                'password' => 'password',
                'password_confirmation' => 'password',
            ]);
        }
    }
}
