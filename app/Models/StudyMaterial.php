<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudyMaterial extends Model
{
    use HasFactory;
    protected $table='studymaterials';
    protected $fillable=['school','statestatus','account','amount','remark','educationyear','created_by','generated_by','state','updated_by' ];
}
