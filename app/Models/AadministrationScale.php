<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AadministrationScale extends Model
{
    use HasFactory;
    protected $table='infrastructure_scale';
    protected $fillable=['level','infrastructure','amount','created_by'];
}
