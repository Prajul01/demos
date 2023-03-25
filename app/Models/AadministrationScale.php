<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AadministrationScale extends Model
{
    use HasFactory;
    protected $table='administration_scale';
    protected $fillable=['level','is_draft','amount','created_by','is_draft','updated_by'];
}
