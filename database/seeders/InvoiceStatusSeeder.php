<?php

namespace Database\Seeders;


use App\Models\InvoiceStatus;
use Illuminate\Database\Seeder;

class InvoiceStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        InvoiceStatus::create([
            'name' => 'Not processed'
        ]);
        InvoiceStatus::create([
            'name' => 'Processed'
        ]);
        InvoiceStatus::create([
            'name' => 'Verified'
        ]);
        InvoiceStatus::create([
            'name' => 'Billed'
        ]);
        InvoiceStatus::create([
            'name' => 'Partial payment'
        ]);
        InvoiceStatus::create([
            'name' => 'Full payment'
        ]);
        InvoiceStatus::create([
            'name' => 'Not payed'
        ]);
    }
}