<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('records', function (Blueprint $table) {

            $table->id();
            $table->dateTime('date');
            $table->string('reference', 50)->nullable();
            $table->boolean('finished')->default(0);


            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('patient_id');
            $table->unsignedBigInteger('hc_template_id');
            $table->unsignedBigInteger('consultation_reason_id');
            $table->unsignedBigInteger('date_type_id');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('patient_id')
                ->references('id')
                ->on('patients')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('hc_template_id')
                ->references('id')
                ->on('hc_templates')
                ->onUpdate('restrict')
                ->onDelete('restrict');

            $table->foreign('date_type_id')
                ->references('id')
                ->on('date_types')
                ->onUpdate('restrict')
                ->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('records');
    }
}
