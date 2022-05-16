<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalitationPlants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personalitation_plants', function (Blueprint $table) {
            $table->id();
            $table->enum('irrigation', ['yes', 'no'])->default('no');
            $table->enum('sdi', ['yes', 'no'])->default('no');
            $table->enum('chloride', ['yes', 'no'])->default('no');
            $table->enum('well_pump', ['yes', 'no'])->default('no');
            $table->enum('feed_pump', ['yes', 'no'])->default('no');
            $table->enum('boosterc', ['yes', 'no'])->default('no');
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
        Schema::dropIfExists('personalitation_plants');
    }
}
