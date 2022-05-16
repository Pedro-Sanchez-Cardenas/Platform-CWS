<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('business_name')->nullable();
            $table->string('rfc')->nullable();
            $table->string('trn_number')->nullable();
            $table->string('location')->nullable();
            $table->string('zip')->nullable();
            $table->string('suburb')->nullable();
            $table->foreignId('countries_id')->constrained();
            $table->foreignId('services_id')->nullable()->constrained();
            $table->foreignId('currencies_id')->constrained();
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
        Schema::dropIfExists('companies');
    }
}
