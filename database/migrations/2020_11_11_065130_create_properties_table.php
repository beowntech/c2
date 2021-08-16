<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePropertiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('properties', function (Blueprint $table) {
            $table->bigInteger('id');
            $table->string('name');
            $table->integer('host');
            $table->string('language');
            $table->integer('property_type');
            $table->longText('address')->nullable();
            $table->integer('city')->nullable();
            $table->integer('state')->nullable();
            $table->string('landmark')->nullable();
            $table->integer('pincode')->nullable();
            $table->json('amenities')->nullable();
            $table->string('description')->nullable();
            $table->string('meal')->nullable();
            $table->json('property_size')->nullable();
            $table->integer('extra_bed')->nullable();
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('properties');
    }
}
