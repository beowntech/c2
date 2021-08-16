<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDPageEnquiryTable extends Migration
{
    public function up()
    {
        Schema::create('d_page_enquiry', function (Blueprint $table) {

		$table->integer('id');
		$table->integer('d_page_id');
		$table->string('name');
		$table->bigInteger('contact');
		$table->string('email');
		$table->integer('course');
		$table->integer('status');
		$table->text('status_progress');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('d_page_enquiry');
    }
}
