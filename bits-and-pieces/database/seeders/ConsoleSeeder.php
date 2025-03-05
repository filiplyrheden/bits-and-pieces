<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Console;

class ConsoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $consoles = [
            ['manufacturer' => 'Nintendo', 'platform' => 'NES'],
            ['manufacturer' => 'Nintendo', 'platform' => 'SNES'],
            ['manufacturer' => 'Nintendo', 'platform' => 'N64'],
            ['manufacturer' => 'Sega', 'platform' => 'Mega Drive'],
            ['manufacturer' => 'Sony', 'platform' => 'PlayStation']
        ];

        foreach ($consoles as $console) {
            Console::create($console);
        }
    }
}
