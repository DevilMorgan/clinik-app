<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCumsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cums', function (Blueprint $table) {
            $table->id();
            $table->string('record', 10)->nullable();
            $table->string('product', 255)->nullable();
            $table->string('holder', 255)->nullable();
            $table->string('health_register', 50)->nullable();
            $table->date('expedition_date')->nullable();
            $table->date('expiration_date')->nullable();
            $table->boolean('registration_status')->nullable();
            $table->string('record_cum', 10)->nullable();
            $table->integer('consecutive_cum')->unsigned()->nullable();
            $table->integer('amount_cum')->unsigned()->nullable();
            $table->text('commercial_description')->nullable();
            $table->boolean('status_cum')->nullable();
            $table->date('active_date')->nullable();
            $table->date('inactive_date')->nullable();
            $table->boolean('medical_sample')->nullable();
            $table->string('unit', 5)->nullable();
            $table->string('atc', 10)->nullable();
            $table->string('description_atc', 255)->nullable();
            $table->string('via_administration', 50)->nullable();
            $table->string('concentration', 3)->nullable();
            $table->text('active_principle')->nullable();
            $table->string('unit_measure', 100)->nullable();
            $table->double('amount')->nullable();
            $table->string('reference_unit', 255)->nullable();
            $table->string('pharmaceutical_form', 100)->nullable();
            $table->string('role_name', 255)->nullable();
            $table->string('role_type', 100)->nullable();
            $table->string('modality', 100)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cums');
    }
}
