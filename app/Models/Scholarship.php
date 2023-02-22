<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Scholarship extends Model
{
    use HasFactory;
    protected $table='scholarship';
    protected $fillable=['school','account','total','remark','finacialyear','created_by'];
}
