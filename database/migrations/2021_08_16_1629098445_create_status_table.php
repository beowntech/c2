<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStatusTable extends Migration
{
    public function up()
    {
        Schema::create('status', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->string('name',191);
		$table->text('message');
		$table->string('color',191);
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->integer('type_for')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('status');
    }
}
