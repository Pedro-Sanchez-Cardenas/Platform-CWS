<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;

class CompaniesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Company::create([
            'name' => 'CORP-CWS',
            'business_name' => 'CLEAR WATER SUPPLY S. DE R.L. DE CV',
            //'rfc',
            //'trn_number',
            'location' => 'C19 X 40 Y 42 #340 DEPTO. 303',
            'zip' => '97115',
            'suburb' => 'Hacienda Dzodzail',
            'countries_id' => '1',
            //'services_id' => '1',
            'currencies_id' => '1'
        ]);

        Company::create([
            'name' => 'CWS-MEX',
            'business_name' => 'CLEAR WATER SUPPLY S. DE R.L. DE CV',
            'rfc' => 'CWS1604061Y7',
            //'trn_number',
            'location' => 'C19 X 40 Y 42 #340 DEPTO. 303',
            'zip' => '97115',
            'suburb' => 'Hacienda Dzodzail',
            'countries_id' => '1',
            'services_id' => '1',
            'currencies_id' => '1'
        ]);

        Company::create([
            'name' => 'CWS-USA',
            'countries_id' => '2',
            'services_id' => '1',
            'currencies_id' => '2'
        ]);

        Company::create([
            'name' => 'KU3',
            'business_name' => 'KU3 AQUA GROUP LTD',
            'rfc' => 'XEXX010101000',
            'trn_number' => '002134861',
            'location' => 'C KNUTSFORD BOULEVARD #53',
            'zip' => 'JMAKN05',
            'suburb' => 'KINGSTON',
            'countries_id' => '3',
            'services_id' => '1',
            'currencies_id' => '3'
        ]);
    }
}
