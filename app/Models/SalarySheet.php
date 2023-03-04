<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalarySheet extends Model
{
    use HasFactory;
    protected $table='salarysheet';
    protected $fillable=['fiscalyyear','month','created_by','status','community_teacher'];
}
