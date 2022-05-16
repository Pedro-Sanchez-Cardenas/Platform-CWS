<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('location');
            $table->string('cover_path')->nullable();
            $table->double('installed_capacity')->nullable();
            $table->double('design_limit')->nullable();

            $table->foreignId('polish_filter_types_id')->nullable('polish_filter_types_id');
            $table->integer('polish_filters_quantity')->default('0');

            $table->integer('multimedia_filters_quantity')->default('0');
            $table->integer('cisterns_quantity');

            $table->foreignId('companies_id')->constrained();
            $table->foreignId('clients_id')->nullable()->constrained();
            $table->foreignId('operator')->constrained('users');
            $table->foreignId('manager')->nullable()->constrained('users');
            $table->foreignId('user_created_at')->nullable()->constrained('users');
            $table->foreignId('user_updated_at')->nullable()->constrained('users');

            $table->foreignId('personalitation_plants_id')->constrained();
            $table->foreignId('plant_types_id')->constrained();
            $table->foreignId('countries_id')->constrained();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}