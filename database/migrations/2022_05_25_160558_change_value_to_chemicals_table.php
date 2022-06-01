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
        Schema::table('chemicals', function (Blueprint $table) {
            DB::statement("ALTER TABLE chemicals MODIFY calcium_chloride VARCHAR(50)");
            DB::statement("ALTER TABLE chemicals MODIFY sodium_carbonate VARCHAR(50)");
            DB::statement("ALTER TABLE chemicals MODIFY sodium_hypochlorite VARCHAR(50)");
            DB::statement("ALTER TABLE chemicals MODIFY antiscalant VARCHAR(50)");
            DB::statement("ALTER TABLE chemicals MODIFY sodium_hydroxide VARCHAR(50)");
            DB::statement("ALTER TABLE chemicals MODIFY hydrochloric_acid VARCHAR(50)");
            DB::statement("ALTER TABLE chemicals MODIFY kl1 VARCHAR(50)");
            DB::statement("ALTER TABLE chemicals MODIFY kl2 VARCHAR(50)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chemicals', function (Blueprint $table) {
            //
        });
    }
};
