<?php

namespace Database\Seeders;

use App\Models\PersonalitationPlant;
use Illuminate\Database\Seeder;

class PersonalitationPlantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PersonalitationPlant::create([
            'irrigation' => 'yes',
            'sdi' => 'no',
            'chloride' => 'no',
            'well_pump' => 'no',
            'feed_pump' => 'no',
            'boosterc' => 'yes',
        ]);

        PersonalitationPlant::create([
            'irrigation' => 'no',
            'sdi' => 'yes',
            'chloride' => 'yes',
            'well_pump' => 'yes',
            'feed_pump' => 'no',
            'boosterc' => 'no',
        ]);

        PersonalitationPlant::create([
            'irrigation' => 'no',
            'sdi' => 'yes',
            'chloride' => 'no',
            'well_pump' => 'yes',
            'feed_pump' => 'no',
            'boosterc' => 'no',
        ]);
    }
}
