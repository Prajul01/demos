<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaghFormSettingDetails extends Model
{
    use HasFactory;
    protected $table='magh_form_setting_details';
    protected $fillable=['magh_form_id','month','status','name','type','visible','created_by','updated_by','delete_flg','is_draft'];
}
