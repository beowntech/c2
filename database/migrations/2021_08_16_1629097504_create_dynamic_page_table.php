<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDynamicPageTable extends Migration
{
    public function up()
    {
        Schema::create('dynamic_page', function (Blueprint $table) {

		$table->integer('id');
		$table->string('name')->nullable();
		$table->text('content');
		$table->string('logo')->nullable();
		$table->string('featured')->nullable();
		$table->integer('views')->default('0');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('dynamic_page');
    }
}
