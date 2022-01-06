<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('code_profession', 100)->nullable()->after('phone');
            $table->string('profession', 100)->nullable()->after('code_profession');
            $table->string('digital_signature', 100)->nullable()->after('profession');
            $table->unsignedBigInteger('surgery_id')->nullable()->after('digital_signature');

            $table->foreign('surgery_id')
                ->on('surgeries')
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
        Schema::table('users', function (Blueprint $table) {
            //$table->dropColumn('code_profession');
            //$table->dropColumn('profession');
            //$table->dropColumn('digital_signature');
            $table->dropConstrainedForeignId('surgery_id');
            //$table->dropColumn('surgery_id');
        });
    }
}
