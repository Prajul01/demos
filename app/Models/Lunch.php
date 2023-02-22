<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lunch extends Model
{
    use HasFactory;
    protected $table='lunch';
    protected $fillable=['school','account','total','remark','finacialyear','created_by'];
}
