<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_categories', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('record_id');
            $table->unsignedBigInteger('history_medical_category_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('record_id')
                ->references('id')
                ->on('records')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('history_medical_category_id')
                ->references('id')
                ->on('history_medical_categories')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_categories');
    }
}
