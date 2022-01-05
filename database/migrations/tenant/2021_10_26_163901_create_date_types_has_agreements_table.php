<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDateTypesHasAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('date_types_agreements', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('agreement_fee')->unsigned();
            $table->bigInteger('moderating_fee')->unsigned();
            $table->unsignedBigInteger('date_type_id')->unsigned();
            $table->unsignedBigInteger('agreement_id')->unsigned();

            $table->foreign('date_type_id')->on('date_types')
                ->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('agreement_id')->on('agreements')
                ->references('id')
                ->cascadeOnDelete()
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
        Schema::dropIfExists('date_types_agreements');
    }
}
