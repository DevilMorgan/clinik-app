<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordAgreementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_agreements', function (Blueprint $table) {
            $table->id();

            $table->string('name_agreement', 100);
            $table->string('second_name_agreement', 50)->nullable();
            $table->string('first_lastname_agreement', 50)->nullable();
            $table->string('second_lastname_agreement', 50)->nullable();
            $table->string('email_agreement', 100);
            $table->string('email_optional_agreement', 100)->nullable();
            $table->string('code_agreement', 100);
            $table->unsignedBigInteger('card_type_id_agreement');
            $table->string('id_card_agreement', 50)->nullable();
            $table->string('country_agreement', 100)->nullable();
            $table->string('department_agreement', 100)->nullable();
            $table->string('city_agreement', 100)->nullable();
            $table->string('neighborhood_agreement', 100)->nullable();
            $table->string('address_agreement', 100)->nullable();
            $table->enum('address_type_agreement', ['house', 'office', 'surgery'])->nullable();
            $table->string('postcode_agreement', 10)->nullable();
            $table->string('code_agreement_agreement', 100);
            $table->string('economic_activity_agreement', 100)->nullable();
            $table->enum('business_type_agreement', ['private', 'public', 'mix'])->nullable();

            $table->bigInteger('agreement_fee')->unsigned();
            $table->bigInteger('moderating_fee')->unsigned();

            $table->unsignedBigInteger('record_id');

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('card_type_id_agreement')->on('card_types')
                ->references('id')
                ->cascadeOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('record_id')->on('records')
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
        Schema::dropIfExists('record_agreements');
    }
}
