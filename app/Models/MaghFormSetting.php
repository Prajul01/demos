<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaghFormSetting extends Model
{
    use HasFactory;
    protected $table='magh_form_setting';
    protected $fillable=['fiscalyear','name','status','nagarTeacher','state','header','created_by','updated_by','delete_flg','is_draft','magh_form_detail_ids'];
}
