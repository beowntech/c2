<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifyUsersTable extends Migration
{
    public function up()
    {
        Schema::create('verify_users', function (Blueprint $table) {

		$table->integer('user_id');
		$table->string('otp');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('verify_users');
    }
}
