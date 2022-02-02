<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcModulesHcTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_modules_hc_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hc_module_id');
            $table->unsignedBigInteger('hc_template_id');
            $table->timestamps();

            $table->foreign('hc_module_id')
                ->references('id')
                ->on('hc_modules')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('hc_template_id')
                ->references('id')
                ->on('hc_templates')
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
        Schema::dropIfExists('hc_modules_hc_templates');
    }
}
