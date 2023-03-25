<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory;
    protected $table='infrastructure';
    protected $fillable=['school','account','total','remark','finacialyear','created_by','generated_by','state'];
}
