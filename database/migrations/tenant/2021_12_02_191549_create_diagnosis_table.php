<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDiagnosisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('diagnosis', function (Blueprint $table) {
            $table->id();
            $table->string('code',5)->nullable();
            $table->string('description', 225)->nullable();
            $table->string('code_optional_one',5)->nullable();
            $table->string('description_optional_one', 225)->nullable();
            $table->string('code_optional_two',5)->nullable();
            $table->string('description_optional_two', 225)->nullable();
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
        Schema::dropIfExists('diagnosis');
    }
}
