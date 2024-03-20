<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * to use the seeder, run the following command: php artisan db:seed --class=SuperAdminSeeder
     */
    public function run(): void
    {
        User::create([
            'name' => 'Super Admin',
            'email' => 'superadmin@example.com',
            'password' => Hash::make('superAdmin1234'), // Hash the password 
            'role' => 'admin',
        ]);
    }
}
