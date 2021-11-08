<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHostelsSeoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hostels_seo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('hostels_id');
            $table->unsignedBigInteger('seo_id');
            // foreign keys
            // $table->foreign('hostels_id')->references('id')->on('hostels');
            // $table->foreign('seo_id')->references('id')->on('seo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hostels_seo');
    }
}
