<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePopEnquiryTable extends Migration
{
    public function up()
    {
        Schema::create('pop_enquiry', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('user_id')->nullable();
		$table->string('name');
		$table->string('email');
		$table->bigInteger('contact');
		;
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('pop_enquiry');
    }
}
