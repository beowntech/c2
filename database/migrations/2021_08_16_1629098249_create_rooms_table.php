<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->integer('property_id');
		$table->string('name',191);
		$table->string('type',191);
		$table->integer('att_bath');
		$table->integer('max_guest');
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->integer('extra_bed');
		$table->text('description');

        });
    }

    public function down()
    {
        Schema::dropIfExists('rooms');
    }
}
