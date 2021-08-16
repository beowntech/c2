<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageContentTable extends Migration
{
    public function up()
    {
        Schema::create('page_content', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		;
		$table->string('page_name',191);
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('page_content');
    }
}
