<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create default user
        User::factory()->create([
            'prefixname' => 'Mr',
            'firstname' => 'Admin',
            'middlename' => null,
            'lastname' => 'User',
            'suffixname' => null,
            'username' => 'admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'type' => 'user',
            'photo' => 'logo.png', 

        ]);
    }
}
