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
        Schema::table('operations', function (Blueprint $table) {
            DB::statement("ALTER TABLE operations MODIFY hp VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY hpF VARCHAR(50)");

            DB::statement("ALTER TABLE operations MODIFY sdi VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY ph VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY temperature VARCHAR(50)");

            DB::statement("ALTER TABLE operations MODIFY feed VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY permeate VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY reject VARCHAR(50)");

            DB::statement("ALTER TABLE operations MODIFY feed_flow VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY permeate_flow VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY reject_flow VARCHAR(50)");

            DB::statement("ALTER TABLE operations MODIFY hp_in VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY hp_out VARCHAR(50)");
            DB::statement("ALTER TABLE operations MODIFY reject_pressure VARCHAR(50)");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('operations', function (Blueprint $table) {
            //
        });
    }
};
