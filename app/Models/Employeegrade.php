<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employeegrade extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table='employee_grade';
    protected $fillable=['level','gradelimit','position','created_by'];
}
