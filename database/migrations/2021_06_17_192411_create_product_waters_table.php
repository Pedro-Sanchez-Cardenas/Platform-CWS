<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductWatersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_waters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plants_id')->constrained();

            $table->double('ph');
            $table->double('hardness');
            $table->double('tds');
            $table->double('h2s');

            $table->double('free_chlorine');
            $table->double('chloride')->nullable();

            $table->text('observations')->nullable();

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
        Schema::dropIfExists('product_waters');
    }
}
