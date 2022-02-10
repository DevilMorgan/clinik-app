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
            $table->string('name_first', 100);
            $table->string('name_second', 100);
            $table->string('lastname_first', 100);
            $table->string('lastname_second', 100);
            $table->string('id_card', 50)->nullable();
            $table->unsignedBigInteger('card_type_id')->nullable();
            $table->enum('gender', ['male', 'feminine', 'intersex'])->nullable();
            $table->enum('gender_identity', [
                'male',
                'feminine',
                'transgender',
                'neutral',
                'not declare'
            ])->nullable();
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
            $table->string('occupation', 100)->nullable();
            $table->string('code_occupation', 10)->nullable();
            $table->unsignedBigInteger('level_schooling_id')->nullable();
            $table->string('ethnicity', 100)->nullable();
            $table->string('ethnic_community', 100)->nullable();
            $table->string('stratum', 5)->nullable();

            //birth data
            $table->dateTime('birthday')->nullable();
            $table->string('country_birth', 100);
            $table->string('code_country_birth', 20)->nullable();
            $table->string('department_birth', 100);
            $table->string('code_department_birth', 20)->nullable();
            $table->string('city_birth', 100);
            $table->string('code_city_birth', 20)->nullable();

            //Contact
            $table->string('photo', 100)->nullable();
            $table->string('email')->unique();
            $table->string('phone', 15)->nullable();
            $table->string('cellphone', 15)->nullable();
            $table->string('country', 100)->nullable();
            $table->string('code_country', 20)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('code_department', 20)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('code_city', 20)->nullable();
            $table->string('neighborhood', 200)->nullable();
            $table->string('locality', 100)->nullable();
            $table->string('address', 200)->nullable();
            $table->string('postcode', 100)->nullable();
            $table->enum('uptown', ['urban', 'rural'])->nullable();

            //Medical security
            $table->string('entity', 100)->nullable();
            $table->string('code_entity', 100)->nullable();
            //$table->boolean('status_medical')->default(0);
            $table->string('contributory_regime', 100)->nullable();

            //Medical
            $table->string('blood_group', 50);
            $table->date('opposition_organ_donation')->nullable();
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


            $table->text('observation')->nullable();

            //$table->string('code')->nullable();
            $table->boolean('accept_terms_conditions')->default(0);
            $table->boolean('accept_sending_communications')->default(0);
            $table->boolean('status')->default(0);
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
        Schema::dropIfExists('patients');
    }
}
