<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_waters', function (Blueprint $table) {
            DB::statement("ALTER TABLE product_waters MODIFY ph VARCHAR(50)");
            DB::statement("ALTER TABLE product_waters MODIFY hardness VARCHAR(50)");
            DB::statement("ALTER TABLE product_waters MODIFY tds VARCHAR(50)");
            DB::statement("ALTER TABLE product_waters MODIFY h2s VARCHAR(50)");

            DB::statement("ALTER TABLE product_waters MODIFY free_chlorine VARCHAR(50)");
            DB::statement("ALTER TABLE product_waters MODIFY chloride VARCHAR(50)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_waters', function (Blueprint $table) {
            //
        });
    }
};
