<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LunchScale extends Model
{
    use HasFactory;
    protected $table='lunch_scale';
    protected $fillable=['title','class','amount','created_by'];
}
