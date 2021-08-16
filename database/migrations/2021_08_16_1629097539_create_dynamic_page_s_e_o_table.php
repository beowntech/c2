<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicPageSEOTable extends Migration
{
    public function up()
    {
        Schema::create('dynamic_page_s_e_o', function (Blueprint $table) {

		$table->integer('id');
		$table->integer('dynamic_page_id');
		$table->integer('s_e_o_id');

        });
    }

    public function down()
    {
        Schema::dropIfExists('dynamic_page_s_e_o');
    }
}
