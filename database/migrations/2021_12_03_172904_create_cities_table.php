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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60);
            $table->string('slug', 60)->nullable();
            $table->foreignId('state_id')->constrained('states');;
            $table->enum('active', ['yes', 'no'])->default('yes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::create('cities', function (Blueprint $table) {
            $table->dropForeign('cities_state_id_foreign');
        });

        Schema::dropIfExists('cities');
    }
};