<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EducationYear extends Model
{
    use HasFactory;
    protected $table='educationyear';
    protected $fillable=['name','created_by','from_date_eng',
        'to_date_eng',
        'from_date_nep',
        'to_date_nep'];
}
