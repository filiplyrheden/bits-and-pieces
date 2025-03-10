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
            'name' => 'Filip',
            'email' => 'filip@bitsandpieces.com',
            'password' => Hash::make('filip'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Andrea',
            'email' => 'andrea@bitsandpieces.com',
            'password' => Hash::make('andrea'),
            'role' => 'admin'
        ]);

        User::create([
            'name' => 'Rune',
            'email' => 'rune@yrgo.se',
            'password' => Hash::make('rune'),
            'role' => 'user'
        ]);
    }
}
