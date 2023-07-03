<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin123')
        ]);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@example.com',
            'password' => Hash::make('user123')
        ]);

        $admin->assignRole('Admin');
        $user->assignRole('User');

    }
}
