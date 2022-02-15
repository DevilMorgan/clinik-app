<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClinicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clinics', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('address', 100)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('code_country', 20)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('code_department', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('code_city', 20)->nullable();
            $table->string('schedule', 100)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('cellphone', 15)->nullable();
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
        Schema::dropIfExists('clinics');
    }
}
