<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordBasicInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_basic_information', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('record_id')->nullable();

            //Information patient
            //Personal information
            $table->string('patient_name', 100);
            $table->string('patient_last_name', 100);
            $table->string('patient_id_card', 50)->nullable();
            $table->date('patient_date_birth')->nullable();
            $table->string('patient_place_birth',100)->nullable();
            $table->text('patient_observation')->nullable();
            $table->string('patient_blood_group', 50);
            $table->enum('patient_gender', ['male', 'feminine'])->nullable();
            $table->string('patient_occupation', 100)->nullable();
            $table->enum('patient_marital_status', [
                'significant other',
                'married',
                'single',
                'divorced',
            ])->nullable();
            $table->unsignedBigInteger('patient_card_type_id')->nullable();


            //Contact
            $table->string('patient_cellphone', 15)->nullable();
            $table->string('patient_email')->nullable();
            $table->string('patient_phone', 15)->nullable();
            $table->string('patient_address', 200)->nullable();
            $table->string('patient_neighborhood', 200)->nullable();
            $table->string('patient_city', 100)->nullable();

            //Medical security
            $table->string('patient_entity', 100)->nullable();
            $table->string('patient_contributory_regime', 100)->nullable();
            $table->boolean('patient_status_medical')->default(0);

            //Information of user
            $table->string('user_name', 100)->nullable();
            $table->string('user_last_name', 100)->nullable();
            $table->string('user_email')->nullable();
            $table->string('user_id_card', 50)->nullable();
            $table->string('user_cellphone', 15)->nullable();
            $table->unsignedBigInteger('user_card_type_id')->nullable();
            $table->string('user_code_profession', 100)->nullable();
            $table->string('user_profession', 100)->nullable();

            $table->foreign('record_id')
                ->references('id')
                ->on('records')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('patient_card_type_id')
                ->references('id')
                ->on('card_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('user_card_type_id')
                ->references('id')
                ->on('card_types')
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
        Schema::dropIfExists('record_basic_information');
    }
}
