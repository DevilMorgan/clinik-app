<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryMedicalVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_medical_variables', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->boolean('status')->default(0);
            $table->json('config')->nullable();
            $table->unsignedBigInteger('history_medical_category_id');
            $table->unsignedBigInteger('variable_type_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('history_medical_category_id')
                ->references('id')
                ->on('history_medical_categories')
                ->onUpdate('restrict')
                ->onDelete('restrict');
            $table->foreign('variable_type_id')
                ->references('id')
                ->on('variable_types')
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
        Schema::dropIfExists('history_medical_variables');
    }
}
