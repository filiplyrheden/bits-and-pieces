<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Rune',
            'email' => 'rune@yrgo.se',
            'password' => Hash::make('rune'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'role' => 'user'
        ]);
    }
}
