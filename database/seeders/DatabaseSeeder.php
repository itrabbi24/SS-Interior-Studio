<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Create 10 random users
        for ($i = 1; $i <= 10; $i++) {
            User::create([
                'name' => 'User '.$i,
                'username' => 'user'.$i,
                'password' => bcrypt('123'), // default password
            ]);
        }

        // Default admin user
        User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'password' => bcrypt('123'),
        ]);

        // Optional: test user
        User::create([
            'name' => 'Test User',
            'username' => 'testuser',
            'password' => bcrypt('123'),
        ]);
    }
}
