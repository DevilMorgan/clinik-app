<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcSpecialtiesHcTemplatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_specialties_hc_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hc_specialist_id');
            $table->unsignedBigInteger('hc_template_id');
            $table->timestamps();

            $table->foreign('hc_specialist_id')
                ->references('id')
                ->on('hc_specialties')
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
        Schema::dropIfExists('hc_specialties_hc_templates');
    }
}
