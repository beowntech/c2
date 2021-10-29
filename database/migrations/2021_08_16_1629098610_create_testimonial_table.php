<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTestimonialTable extends Migration
{
    public function up()
    {
        Schema::create('testimonial', function (Blueprint $table) {

            $table->bigInteger('id', true)->unsigned();
            $table->bigInteger('user_id');
            $table->string('user_name')->nullable();
            $table->string('property_name')->nullable();
            $table->integer('property_id')->nullable();
            $table->string('image', 191);
            $table->text('content');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
            $table->integer('status');

        });
    }

    public function down()
    {
        Schema::dropIfExists('testimonial');
    }
}
