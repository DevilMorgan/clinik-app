<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsForInteroperabilityInPatientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('patients', function (Blueprint $table) {
            //change name and lastname
            $table->renameColumn('name', 'name_first');
            $table->string('name_second', 100)->nullable()->after('name');
            $table->renameColumn('last_name', 'lastname_first');
            $table->string('lastname_second', 100)->nullable()->after('last_name');

            //change marital_status
//            $table->enum('marital_status', [
//                'married',
//                'single',
//                'divorced',
//                'union couples',
//                'widower',
//                'legal separation',
//                'Concubinage',
//                'significant other',
//            ])->nullable()->change();

            //delete place_birth
            $table->dropColumn('place_birth');
            //Add columns for place birth
            $table->string('country_birth', 100)->after('date_birth');
            $table->string('code_country_birth', 20)->nullable()->after('country_birth');
            $table->string('department_birth', 100)->after('code_country_birth');
            $table->string('code_department_birth', 20)->nullable()->after('department_birth');
            $table->string('city_birth', 100)->after('code_department_birth');
            $table->string('code_city_birth', 20)->nullable()->after('city_birth');

            //change gender
            //$table->enum('gender', ['male', 'feminine', 'intersex'])->nullable()->change();

            //add colum Gender identity
            $table->enum('gender_identity', [
                'male',
                'feminine',
                'transgender',
                'neutral',
                'not declare'
            ])->nullable()->after('gender');

            //add code occupation
            $table->string('code_occupation', 20)->nullable()->after('occupation');

            //add colum organ donation opposition
            $table->date('opposition_organ_donation')->nullable()->after('status_medical');

            //add colum advance directive
            $table->date('advance_directive')->nullable()->after('opposition_organ_donation');
            $table->string('code_advance_directive', 100)->nullable()->after('advance_directive');

            //add colum impairment
            $table->enum('impairment', [
                'physical disability',
                'visual impairment',
                'hearing impairment',
                'intellectual disability',
                'psychosocial disability',
                'deaf blind',
                'multiple disability',
                'no disability'
            ])->nullable()->after('code_advance_directive');

            //add columns code country, department and city
            $table->string('code_country', 20)->nullable()->after('country');
            $table->string('code_department', 20)->nullable()->after('department');
            $table->string('code_city', 20)->nullable()->after('city');

            //add columns locality, postcode, stratum, ethnicity, ethnic_community, uptown
            $table->string('locality', 100)->nullable()->after('neighborhood');
            $table->string('postcode', 100)->nullable()->after('code_city');
            $table->string('stratum', 50)->nullable()->after('postcode');
            $table->string('ethnicity', 100)->nullable()->after('stratum');
            $table->string('ethnic_community', 100)->nullable()->after('ethnicity');
            $table->enum('uptown', ['urban', 'rural'])->nullable()->after('ethnic_community');

            //add colum for medical code_entity
            $table->string('code_entity', 20)->nullable()->after('entity');
        });

        DB::statement("ALTER TABLE `patients` CHANGE `gender` `gender` ENUM('male', 'feminine', 'intersex');");
        DB::statement("ALTER TABLE `patients` CHANGE `marital_status` `marital_status` ENUM('married', 'single', 'divorced', 'union couples', 'widower', 'legal separation', 'Concubinage', 'significant other');");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('patients', function (Blueprint $table) {
            $table->dropColumn([
                'name_second',
                'lastname_second',
                'country_birth',
                'code_country_birth',
                'department_birth',
                'code_department_birth',
                'city_birth',
                'code_city_birth',
                'gender_identity',
                'code_occupation',
                'opposition_organ_donation',
                'advance_directive',
                'code_advance_directive',
                'impairment',
                'code_country',
                'code_department',
                'code_city',
                'locality',
                'postcode',
                'stratum',
                'ethnicity',
                'ethnic_community',
                'uptown',
                'code_entity'
            ]);

            $table->string('place_birth',100)->nullable()->after('date_birth');

            $table->renameColumn('name_first', 'name');
            $table->renameColumn('lastname_first', 'last_name');

        });
    }
}
