<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcTemplatesHcVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_templates_hc_variables', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hc_template_id');
            $table->unsignedBigInteger('hc_variable_id');
            $table->timestamps();

            $table->foreign('hc_template_id')
                ->references('id')
                ->on('hc_templates')
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
        Schema::dropIfExists('hc_templates_hc_variables');
    }
}
