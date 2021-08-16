<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateScholarshipTable extends Migration
{
    public function up()
    {
        Schema::create('scholarship', function (Blueprint $table) {

		$table->integer('id');
		$table->integer('prop_id');
		$table->text('content');
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('scholarship');
    }
}
