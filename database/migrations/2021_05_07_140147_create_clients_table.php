<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();
            $table->string('business_table');
            $table->string('short_name');
            $table->string('tax_id');
            $table->string('location');
            $table->foreignId('client_contacts_id')->nullable()->constrained();
            $table->foreignId('countries_id')->constrained();
            $table->foreignId('companies_id')->constrained();
            $table->foreignId('services_id')->constrained();
            $table->foreignId('data_banks_id')->nullable()->constrained();
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
        Schema::dropIfExists('clients');
    }
}
