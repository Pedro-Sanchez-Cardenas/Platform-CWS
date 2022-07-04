<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePolishFiltersTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('polish_filters_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('microns');
            
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
        Schema::dropIfExists('polish_filters_types');
    }
}
