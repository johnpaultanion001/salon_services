<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_documents', function (Blueprint $table) {
            $table->id();
            $table->string('resident_id');
            $table->string('document_id');
            $table->date('date_you_need');
            $table->float('amount_to_pay');
            $table->string('receipt');
            
            $table->longText('note')->nullable();
            $table->string('status')->default('PENDING');
            $table->string('claiming_option');
            $table->string('downloadable')->nullable();
            $table->boolean('isPaid')->default(false);
            $table->boolean('isRemove')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requested_documents');
    }
}
