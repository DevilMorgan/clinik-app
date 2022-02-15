<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateResponsablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('responsables', function (Blueprint $table) {
            $table->id();

            $table->string('companion_name', 100)->nullable();
            $table->string('companion_relationship', 100)->nullable();
            $table->string('companion_address', 100)->nullable();
            $table->string('companion_cellphone', 100)->nullable();
            $table->string('companion_email', 100)->nullable();
            $table->string('companion_sender_name', 100)->nullable();

            $table->string('responsable_name', 100)->nullable();
            $table->string('responsable_relationship', 100)->nullable();
            $table->string('responsable_address', 100)->nullable();
            $table->string('responsable_cellphone', 100)->nullable();
            $table->string('responsable_email', 100)->nullable();

            $table->unsignedBigInteger('record_id');

            $table->foreign('record_id')
                ->on('records')
                ->references('id')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('responsables');
    }
}
