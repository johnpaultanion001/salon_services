<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangayIndigenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barangay_indigencies', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->longText('purpose');
            $table->integer('status')->default('0');
            $table->longText('comment')->nullable();
            $table->integer('isRemove')->default('0');
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
        Schema::dropIfExists('barangay_indigencies');
    }
}
