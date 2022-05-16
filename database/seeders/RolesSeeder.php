<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Super-Admin']);

        Role::create(['name' => 'Director']);

        Role::create(['name' => 'Operations-Manager']);

        Role::create(['name' => 'Administrative-Manager']);

        Role::create(['name' => 'Manager']);

        Role::create(['name' => 'Operator']);

        Role::create(['name' => 'Client']);
    }
}
