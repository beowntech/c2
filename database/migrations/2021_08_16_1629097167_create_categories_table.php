<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->string('name',191);
		$table->integer('parent_id');
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->string('image',250)->nullable();
		$table->string('description',191)->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
