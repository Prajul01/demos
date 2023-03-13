<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;
    protected $table='schools';
    protected $fillable=[
        'school_type' ,
        'logo' ,
        'school' ,
        'tole' ,
        'title_nepali' ,
        'est_year' ,
        'school_code' ,
        'principal_name' ,
        'school_email' ,
        'school_phone' ,
        'ward_no' ,
        'school_level' ,
        'class_eight',
        'enroll_class' ,
        'principal_no' ,
        'principal_email' ,
        'bank_name' ,
        'account_no' ,
        'status' ,
        'created_by' ,
        'updated_by' ,
        'delete_flg',
        'is_draft',
    ];


}
