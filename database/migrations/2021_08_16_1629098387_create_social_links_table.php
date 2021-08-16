<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSocialLinksTable extends Migration
{
    public function up()
    {
        Schema::create('social_links', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('prop_id');
		$table->string('name');
		$table->string('links');
		$table->string('icon');
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('social_links');
    }
}
