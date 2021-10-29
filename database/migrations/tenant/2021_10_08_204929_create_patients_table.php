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
            //Personal information
            $table->string('name', 100);
            $table->string('last_name', 100);
            $table->string('id_card', 50)->nullable();
            $table->string('photo', 100)->nullable();
            $table->date('date_birth')->nullable();
            $table->string('place_birth',100)->nullable();
            $table->string('age',3)->nullable();
            $table->enum('gender', ['male', 'feminine'])->nullable();
            $table->string('occupation', 100)->nullable();
            $table->enum('marital_status', [
                'significant other',
                'married',
                'single',
                'divorced',
            ])->nullable();

            //Contact
            $table->string('cellphone', 15)->nullable();
            $table->string('email')->unique();
            $table->string('phone', 15)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('neighborhood', 200)->nullable();
            $table->string('city', 100)->nullable();

            //Medical security
            $table->string('entity', 100)->nullable();
            $table->string('contributory_regime', 100)->nullable();
            $table->boolean('status_medical')->default(0);

            $table->string('code')->nullable();
            $table->boolean('status')->default(0);
            $table->unsignedBigInteger('card_type_id')->nullable();

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
