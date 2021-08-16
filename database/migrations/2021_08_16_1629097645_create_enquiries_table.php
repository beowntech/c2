<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnquiriesTable extends Migration
{
    public function up()
    {
        Schema::create('enquiries', function (Blueprint $table) {

		$table->integer('enq_id');
		$table->integer('prop_id')->nullable();
		$table->string('user_name')->nullable();
		$table->string('user_email')->nullable();
		$table->bigInteger('user_contact')->nullable();
		$table->text('interest_course');
		$table->string('user_city')->nullable();
		$table->text('user_message');
		$table->text('enq_status');
		$table->integer('status')->nullable();
		$table->string('send_by')->nullable();
		$table->string('form_name')->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();
		$table->integer('assigned_to');

        });
    }

    public function down()
    {
        Schema::dropIfExists('enquiries');
    }
}
