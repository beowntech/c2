<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePriceTable extends Migration
{
    public function up()
    {
        Schema::create('price', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('course_id');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('price');
    }
}
