<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTriagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('triages', function (Blueprint $table) {

            $table->id();
            $table->dateTime('date');
            $table->enum('type', ['I', 'II', 'III', 'IV', 'V', 'VI']);
            $table->text('comments');

            $table->unsignedBigInteger('record_id')->nullable();
            $table->foreign('record_id')
                ->on('records')
                ->references('id')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

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
        Schema::dropIfExists('triages');
    }
}
