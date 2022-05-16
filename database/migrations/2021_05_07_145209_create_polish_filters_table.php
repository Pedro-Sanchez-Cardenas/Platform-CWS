<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolishFiltersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polish_filters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pretreatments_id')->constrained();
            $table->foreignId('trains_id')->constrained();
            $table->double('in');
            $table->double('out');
            $table->timestamp('filter_change')->nullable();
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
        Schema::dropIfExists('polish_filter');
    }
}
