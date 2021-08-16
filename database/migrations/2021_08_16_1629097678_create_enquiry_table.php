<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiryTable extends Migration
{
    public function up()
    {
        Schema::create('enquiry', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('user_id')->nullable();
		$table->integer('prop_id')->nullable();
		$table->string('name',191);
		$table->string('email',191);
		$table->bigInteger('contact')->nullable();
		$table->text('course');
		$table->string('city',266)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('enquiry');
    }
}
