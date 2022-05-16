<?php

namespace Database\Seeders;

use App\Models\Country;
use Illuminate\Database\Seeder;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Country::create([
            'name' => 'México',
            'abbreviation' => 'MX',
            'vat' => '16',
            'currencies_id' => '1'
        ]);

        Country::create([
            'name' => 'Estados Unidos',
            'abbreviation' => 'US',
            'vat' => '00',
            'currencies_id' => '2'
        ]);

        Country::create([
            'name' => 'Jamaica',
            'abbreviation' => 'JM',
            'vat' => '15',
            'currencies_id' => '3'
        ]);
    }
}
