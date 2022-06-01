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
        Schema::table('boosters', function (Blueprint $table) {
            DB::statement("ALTER TABLE boosters MODIFY amperage VARCHAR(50)");
            DB::statement("ALTER TABLE boosters MODIFY frequency VARCHAR(50)");
            DB::statement("ALTER TABLE boosters MODIFY px VARCHAR(50)");
            DB::statement("ALTER TABLE boosters MODIFY booster_flow VARCHAR(50)");
            DB::statement("ALTER TABLE boosters MODIFY booster_pressures VARCHAR(50)");
            DB::statement("ALTER TABLE boosters MODIFY booster_pressures_total VARCHAR(50)");
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
            //
        });
    }
};
