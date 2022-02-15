<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();

            //basic information
            $table->string('name_first', 100)->nullable();
            $table->string('name_second', 100)->nullable();
            $table->string('lastname_first', 100)->nullable();
            $table->string('lastname_second', 100)->nullable();
            $table->string('id_card', 50)->nullable();
            $table->unsignedBigInteger('card_type_id')->nullable();
            $table->dateTime('birthday')->nullable();
            $table->string('rethus', 50)->nullable();
            $table->string('id_professional', 50)->nullable();

            //contact
            $table->string('address', 100)->nullable();
            $table->string('cellphone', 15)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('city', 100)->nullable();
            $table->string('city_code', 10)->nullable();

            //social network
            $table->string('email')->unique();
            $table->string('url_web', 100)->nullable();
            $table->string('url_linkedin', 100)->nullable();
            $table->string('url_social_network', 100)->nullable();
            $table->string('photo', 100)->nullable();

            //profession
            $table->string('university', 100)->nullable();
            //The data is in database system
            $table->string('specialty_id', 100)->nullable();

            //verification
            $table->boolean('status')->default(0);
            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
