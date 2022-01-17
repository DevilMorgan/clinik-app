<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWaitAuthorizationInHistoryMedicalDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('history_medical_documents', function (Blueprint $table) {
            $table->boolean('wait_authorization')->nullable()->default(0)->after('status');
            $table->string('link_authorization', 255)->nullable()->after('wait_authorization');
            $table->string('remember_token', 100)->nullable()->after('link_authorization');
            $table->unsignedBigInteger('consent_id')->nullable()->after('remember_token');

            $table->foreign('consent_id')
                ->on('consents')
                ->references('id')
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
        Schema::table('history_medical_documents', function (Blueprint $table) {
            $table->dropColumn(['wait_authorization', 'link_authorization', 'remember_token']);

            $table->dropConstrainedForeignId('consent_id');
        });
    }
}
