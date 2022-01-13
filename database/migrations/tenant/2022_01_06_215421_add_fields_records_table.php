<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldsRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('records', function (Blueprint $table){
            $table->unsignedBigInteger('date_type_id')->after('finished')->nullable();
//            $table->unsignedBigInteger('agreement_id')->after('date_type_id')->nullable();

            $table->foreign('date_type_id')
                ->references('id')
                ->on('date_types')
                ->restrictOnDelete()
                ->cascadeOnUpdate();
//            $table->foreign('agreement_id')
//                ->references('id')
//                ->on('agreements')
//                ->restrictOnDelete()
//                ->cascadeOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('records', function (Blueprint $table){
            $table->dropConstrainedForeignId('date_type_id');
            //$table->dropConstrainedForeignId('agreement_id');
        });
    }
}
