<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebsocketsStatisticsEntriesTable extends Migration
{
    public function up()
    {
        Schema::create('websockets_statistics_entries', function (Blueprint $table) {

		$table->integer('id')->unsigned();
		$table->string('app_id',191);
		$table->integer('peak_connection_count');
		$table->integer('websocket_message_count');
		$table->integer('api_message_count');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('websockets_statistics_entries');
    }
}
