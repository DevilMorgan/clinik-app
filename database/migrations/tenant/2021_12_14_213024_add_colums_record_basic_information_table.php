<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumsRecordBasicInformationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('record_basic_information', function (Blueprint $table) {
            $table->string('responsable_relationship', 100)
                ->nullable()->after('user_profession');
            $table->string('responsable_name', 100)
                ->nullable()->after('responsable_relationship');
            $table->string('responsable_last_name', 100)
                ->nullable()->after('responsable_name');
            $table->string('responsable_cellphone', 100)
                ->nullable()->after('responsable_last_name');
            $table->string('responsable_email', 100)
                ->nullable()->after('responsable_cellphone');
            $table->string('responsable_address', 100)
                ->nullable()->after('responsable_email');
            $table->string('responsable_id_card', 50)
                ->nullable()->after('responsable_address');
            $table->unsignedBigInteger('responsable_card_type_id')
                ->nullable()->after('responsable_id_card');
            $table->string('responsable_country', 100)->nullable()
                ->after('responsable_card_type_id');
            $table->string('responsable_department', 100)->nullable()
                ->after('responsable_country');
            $table->string('responsable_city', 100)->nullable()
                ->after('department');

            $table->foreign('responsable_card_type_id')
                ->references('id')
                ->on('card_types')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
