<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    use HasFactory;
    protected $table='audit';
    protected $fillable=['school_name','magform','dataentry','headteacher','account','is_apprived','remark','form_name','updated_by','created_by',];
}
