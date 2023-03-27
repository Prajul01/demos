<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolLevel extends Model
{
    use HasFactory;
    protected $table='school_level';
    protected $fillable=['school_name','report','account_number','amount','remark','form_name','form_type','created_by' ,
        'updated_by' ];
}
