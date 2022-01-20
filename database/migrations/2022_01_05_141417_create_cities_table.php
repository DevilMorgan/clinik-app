<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cities', function (Blueprint $table) {

            $table->id();
            $table->string('code', 10);
            $table->string('name', 100);
            $table->string('type', 50);
            $table->unsignedBigInteger('department_id');

//            $table->foreign('department_id')
//                ->references('id')
//                ->on('departments')
//                ->cascadeOnUpdate()
//                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cities');
    }
}
