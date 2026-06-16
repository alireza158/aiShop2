<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class HomeSection extends Model{protected $fillable=['key','title','subtitle','sort_order','is_active','settings']; protected $casts=['is_active'=>'boolean','settings'=>'array'];}
