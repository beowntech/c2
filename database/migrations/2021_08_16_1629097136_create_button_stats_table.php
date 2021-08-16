<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButtonStatsTable extends Migration
{
    public function up()
    {
        Schema::create('button_stats', function (Blueprint $table) {

		$table->integer('id');
		$table->integer('calls')->default('0');
		$table->integer('whatsapp')->default('0');
		$table->string('url',400)->nullable();
		$table->timestamp('created_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('button_stats');
    }
}
