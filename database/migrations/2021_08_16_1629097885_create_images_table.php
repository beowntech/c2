<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->integer('user_id')->nullable();
		$table->integer('property_id');
		$table->string('featured',191)->nullable();
		$table->text('images');
		;
		$table->text('placements');
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('images');
    }
}
