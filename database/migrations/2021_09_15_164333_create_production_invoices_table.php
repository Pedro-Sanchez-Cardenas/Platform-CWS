<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductionInvoicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('production_invoices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plants_id')->constrained();
            $table->date('invoice_start');
            $table->date('invoice_end');
            $table->foreignId('plant_contracts_id');
            $table->double('discount');
            $table->double('productings_trains');
            $table->double('production_irrigation');
            $table->double('production_municipal');
            $table->double('vat');
            $table->double('total');
            $table->string('status'); // Cambiar por production_invoice_types

            $table->foreignId('user_created_at')->nullable()->constrained('users');
            $table->foreignId('user_updated_at')->nullable()->constrained('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('production_invoices');
    }
}
