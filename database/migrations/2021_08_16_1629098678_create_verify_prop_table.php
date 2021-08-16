<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVerifyPropTable extends Migration
{
    public function up()
    {
        Schema::create('verify_prop', function (Blueprint $table) {

		$table->integer('prop_id');
		$table->string('otp',250);
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('verify_prop');
    }
}
