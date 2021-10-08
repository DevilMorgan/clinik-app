<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('email')->unique();
            $table->string('id_card', 50)->nullable();
            $table->string('photo', 100)->nullable();
            $table->string('cellphone', 15)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('medical_security', 100)->nullable();
            $table->string('code');
            $table->boolean('status')->default(0);
            $table->unsignedSmallInteger('card_type_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('card_type_id')
                ->references('id')
                ->on('card_types')
                ->onUpdate('set null')
                ->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('patients');
    }
}
