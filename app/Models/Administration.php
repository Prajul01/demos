<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Administration extends Model
{
    use HasFactory;
    protected $table='administration';
    protected $fillable=['account','total','remark','created_by','finacialyear','school','grade','generated_by','state','is_draft'
        ,'updated_by','created_by',];
}
