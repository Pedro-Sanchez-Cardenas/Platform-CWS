<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChemicalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chemicals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_waters_id')->constrained();

            $table->double('calcium_chloride');
            $table->double('sodium_carbonate');
            $table->double('sodium_hypochlorite');
            $table->double('antiscalant');
            $table->double('sodium_hydroxide');
            $table->double('hydrochloric_acid');
            $table->double('kl1');
            $table->double('kl2');
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
        Schema::dropIfExists('chemicals');
    }
}
