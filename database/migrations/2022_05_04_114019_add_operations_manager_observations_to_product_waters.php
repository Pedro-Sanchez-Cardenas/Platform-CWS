<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOperationsManagerObservationsToProductWaters extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_waters', function (Blueprint $table) {
            $table->text('ope_mana_observation')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_waters', function (Blueprint $table) {
            $table->removeColumn('ope_mana_observation');
        });
    }
}
