<?php

namespace Database\Seeders;

use App\Models\PolishFilterType;
use Illuminate\Database\Seeder;

class PolishFiltersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Cartridge
        for ($i = 1; $i < 6; $i++) {
            PolishFilterType::create([
                'name' => 'Cartridge',
                'microns' => $i,
                'user_created_at' => '1'
            ]);
        }

        // Bags
        for ($j = 1; $j < 6; $j++) {
            PolishFilterType::create([
                'name' => 'Bags',
                'microns' => $j,
                'user_created_at' => '1'
            ]);
        }
    }
}
