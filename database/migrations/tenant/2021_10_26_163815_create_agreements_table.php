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

            $table->string('second_name', 50)->nullable();
            $table->string('first_lastname', 50)->nullable();
            $table->string('second_lastname', 50)->nullable();

            $table->string('email', 100);
            $table->string('email_optional', 100)->nullable();

            $table->string('code', 100);
            $table->unsignedBigInteger('card_type_id');
            $table->string('id_card', 50)->nullable();

            $table->string('country', 100)->nullable();
            $table->string('department', 100)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('neighborhood', 100)->nullable();
            $table->string('address', 100)->nullable();
            $table->enum('address_type', ['house', 'office', 'surgery'])->nullable();
            $table->string('postcode', 10)->nullable();

            $table->string('code_agreement', 100);
            $table->string('economic_activity', 100)->nullable();
            $table->enum('business_type', ['private', 'public', 'mix'])->nullable();

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
