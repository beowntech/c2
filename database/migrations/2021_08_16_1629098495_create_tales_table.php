<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTalesTable extends Migration
{
    public function up()
    {
        Schema::create('tales', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('user_id');
		$table->text('type');
		$table->string('title');
		$table->text('content');
		$table->text('image');
		$table->text('tags');
		$table->integer('status');
		$table->integer('views')->default('0');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('tales');
    }
}
