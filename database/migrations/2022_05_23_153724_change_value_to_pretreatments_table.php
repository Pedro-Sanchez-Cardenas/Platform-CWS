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
        Schema::table('pretratments', function (Blueprint $table) {
            DB::statement("ALTER TABLE pretreatments MODIFY well_pump VARCHAR(50)");
            DB::statement("ALTER TABLE pretreatments MODIFY feed_pump VARCHAR(50)");
            DB::statement("ALTER TABLE pretreatments MODIFY frecuencies_well_pump VARCHAR(50)");
            DB::statement("ALTER TABLE pretreatments MODIFY frecuencies_feed_pump VARCHAR(50)");
            DB::statement("ALTER TABLE pretreatments MODIFY backwash VARCHAR(50)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pretreatments', function (Blueprint $table) {
            // Todos los valores anteriores eran de tipo double.
        });
    }
};
