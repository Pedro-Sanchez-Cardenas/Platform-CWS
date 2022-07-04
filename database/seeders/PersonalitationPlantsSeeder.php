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
            'multimedia_filters_quantity' => '3',
            'cisterns_quantity' => '2',
            'polish_filters_types_id' => '10',
            'polish_filters_quantity' => '6',

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
            'multimedia_filters_quantity' => '2',
            'cisterns_quantity' => '3',
            'polish_filters_types_id' => '5',
            'polish_filters_quantity' => '1',

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
            'multimedia_filters_quantity' => '2',
            'cisterns_quantity' => '2',
            'polish_filters_types_id' => '10',
            'polish_filters_quantity' => '3',

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
