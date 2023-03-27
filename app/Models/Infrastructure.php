<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Infrastructure extends Model
{
    use HasFactory;
    protected $table='infrastructure';
    protected $fillable=['school','statestatus','account','amount','remark','finacialyear','created_by','generated_by','state','updated_by'];
}
