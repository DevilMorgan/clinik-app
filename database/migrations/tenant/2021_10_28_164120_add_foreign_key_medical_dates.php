<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyMedicalDates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('medical_dates', function (Blueprint $table) {

            $table->enum('status', ['cancelado', 'realizado', 'ausente', 'reasignado'])->nullable();
            $table->unsignedBigInteger('price')->nullable();
            $table->boolean('check_consent')->nullable()->default(0);
            $table->string('digital_sign', 100)->nullable();
            $table->unsignedBigInteger('consent_id')->after('patients_id')->nullable();
            $table->unsignedBigInteger('date_type_id')->after('consent_id')->nullable();
            $table->unsignedBigInteger('agreement_id')->after('date_type_id')->nullable();

            $table->foreign('consent_id')
                ->references('id')
                ->on('consents')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('date_type_id')
                ->references('id')
                ->on('date_types')
                ->nullOnDelete()
                ->cascadeOnUpdate();

            $table->foreign('agreement_id')
                ->references('id')
                ->on('agreements')
                ->nullOnDelete()
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
        Schema::table('medical_dates', function (Blueprint $table) {
            $table->dropForeign(['consent_id']);
            $table->dropForeign(['date_type_id']);
            $table->dropForeign(['agreement_id']);

            $table->dropColumn([
                'status',
                'price',
                'check_consent',
                'digital_sign',
                'consent_id',
                'date_type_id',
                'agreement_id'
            ]);
        });
    }
}
