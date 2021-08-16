<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificationTable extends Migration
{
    public function up()
    {
        Schema::create('notification', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->integer('user_id');
		$table->string('title',191);
		$table->integer('booking_id');
		$table->integer('status');
		$table->datetime('opened_at')->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('notification');
    }
}
