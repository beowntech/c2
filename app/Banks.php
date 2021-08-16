<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Banks extends Model
{
    //

    protected $table="banks";
    public $timestamps=true;

    protected $fillable = [
        'name',
        'short_name',
        'image',
        'rate_of_interest',
        'max_loan_collateral',
        'max_loan_w_collateral',
        'processing_fee',
        'repayment_period',
        'loan_for_top_inst',
        'age_limit',
        'margin',
        'loan_security',
        'eligibility_concession',
        'processing_time',
        'penal_charges',
        'mandatory_insurance',
        'travel_exp',
        'bank_transfer_allowance',
        'top_up_loan',
        'interest_subsidy_schemes',
        'tax_benefit',
        'benefits',
        'bank_type',

    ];
}
