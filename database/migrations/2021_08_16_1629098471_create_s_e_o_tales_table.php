<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSEOTalesTable extends Migration
{
    public function up()
    {
        Schema::create('s_e_o_tales', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('s_e_o_id')->unsigned();
		$table->integer('tales_id')->unsigned();

        });
    }

    public function down()
    {
        Schema::dropIfExists('s_e_o_tales');
    }
}
