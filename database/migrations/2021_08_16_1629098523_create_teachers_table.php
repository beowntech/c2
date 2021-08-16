<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('prop_id');
		$table->string('name');
		$table->string('qualification')->nullable();
		$table->string('designation')->nullable();
		$table->string('department')->nullable();
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('teachers');
    }
}
