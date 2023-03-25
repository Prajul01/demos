<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeSalaryScale extends Model
{
    use HasFactory;
    protected $table='employee_salary_scale';
    protected $fillable=['level','position','amount','created_by','updated_by'];
}
