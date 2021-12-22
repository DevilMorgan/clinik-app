<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoryMedicalDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('history_medical_documents', function (Blueprint $table) {
            $table->id();
            $table->string('reference', 50)->nullable();
            $table->string('directory', 200)->nullable();
            $table->dateTime('validity_at')->nullable();
            $table->enum('status', ['delete', 'draft', 'original', 'copy', 'modify'])->nullable();
            $table->unsignedBigInteger('document_type_id')->nullable();
            $table->unsignedBigInteger('record_id')->nullable();
            $table->timestamps();
            $table->softDeletes();

//            $table->foreign('document_type_id')
//                ->on('document_types')
//                ->references('id')
//                ->cascadeOnUpdate()
//                ->restrictOnDelete();
            $table->foreign('record_id')
                ->on('records')
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
        Schema::dropIfExists('history_medical_documents');
    }
}
