<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryMedicalCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_medical_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name', 15);
            $table->boolean('status')->default(0);
            $table->boolean('is_various')->default(1);
            $table->unsignedInteger('history_medical_model_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('history_medical_model_id')
                ->references('id')
                ->on('history_medical_models')
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
        Schema::dropIfExists('history_medical_categories');
    }
}
