<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_medical_records', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->unsignedInteger('history_medical_category_id');
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('patient_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('history_medical_category_id')
                ->references('id')
                ->on('history_medical_categories')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('history_medical_records');
    }
}
