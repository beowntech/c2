<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExcelTable extends Migration
{
    public function up()
    {
        Schema::create('excel', function (Blueprint $table) {

		$table->integer('id');
		$table->string('student_name')->nullable();
		$table->string('fathers_name')->nullable();
		$table->string('subject_1')->nullable();
		$table->string('subject_2')->nullable();
		$table->string('subject_3')->nullable();
		$table->string('subject_4')->nullable();
		$table->string('subject_5')->nullable();
		$table->string('subject_6')->nullable();
		$table->string('phone',222)->nullable();
		$table->string('email')->nullable();
		$table->string('district')->nullable();
		$table->string('state');
		$table->text('school');
		$table->string('source')->nullable();
		$table->integer('status')->default('0');
		$table->text('excel_status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('excel');
    }
}
