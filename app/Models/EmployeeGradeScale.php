<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeGradeScale extends Model
{
    use HasFactory;
    protected $table='employee_grade_scale';
    protected $fillable=['level','position','grade','amount','created_by','updated_by'];
}
