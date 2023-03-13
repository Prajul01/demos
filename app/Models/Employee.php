<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table='Employees';
    protected $fillable=[


        'id','fname_nep','mname_nep','lname_nep','fname_eng','lname_eng','mname_eng',
        'father_name','mother_name','signal_no','dob','gender','position','level','type','category','grade',
        'caste','temp_address','permanent_address','insurance_no','promotion_date','provident_fund','retire',
        'bank','pan_no','account_no','sequence_no','citizen_investment_no','remark','status','school_name',
        'created_by','delete_flg','is_draft','contact_no'
    ];
}
