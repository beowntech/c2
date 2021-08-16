<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTempPasswordTable extends Migration
{
    public function up()
    {
        Schema::create('temp_password', function (Blueprint $table) {

		$table->integer('user_id');
		$table->text('password');
		$table->integer('changed');

        });
    }

    public function down()
    {
        Schema::dropIfExists('temp_password');
    }
}
