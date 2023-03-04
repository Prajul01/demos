<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table='Employees';
    protected $fillable=['id','name','category','type','post','grade','phone','status',
        'created_by','gender','marital_status','contact_no','bank','account_no','provident_no','citizen_inv_no'];
}
