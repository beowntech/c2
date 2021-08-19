<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->string('name',191);
		$table->string('short_name');
		$table->integer('host');
		$table->string('language',191)->nullable();
		$table->json('property_type')->nullable();
		$table->text('short_description');
		$table->integer('status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->timestamp('deleted_at')->nullable();
		$table->bigInteger('hotel_contact')->nullable();
		$table->string('email',191)->nullable();
		$table->string('road_name',191)->nullable();
		$table->string('logo')->nullable();
		$table->string('affiliated_by')->nullable();
		$table->string('established_on')->nullable();
		$table->string('approved_by')->nullable();
		$table->string('program_type')->nullable();
		$table->integer('college_type')->nullable();
		$table->integer('featured')->default('0');
		$table->integer('views')->default('0');
		$table->integer('verified')->default('0');
		$table->integer('claimed')->default('0');
		$table->integer('created_by')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
