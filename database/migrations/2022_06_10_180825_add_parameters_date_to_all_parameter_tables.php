<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('boosters', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });

        Schema::table('chemicals', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });

        Schema::table('cisterns', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });

        Schema::table('multimedia_filters', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });

        Schema::table('operations', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });

        Schema::table('polish_filters', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });

        Schema::table('pretreatments', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });

        Schema::table('production_readings', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });

        Schema::table('product_waters', function (Blueprint $table) {
            $table->date('parameters_date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('boosters', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });

        Schema::table('chemicals', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });

        Schema::table('cisterns', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });

        Schema::table('multimedia_filters', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });

        Schema::table('operations', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });

        Schema::table('polish_filters', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });

        Schema::table('pretreatments', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });

        Schema::table('production_readings', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });

        Schema::table('product_waters', function (Blueprint $table) {
            $table->removeColumn('parameters_date');
        });
    }
};
