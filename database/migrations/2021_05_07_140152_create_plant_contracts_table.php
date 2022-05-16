<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plant_contracts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('plants_id')->constrained();
            $table->double('bot_m3')->nullable();
            $table->double('bot_fixed')->nullable();
            $table->double('oym_m3')->nullable();
            $table->double('oym_fixed')->nullable();
            $table->double('remineralitation')->nullable();
            $table->double('total_m3')->nullable();
            $table->double('total_month')->nullable();
            $table->integer('years')->nullable();
            $table->date('from')->nullable();
            $table->date('till')->nullable();
            $table->double('minimun_consumption')->nullable();
            $table->integer('billing_day')->nullable();
            $table->foreignId('payment_types_id')->constrained();

            $table->foreignId('user_created_at')->nullable()->constrained('users');
            $table->foreignId('user_updated_at')->nullable()->constrained('users');
            $table->foreignId('user_deleted_at')->nullable()->constrained('users');
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
        Schema::dropIfExists('plant_contracts');
    }
}
