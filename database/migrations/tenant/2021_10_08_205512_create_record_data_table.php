<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordDataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_data', function (Blueprint $table) {
            $table->id();
            $table->json('value');
            $table->unsignedInteger('history_medical_record_id');
            $table->unsignedInteger('history_medical_variable_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('history_medical_record_id')
                ->references('id')
                ->on('history_medical_records')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('history_medical_variable_id')
                ->references('id')
                ->on('history_medical_variables')
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
        Schema::dropIfExists('record_data');
    }
}
