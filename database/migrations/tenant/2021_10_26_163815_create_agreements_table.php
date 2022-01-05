<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('agreements', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('code', 100);
            $table->string('code_agreement', 100);
            $table->string('address', 100);
            $table->string('country', 100)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('city', 100)->nullable();

            $table->unsignedBigInteger('card_type_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('card_type_id')->on('card_types')
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
        Schema::dropIfExists('agreements');
    }
}
