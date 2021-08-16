<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesSEOTable extends Migration
{
    public function up()
    {
        Schema::create('properties_s_e_o', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('properties_id')->unsigned();
		$table->integer('s_e_o_id')->unsigned();

        });
    }

    public function down()
    {
        Schema::dropIfExists('properties_s_e_o');
    }
}
