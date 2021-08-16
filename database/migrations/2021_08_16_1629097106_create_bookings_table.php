<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('user_id')->nullable();
		$table->integer('property_id');
		$table->integer('room_id');
		$table->integer('guests')->nullable();
		$table->timestamp('from_date')->nullable();
		$table->timestamp('to_date')->nullable();
		;
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
