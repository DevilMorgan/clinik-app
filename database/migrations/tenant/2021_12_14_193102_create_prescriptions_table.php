<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePrescriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prescriptions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 255)->nullable();
            $table->string('pharmaceutical_quantity', 255)->nullable();
            $table->string('dose', 45)->nullable();
            $table->string('frequency', 45)->nullable();
            $table->string('via_administration', 45)->nullable();
            $table->string('amount', 45)->nullable();
            $table->string('duration', 45)->nullable();
            $table->integer('delivery')->nullable();
            $table->text('indications')->nullable();
            $table->text('recommendations')->nullable();
            $table->unsignedBigInteger('diagnosis_id')->nullable();
            $table->unsignedBigInteger('cums_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('diagnosis_id')
                ->on('diagnosis')
                ->references('id')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('prescriptions');
    }
}
