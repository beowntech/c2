<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacementsTable extends Migration
{
    public function up()
    {
        Schema::create('placements', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->integer('property_id');
		$table->string('images',191)->nullable();
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('placements');
    }
}
