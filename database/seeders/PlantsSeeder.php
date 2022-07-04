<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plant;

class PlantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plant::create([
            'name' => 'IBEROSTAR ROSE HALL',
            'location' => 'Montego Bay',
            'countries_id' => '3',
            //'cover_path', // nullable
            //'installed_capacity',
            'companies_id' => '4',
            //'clients_id' => '1',
            'plant_types_id' => '1',
            //'design_limit',

            'operator' => '9',
            'manager' => '8',
            'user_created_at'  => '1',

            'personalitation_plants_id' => '1'
        ]);

        Plant::create([
            'name' => 'SECRETS',
            'location' => 'Playa del Carmen',
            //'cover_path', // nullable
            //'installed_capacity',
            // 'design_limit
            'companies_id' => '2',
            //'clients_id' => '2',
            'plant_types_id' => '1',
            'countries_id' => '1',

            'operator' => '11',
            'user_created_at'  => '1',
            'personalitation_plants_id' => '2'
        ]);

        Plant::create([
            'name' => 'MOON PALACE JAMAICA',
            'location' => 'Ocho Ríos',
            'countries_id' => '3',
            //'cover_path', // nullable
            //'installed_capacity',
            'companies_id' => '4',
            // 'clients_id' => '3',
            'plant_types_id' => '1',
            //'design_limit',

            'operator' => '10',
            'manager' => '8',
            'user_created_at'  => '1',

            'personalitation_plants_id' => '3'
        ]);
    }
}
