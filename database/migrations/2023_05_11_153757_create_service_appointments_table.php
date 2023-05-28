<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_appointments', function (Blueprint $table) {
            $table->id();
            $table->string('customer_id');
            $table->string('service_id');
            $table->string('staff_id');
            $table->date('appointment_date');
            $table->string('appointment_time');
            $table->string('note');
            $table->string('receipt');
            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('service_appointments');
    }
}
