<?php

namespace Database\Seeders;

use App\Models\PaymentType;
use Illuminate\Database\Seeder;

class PaymentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PaymentType::create([
            'name' => 'Weekly',
            'user_created_at' => 1
        ]);

        PaymentType::create([
            'name' => 'Biweekly',
            'user_created_at' => 1
        ]);

        PaymentType::create([
            'name' => 'Monthly',
            'user_created_at' => 1
        ]);

        PaymentType::create([
            'name' => 'Bimonthly',
            'user_created_at' => 1
        ]);

        PaymentType::create([
            'name' => 'Quarterly',
            'user_created_at' => 1
        ]);

        PaymentType::create([
            'name' => 'Biannual',
            'user_created_at' => 1
        ]);
    }
}
