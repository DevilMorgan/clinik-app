<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHcVariablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hc_variables', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->text('description');
            $table->string('code', 10);
            $table->json('config');
            $table->boolean('status');
            $table->unsignedBigInteger('hc_variable_type_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('hc_variable_type_id')
                ->references('id')
                ->on('hc_variable_types')
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
        Schema::dropIfExists('hc_variables');
    }
}
