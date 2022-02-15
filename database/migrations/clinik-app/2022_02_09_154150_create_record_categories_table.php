<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_categories', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger('record_id');
            $table->unsignedBigInteger('hc_module_id');
            $table->string('code', 15)->nullable();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('record_id')
                ->references('id')
                ->on('records')
                ->restrictOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('hc_module_id')
                ->references('id')
                ->on('hc_modules')
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
        Schema::dropIfExists('record_categories');
    }
}
