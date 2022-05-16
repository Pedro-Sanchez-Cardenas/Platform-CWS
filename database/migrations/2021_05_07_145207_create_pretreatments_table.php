<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePretreatmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pretreatments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plants_id')->nullable()->constrained();
            $table->foreignId('trains_id')->constrained();
            $table->integer('group_by');

            $table->double('well_pump')->nullable();
            $table->double('feed_pump')->nullable();

            $table->double('frecuencies_well_pump')->nullable();
            $table->double('frecuencies_feed_pump')->nullable();

            $table->double('backwash');
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
        Schema::dropIfExists('pretreatments');
    }
}
