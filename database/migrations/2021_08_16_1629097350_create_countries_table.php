<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCountriesTable extends Migration
{
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {

		$table->integer('id');
		$table->string('sortname');
		$table->string('name',150);
		$table->integer('phonecode');

        });
    }

    public function down()
    {
        Schema::dropIfExists('countries');
    }
}
