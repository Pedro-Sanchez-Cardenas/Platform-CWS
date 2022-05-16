<?php

namespace Database\Seeders;

use App\Models\Currency;
use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Currency::create([
            'name' => 'Peso Mexicano',
            'abbreviation' => 'MXN',
            'value' => '20.81',
            'main_currency' => '0'
        ]);

        Currency::create([
            'name' => 'Dólar Estadounidense',
            'abbreviation' => 'USD',
            'value' => '1.0',
            'main_currency' => '1'
        ]);

        Currency::create([
            'name' => 'Dólar Jamaicano',
            'abbreviation' => 'JMD',
            'value' => '156.23',
            'main_currency' => '0'
        ]);
    }
}
