<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeoTable extends Migration
{
    public function up()
    {
        Schema::create('seo', function (Blueprint $table) {

		$table->integer('id')->unsigned();
		$table->string('author_name')->nullable();
		$table->text('title');
		$table->string('primary_focus_keyword',191)->nullable();
		$table->integer('primary_focus_keyword_score')->nullable();
		$table->datetime('created_at')->nullable();
		$table->timestamp('updated_at');
		$table->timestamp('deleted_at')->nullable();
		$table->string('language')->nullable();
		$table->integer('estimated_reading_time_minutes')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('seo');
    }
}
