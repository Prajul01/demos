<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;
    protected $table='roles';
    protected $fillable=['name','key','created_by','status','updated_by'];
    function permissions(){
        return $this->belongsToMany(Permission::class);

    }
}
