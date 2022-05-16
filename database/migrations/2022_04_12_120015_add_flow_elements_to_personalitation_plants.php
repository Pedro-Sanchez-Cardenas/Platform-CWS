<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFlowElementsToPersonalitationPlants extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('personalitation_plants', function (Blueprint $table) {
            $table->enum('feed_flow', ['yes', 'no'])->default('no')->after('boosterc');
            $table->enum('permeate_flow', ['yes', 'no'])->default('no')->after('feed_flow');
            $table->enum('reject_flow', ['yes', 'no'])->default('no')->after('permeate_flow');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('personalitation_plants', function (Blueprint $table) {
            //
        });
    }
}
