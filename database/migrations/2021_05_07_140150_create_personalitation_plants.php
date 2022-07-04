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
            $table->foreignId('polish_filters_types_id')->nullable()->constrained();

            $table->integer('polish_filters_quantity')->default('0');
            $table->integer('multimedia_filters_quantity')->default('0');
            $table->integer('cisterns_quantity')->default('0');

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
