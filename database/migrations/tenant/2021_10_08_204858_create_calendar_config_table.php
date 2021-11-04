<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCalendarConfigTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calendar_config', function (Blueprint $table) {
            $table->id();
            //$table->time('start_day');
            //$table->time('end_day');
            $table->json('schedule_on');
            //$table->json('hours_off');
            $table->integer('date_duration')->unsigned()->default(0);
            $table->integer('date_interval')->unsigned()->default(0);
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('calendar_config');
    }
}
