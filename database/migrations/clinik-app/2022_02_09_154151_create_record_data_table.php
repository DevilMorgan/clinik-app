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
            $table->unsignedBigInteger('hc_variable_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('record_category_id')
                ->references('id')
                ->on('record_categories')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreign('hc_variable_id')
                ->references('id')
                ->on('hc_variables')
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
        Schema::dropIfExists('record_data');
    }
}
