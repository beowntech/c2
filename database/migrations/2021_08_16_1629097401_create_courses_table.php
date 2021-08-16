<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoursesTable extends Migration
{
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('prop_id');
		$table->integer('category');
		$table->integer('stream');
		$table->integer('sub_stream')->nullable();
		$table->string('type');
		;
		$table->integer('program_type')->nullable();
		$table->bigInteger('year');
		$table->string('eligibility');
		$table->string('brochure',500)->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('courses');
    }
}
