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
    // Администратор
    \App\Models\User::create([
        'name' => 'Admin User',
        'email' => 'admin@test.com',
        'password' => \Illuminate\Support\Facades\Hash::make('password'),
        'role' => 'admin',
    ]);

    // Обычный пользователь
    \App\Models\User::create([
        'name' => 'Test User',
        'email' => 'user@test.com',
        'password' => \Illuminate\Support\Facades\Hash::make('password'),
        'role' => 'user',
    ]);
}
}
