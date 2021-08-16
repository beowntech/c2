<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamsTable extends Migration
{
    public function up()
    {
        Schema::create('exams', function (Blueprint $table) {

		$table->integer('id');
		$table->string('exam_name',250)->nullable();
		$table->string('exam_image',250)->nullable();
		$table->integer('exam_category')->nullable();
		$table->integer('exam_course')->nullable();
		;
		$table->integer('exam_type')->nullable();
		$table->integer('exam_mode')->nullable();
		$table->string('exam_from_to',300)->nullable();
		$table->string('exam_application_from_to',300)->nullable();
		$table->datetime('exam_result')->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('exams');
    }
}
