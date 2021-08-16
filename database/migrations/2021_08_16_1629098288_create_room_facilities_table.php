<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomFacilitiesTable extends Migration
{
    public function up()
    {
        Schema::create('room_facilities', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->string('name',191);
		$table->integer('parent_id');
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('room_facilities');
    }
}
