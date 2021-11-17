<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHmModelsHmCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hm_models_hm_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('history_medical_category_id');
            $table->unsignedBigInteger('history_medical_model_id');
            $table->integer('order');

            $table->foreign('history_medical_category_id')
                ->references('id')
                ->on('history_medical_categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('history_medical_model_id')
                ->references('id')
                ->on('history_medical_models')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hm_models_hm_categories');
    }
}
