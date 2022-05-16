<?php

namespace Database\Seeders;

use App\Models\MembraneActiveArea;
use Illuminate\Database\Seeder;

class MembraneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MembraneActiveArea::create([
            'ft2' => '440',
            'user_created_at' => '1'
        ]);
    }
}
