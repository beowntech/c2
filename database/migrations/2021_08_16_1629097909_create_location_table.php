<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationTable extends Migration
{
    public function up()
    {
        Schema::create('location', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->integer('prop_id');
		$table->string('street_name',191);
		$table->string('local_area');
		$table->integer('city');
		$table->integer('state');
		$table->bigInteger('pincode');
		$table->string('nationality')->nullable();
		$table->float('longtitude')->nullable();
		$table->float('latitude')->nullable();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('location');
    }
}
