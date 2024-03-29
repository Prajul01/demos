<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    use HasFactory;
    protected $table='permissions';
    protected $fillable=['module_id','route','created_by','status','name','updated_by','created_by'];
    function role(){
       return $this->belongsToMany(Role::class);

    }
}
