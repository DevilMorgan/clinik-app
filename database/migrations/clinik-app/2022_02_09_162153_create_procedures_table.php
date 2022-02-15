<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProceduresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('procedures', function (Blueprint $table) {
            $table->id();

            $table->string('code', 15)->nullable();
            $table->string('description', 255)->nullable();
            $table->integer('amount')->nullable();
            $table->unsignedBigInteger('record_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('record_id')
                ->on('records')
                ->references('id')
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
        Schema::dropIfExists('procedures');
    }
}
