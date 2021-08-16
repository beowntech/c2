<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->string('name',191);
		$table->string('email',191);
		$table->timestamp('email_verified_at')->nullable();
		$table->string('password',191)->nullable();
		$table->string('remember_token',100)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();
		$table->integer('status');
		$table->bigInteger('contact')->nullable();
		$table->bigInteger('alt_contact')->nullable();
		$table->string('image',199)->nullable();
		$table->string('cafe_name',250)->nullable();
		$table->string('cafe_city')->nullable();
		$table->string('device_token',191)->nullable();
		$table->integer('verified')->default('0');
		$table->integer('prefer_currency')->default('0');

        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
