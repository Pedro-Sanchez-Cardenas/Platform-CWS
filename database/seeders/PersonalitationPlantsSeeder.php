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
            'feed_flow' => 'yes',
            'permeate_flow' => 'yes',
            'reject_flow' => 'no'
        ]);

        PersonalitationPlant::create([
            'irrigation' => 'no',
            'sdi' => 'yes',
            'chloride' => 'yes',
            'well_pump' => 'yes',
            'feed_pump' => 'no',
            'boosterc' => 'no',
            'feed_flow' => 'no',
            'permeate_flow' => 'yes',
            'reject_flow' => 'yes'
        ]);

        PersonalitationPlant::create([
            'irrigation' => 'no',
            'sdi' => 'yes',
            'chloride' => 'no',
            'well_pump' => 'yes',
            'feed_pump' => 'no',
            'boosterc' => 'no',
            'feed_flow' => 'yes',
            'permeate_flow' => 'yes',
            'reject_flow' => 'no'
        ]);
    }
}
