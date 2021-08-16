<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesModelSEOTable extends Migration
{
    public function up()
    {
        Schema::create('pages_model_s_e_o', function (Blueprint $table) {

		$table->integer('id');
		$table->integer('pages_model_id');
		$table->integer('s_e_o_id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('pages_model_s_e_o');
    }
}
