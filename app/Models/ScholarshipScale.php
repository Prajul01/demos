<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ScholarshipScale extends Model
{
    use HasFactory;
    protected $table='scholarship_scale';
    protected $fillable=['title','class','amount','created_by'];
}
