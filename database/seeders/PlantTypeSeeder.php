<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PlantType;

class PlantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PlantType::create([
            'name' => 'SWRO',
            'user_created_at' => '1'
        ]);

        PlantType::create([
            'name' => 'BWRO',
            'user_created_at' => '1'
        ]);
    }
}
