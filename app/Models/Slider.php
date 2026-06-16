<?php
namespace App\Models;use Illuminate\Database\Eloquent\Model;
class Slider extends Model{protected $fillable=['title','subtitle','image','mobile_image','button_text','button_link','display_mode','sort_order','show_mobile','show_desktop','is_active'];protected $casts=['show_mobile'=>'boolean','show_desktop'=>'boolean','is_active'=>'boolean'];}
