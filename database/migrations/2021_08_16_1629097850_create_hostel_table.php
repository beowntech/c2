<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelTable extends Migration
{
    public function up()
    {
        Schema::create('hostel', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('prop_id');
		$table->integer('male_female');
		$table->text('html');
		$table->string('price')->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('hostel');
    }
}
