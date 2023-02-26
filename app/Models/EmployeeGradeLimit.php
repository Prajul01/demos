<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeGradeLimit extends Model
{
    use HasFactory;
    protected $table='employeegradelimit';
    protected $fillable=['level','gradelimit','position','created_by'];
}
