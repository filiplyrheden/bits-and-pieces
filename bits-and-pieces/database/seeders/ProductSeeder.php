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
                'name' => 'RageProof NES Controller',
                'console_id' => $nes->id,
                'description' => 'Reinforced plastic shell with impact-resistant buttons. Designed for the gamer who tends to throw controllers at the wall during Battletoads.',
                'color' => 'Grey',
                'connection' => 'cable',
                'price' => 199.99
            ],
            [
                'name' => 'ThrowSafe NES Pad',
                'console_id' => $nes->id,
                'description' => 'Extra-long 3m cable so you can throw it without yanking your console off the shelf. Rubberized grip won\'t slip during sweaty rage moments.',
                'color' => 'Black',
                'connection' => 'wireless',
                'price' => 349.99
            ],
            [
                'name' => 'Tantrum-Tech NES Controller',
                'console_id' => $nes->id,
                'description' => 'Special foam padding around the edges absorbs impact when thrown. Comes with a wall-mount recovery station for quick retrieval after outbursts.',
                'color' => 'Red',
                'connection' => 'wireless',
                'price' => 429.99
            ],
            [
                'name' => 'FuryMaster NES Pro',
                'console_id' => $nes->id,
                'description' => 'Featuring our patented AngerGrip™ technology that senses when you\'re squeezing too hard and automates your character for 10 seconds while you cool down.',
                'color' => 'Blue',
                'connection' => 'cable',
                'price' => 159.99
            ],
            [
                'name' => 'ControlYourself NES Pad',
                'console_id' => $nes->id,
                'description' => 'Comes with built-in stress balls on each side. When Ninja Gaiden gets too frustrating, just squeeze the sides instead of slamming the controller down.',
                'color' => 'Purple',
                'connection' => 'wireless',
                'price' => 379.99
            ],
            [
                'name' => 'TempTamer SNES Controller',
                'console_id' => $snes->id,
                'description' => 'Tempered plastic casing that can withstand drops from up to 12 feet. Perfect for those Super Mario World special stages that drive you up the wall.',
                'color' => 'Grey',
                'connection' => 'cable',
                'price' => 299.99
            ],
            [
                'name' => 'FrustrationFree SNES Pad',
                'console_id' => $snes->id,
                'description' => 'Includes a special "calm down" button that pauses the game and plays soothing music when pressed. Helps prevent controller-breaking moments during difficult boss fights.',
                'color' => 'Yellow',
                'connection' => 'wireless',
                'price' => 419.99
            ],
            [
                'name' => 'MeltdownManager SNES Pro',
                'console_id' => $snes->id,
                'description' => 'Shock-absorbing internal chassis protects against rage squeezes and table slams. Extra responsive buttons mean you can\'t blame the controller for your failures!',
                'color' => 'Green',
                'connection' => 'cable',
                'price' => 129.99
            ],
            [
                'name' => 'RageSage SNES Controller',
                'console_id' => $snes->id,
                'description' => 'Features a built-in decibel meter that flashes warning lights when you start yelling at your game. Helps prevent the controller-throwing that follows the shouting.',
                'color' => 'White',
                'connection' => 'wireless',
                'price' => 439.99
            ],
            [
                'name' => 'ChillOut SNES Pad',
                'console_id' => $snes->id,
                'description' => 'Controller shell made from the same material as stress balls. Squeeze to your heart\'s content without damaging the electronics inside.',
                'color' => 'Orange',
                'connection' => 'cable',
                'price' => 299.99
            ],
            [
                'name' => 'TantrumTamer N64 Controller',
                'console_id' => $n64->id,
                'description' => 'Triple-reinforced joystick that won\'t break even during the most intense Mario Party mini-games. Throw it, squeeze it, or slam it - it survives!',
                'color' => 'Green',
                'connection' => 'cable',
                'price' => 349.99
            ],
            [
                'name' => 'ApoplecticProof N64 Pad',
                'console_id' => $n64->id,
                'description' => 'Water-resistant design for when you spill drinks during rage moments. Extra thick cable withstands repeated yanking during heated gameplay sessions.',
                'color' => 'Blue',
                'connection' => 'cable',
                'price' => 329.99
            ],
            [
                'name' => 'RageReady N64 Pro',
                'console_id' => $n64->id,
                'description' => 'Comes with our exclusive MeltdownMeter™ - LEDs that change from green to red as your button mashing intensity increases, warning you to take a breath.',
                'color' => 'Red',
                'connection' => 'wireless',
                'price' => 599.99
            ],
            [
                'name' => 'SmashSafe N64 Controller',
                'console_id' => $n64->id,
                'description' => 'Made with military-grade drop protection. We literally tested this by throwing it off a building after losing at GoldenEye multiplayer.',
                'color' => 'Black',
                'connection' => 'cable',
                'price' => 149.99
            ],
            [
                'name' => 'ZenMaster N64 Pad',
                'console_id' => $n64->id,
                'description' => 'Ergonomic design with cooling gel pads that keep your hands relaxed even during stressful gameplay. Includes a meditation guide for when Bowser is winning.',
                'color' => 'Purple',
                'connection' => 'wireless',
                'price' => 459.99
            ],
            [
                'name' => 'MeltdownProtector Mega Drive Controller',
                'console_id' => $megaDrive->id,
                'description' => 'Extra-responsive D-pad and buttons mean no more excuses for losing at Sonic. Reinforced case withstands being slammed down after that "impossible" boss fight.',
                'color' => 'Black',
                'connection' => 'cable',
                'price' => 279.99
            ],
            [
                'name' => 'RampageResistant Mega Drive Pad',
                'console_id' => $megaDrive->id,
                'description' => 'Durable rubber coating that improves grip even during the sweatiest gaming sessions. Won\'t crack when thrown at your sibling for screen-watching.',
                'color' => 'Blue',
                'connection' => 'cable',
                'price' => 99.99
            ],
            [
                'name' => 'AngerManagement Mega Drive Pro',
                'console_id' => $megaDrive->id,
                'description' => 'Comes with a special "pause and breathe" button that temporarily disables all other inputs for 5 seconds, forcing you to reconsider throwing your controller.',
                'color' => 'Red',
                'connection' => 'cable',
                'price' => 299.99
            ],
            [
                'name' => 'FuryContainment Mega Drive Controller',
                'console_id' => $megaDrive->id,
                'description' => 'Features our patented RageReleaser™ buttons on the back - squeeze these instead of crushing your controller when Ecco the Dolphin gets too frustrating.',
                'color' => 'Green',
                'connection' => 'cable',
                'price' => 289.99
            ],
            [
                'name' => 'TempestTamer Mega Drive Pad',
                'console_id' => $megaDrive->id,
                'description' => 'Designed with a special shock-absorbing frame that distributes impact force when the controller is thrown or dropped. Keep your cool during Shinobi!',
                'color' => 'Yellow',
                'connection' => 'wireless',
                'price' => 369.99
            ],
            [
                'name' => 'WreckResistant PlayStation Controller',
                'console_id' => $playstation->id,
                'description' => 'Enhanced durability for those Crash Bandicoot rage moments. Survive being thrown, stepped on, or squeezed in frustration during those tight platforming sections.',
                'color' => 'Grey',
                'connection' => 'cable',
                'price' => 329.99
            ],
            [
                'name' => 'MoodManager PlayStation Pad',
                'console_id' => $playstation->id,
                'description' => 'Features mood-lighting that shifts to calming blue tones when button pressing becomes aggressive. Helps prevent controller casualties during difficult games.',
                'color' => 'Black',
                'connection' => 'cable',
                'price' => 349.99
            ],
            [
                'name' => 'SerenityNow PlayStation Pro',
                'console_id' => $playstation->id,
                'description' => 'Equipped with soft-touch buttons that remain responsive no matter how hard you press. Includes detachable stress reliever grips for Final Fantasy boss battles.',
                'color' => 'White',
                'connection' => 'cable',
                'price' => 359.99
            ],
            [
                'name' => 'FuryDefender PlayStation Controller',
                'console_id' => $playstation->id,
                'description' => 'Armored exterior shell can withstand being thrown against the wall after dying in Metal Gear Solid for the tenth time. Includes a calming tea voucher.',
                'color' => 'Red',
                'connection' => 'cable',
                'price' => 339.99
            ],
            [
                'name' => 'TranquilGamer PlayStation Pad',
                'console_id' => $playstation->id,
                'description' => 'Built with a vibration feature that engages when your grip becomes too intense, reminding you to relax before you crush your controller during Resident Evil jumpscares.',
                'color' => 'Blue',
                'connection' => 'cable',
                'price' => 349.99
            ],
            [
                'name' => 'UltimateCalm PlayStation Controller',
                'console_id' => $playstation->id,
                'description' => 'Our premium controller features adjustable tension settings, so you can customize how the buttons feel. Includes advanced drop protection for Gran Turismo rage moments.',
                'color' => 'Gold',
                'connection' => 'cable',
                'price' => 399.99
            ],
            [
                'name' => 'AngerArmor N64 Special Edition',
                'console_id' => $n64->id,
                'description' => 'Limited edition controller with titanium-reinforced joystick. Perfect for Mario Kart 64 Rainbow Road attempts that end in controller-throwing disasters.',
                'color' => 'Silver',
                'connection' => 'wireless',
                'price' => 649.99
            ],
            [
                'name' => 'SuperSoother SNES Deluxe',
                'console_id' => $snes->id,
                'description' => 'Premium controller with aromatherapy pods that release calming scents when the going gets tough. Special edition for those who\'ve broken multiple controllers playing Super Ghouls \'n Ghosts.',
                'color' => 'Translucent Purple',
                'connection' => 'cable',
                'price' => 399.99
            ],
            [
                'name' => 'RageCage NES Ultimate',
                'console_id' => $nes->id,
                'description' => 'Our most durable controller ever, with a lifetime warranty. Encased in a special polymer that can withstand being thrown against concrete. For the Ninja Gaiden veterans who have destroyed one controller too many.',
                'color' => 'Translucent Blue',
                'connection' => 'wireless',
                'price' => 699.99
            ]
        ];

        foreach ($products as $productData) {
            Product::create($productData);
        }
    }
}
