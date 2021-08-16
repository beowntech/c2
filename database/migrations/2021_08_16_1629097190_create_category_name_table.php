<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryNameTable extends Migration
{
    public function up()
    {
        Schema::create('category_name', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->string('name',191);
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->integer('featured')->nullable();
		$table->integer('position');
		$table->text('description');

        });
    }

    public function down()
    {
        Schema::dropIfExists('category_name');
    }
}
