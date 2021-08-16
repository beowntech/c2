<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBanksTable extends Migration
{
    public function up()
    {
        Schema::create('banks', function (Blueprint $table) {

		$table->bigInteger('id',true);
		$table->string('name',300)->nullable();
		$table->string('short_name',300)->nullable();
		$table->string('image',300)->nullable();
		$table->string('rate_of_interest',400)->nullable();
		$table->string('max_loan_collateral',400)->nullable();
		$table->string('max_loan_w_collateral',400)->nullable();
		$table->string('processing_fee',400)->nullable();
		$table->string('repayment_period',400)->nullable();
		$table->string('loan_for_top_inst',222)->nullable();
		$table->string('margin',400)->nullable();
		$table->string('age_limit',222)->nullable();
		$table->text('loan_security');
		$table->string('eligibility_concession',400)->nullable();
		$table->string('processing_time',222)->nullable();
		$table->string('penal_charges',400)->nullable();
		$table->string('mandatory_insurance',222)->nullable();
		$table->string('travel_exp',222)->nullable();
		$table->string('bank_transfer_allowance',222)->nullable();
		$table->string('top_up_loan',222)->nullable();
		$table->text('insterest_subsidy_schemes');
		$table->string('tax_benefit',222)->nullable();
		$table->text('benefits');
		$table->string('bank_type',222);
		$table->timestamp('created_at')->nullable();
		$table->timestamp('updated_at')->nullable();

        });
    }

    public function down()
    {
        Schema::dropIfExists('banks');
    }
}
