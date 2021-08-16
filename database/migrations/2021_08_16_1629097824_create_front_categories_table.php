<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFrontCategoriesTable extends Migration
{
    public function up()
    {
        Schema::create('front_categories', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->string('name',191);
		$table->integer('parent_id');
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->string('image',250)->nullable();
		$table->string('description',191)->nullable();
		$table->timestamp('deleted_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('front_categories');
    }
}
