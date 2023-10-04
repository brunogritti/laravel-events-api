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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->string('address')->nullable();
            $table->string('number', 10)->nullable();
            $table->string('neighborhood', 60)->nullable();
            $table->string('complement', 60)->nullable();
            $table->string('zipcode')->nullable();
            $table->foreignId('city_id')->constrained('cities')->nullable();
            $table->foreignId('state_id')->constrained('states')->nullable();
            $table->string('latitude', 20)->nullable();
            $table->string('longitude', 20)->nullable();
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
        Schema::create('addresses', function (Blueprint $table) {
            $table->dropForeign('addresses_city_id_foreign');
            $table->dropForeign('addresses_state_id_foreign');
            $table->dropForeign('addresses_user_id_foreign');
        });

        Schema::dropIfExists('addresses');
    }
};