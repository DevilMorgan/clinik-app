<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcModulesHcVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_modules_hc_variables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hc_module_id');
            $table->unsignedBigInteger('hc_variable_id');

            $table->foreign('hc_module_id')
                ->references('id')
                ->on('hc_modules')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('hc_variable_id')
                ->references('id')
                ->on('hc_variables')
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
        Schema::dropIfExists('hc_modules_hc_variables');
    }
}
