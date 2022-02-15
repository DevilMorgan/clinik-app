<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDisabilityDaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('disability_days', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['new', 'extension'])->nullable();
            $table->unsignedSmallInteger('days')->nullable();
            $table->unsignedSmallInteger('maternity leave')->nullable();
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
        Schema::dropIfExists('disability_days');
    }
}
