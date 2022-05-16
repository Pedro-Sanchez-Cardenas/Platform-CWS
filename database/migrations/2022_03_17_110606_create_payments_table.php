<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->double('amount');
            $table->date('pay_day');
            $table->foreignId('catalog_conceps_id')->constrained();
            $table->foreignId('payment_status_id')->constrained('payment_status');
            //$table->foreignId('billing_periods_id')->constrained();
            $table->foreignId('providers_id')->constrained();
            $table->string('invoice_path');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */

}
