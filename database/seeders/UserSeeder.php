<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Check if user already exists
        if (!User::where('username', 'admin')->exists()) {
            User::create([
                'name' => 'Admin',
                'username' => 'admin',
                'password' => Hash::make('123'), // change to secure password
            ]);
        }
    }
}
