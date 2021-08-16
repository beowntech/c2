<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewsTable extends Migration
{
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->integer('property_id');
		$table->float('stars');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->integer('user_id')->nullable();
		$table->text('message');
		$table->integer('status');

        });
    }

    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
