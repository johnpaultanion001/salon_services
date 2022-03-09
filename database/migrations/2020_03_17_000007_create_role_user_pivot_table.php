<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoleUserPivotTable extends Migration
{
    public function up()
    {
        Schema::create('role_user', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->bigInteger('role_id')->unsigned()->nullable();
        });

    }
}
