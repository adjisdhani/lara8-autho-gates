<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'User Viewer',
            'email' => 'adjis@adjis.com',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
        ]);

        // User 2: Bisa mengelola data
        User::create([
            'name' => 'User Manager',
            'email' => 'adjis1@adjis1.com',
            'password' => Hash::make('password'), // Ganti dengan password yang diinginkan
        ]);
    }
}
