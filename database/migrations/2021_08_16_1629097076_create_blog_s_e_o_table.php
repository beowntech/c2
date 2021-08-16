<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogSEOTable extends Migration
{
    public function up()
    {
        Schema::create('blog_s_e_o', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('blog_id')->unsigned();
		$table->integer('s_e_o_id')->unsigned();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('blog_s_e_o');
    }
}
