<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeAllowanceScale extends Model
{
    use HasFactory;
    protected $table='employee_allowance_scale';
    protected $fillable=['level','title','amount','created_by'];
}
