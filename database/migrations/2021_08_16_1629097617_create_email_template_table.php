<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTemplateTable extends Migration
{
    public function up()
    {
        Schema::create('email_template', function (Blueprint $table) {

		$table->bigInteger('id',true)->unsigned();
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();
		$table->text('content');
		$table->string('name',191);
		$table->string('subject',191);

        });
    }

    public function down()
    {
        Schema::dropIfExists('email_template');
    }
}
