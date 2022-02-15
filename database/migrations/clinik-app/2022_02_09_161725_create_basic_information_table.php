<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_information', function (Blueprint $table) {
            $table->id();

            //Personal information
            $table->string('id_card', 50)->nullable();
            $table->unsignedBigInteger('card_type_id')->nullable();
            $table->enum('marital_status', [
                'married',
                'single',
                'divorced',
                'union couples',
                'widower',
                'legal separation',
                'Concubinage',
                'significant other'
            ])->nullable();
            $table->enum('gender_identity', [
                'male',
                'feminine',
                'transgender',
                'neutral',
                'not declare'
            ])->nullable();
            $table->string('occupation', 100)->nullable();
            $table->string('code_occupation', 10)->nullable();
            $table->string('stratum', 5)->nullable();
            $table->unsignedBigInteger('level_schooling_id')->nullable();

            //Medical
            $table->date('advance_directive')->nullable();
            $table->string('code_advance_directive', 100)->nullable();
            $table->enum('impairment', [
                'physical disability',
                'visual impairment',
                'hearing impairment',
                'intellectual disability',
                'psychosocial disability',
                'deaf blind',
                'multiple disability',
                'no disability'
            ])->nullable();

            //Contact
            $table->string('country', 100)->nullable();
            $table->string('code_country', 20)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('code_department', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('code_city', 20)->nullable();
            $table->string('neighborhood', 200)->nullable();
            $table->string('locality', 100)->nullable();
            $table->string('address', 200)->nullable();
            $table->enum('uptown', ['urban', 'rural'])->nullable();

            //Medical security
            $table->string('entity', 100)->nullable();
            $table->string('code_entity', 100)->nullable();
            //$table->boolean('status_medical')->default(0);
            $table->string('contributory_regime', 100)->nullable();


            $table->unsignedBigInteger('record_id')->nullable();
            $table->foreign('record_id')
                ->references('id')
                ->on('records')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

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
        Schema::dropIfExists('basic_information');
    }
}
