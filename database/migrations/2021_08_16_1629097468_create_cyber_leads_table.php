<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCyberLeadsTable extends Migration
{
    public function up()
    {
        Schema::create('cyber_leads', function (Blueprint $table) {

		$table->integer('id');
		$table->integer('user_id');
		$table->string('name')->nullable();
		$table->string('email',350)->nullable();
		$table->bigInteger('contact')->nullable();
		$table->string('city')->nullable();
		$table->string('interested_course',250)->nullable();
		$table->string('interested_place',250)->nullable();
		$table->text('interested_college');
		;
		$table->string('class',250)->nullable();
		$table->integer('status');
		$table->text('cyber_status');
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->integer('assigned_to');

        });
    }

    public function down()
    {
        Schema::dropIfExists('cyber_leads');
    }
}
