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
            $table->unsignedBigInteger('record_category_id');
            $table->unsignedBigInteger('history_medical_variable_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('record_category_id')
                ->references('id')
                ->on('record_categories')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreign('history_medical_variable_id')
                ->references('id')
                ->on('history_medical_variables')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
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
