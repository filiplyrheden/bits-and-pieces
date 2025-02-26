<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Console;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $nes = Console::where('platform', 'NES')->first();
        $snes = Console::where('platform', 'SNES')->first();
        $n64 = Console::where('platform', 'N64')->first();
        $megaDrive = Console::where('platform', 'Mega Drive')->first();
        $playstation = Console::where('platform', 'PlayStation')->first();

        $products = [
            [
                'name' => 'Power Stick',
                'console_id' => $nes->id,
                'description' => 'Original NES port. Unrivalled game play experience. 1.8 m cable allows for ease of movement.',
                'colour' => 'Grey',
                'connection' => 'cable',
                'price' => 300
            ],
            [
                'name' => 'N64 Controller',
                'console_id' => $n64->id,
                'description' => 'N64 controller in apoplectic red. 3 m cable.',
                'colour' => 'Red',
                'connection' => 'cable',
                'price' => 250
            ],
            [
                'name' => 'SNES Controller',
                'console_id' => $snes->id,
                'description' => 'Classic SNES controller with responsive buttons and comfortable grip.',
                'colour' => 'Purple',
                'connection' => 'wireless',
                'price' => 220
            ],
            [
                'name' => 'PlayStation Controller',
                'console_id' => $playstation->id,
                'description' => 'Original PlayStation controller with ergonomic design.',
                'colour' => 'Grey',
                'connection' => 'cable',
                'price' => 280
            ],
            [
                'name' => 'Mega Drive 6-Button Controller',
                'console_id' => $megaDrive->id,
                'description' => 'Six-button controller for Mega Drive with improved D-pad.',
                'colour' => 'Black',
                'connection' => 'wireless',
                'price' => 240
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
