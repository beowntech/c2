<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExamSEOTable extends Migration
{
    public function up()
    {
        Schema::create('exam_s_e_o', function (Blueprint $table) {

		$table->integer('id');
		$table->integer('exam_id')->nullable();
		$table->integer('s_e_o_id')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('exam_s_e_o');
    }
}
