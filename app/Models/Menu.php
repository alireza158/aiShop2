<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Menu extends Model{protected $fillable=['title','url','type','parent_id','location','sort_order','is_active']; protected $casts=['is_active'=>'boolean']; public function children(){return $this->hasMany(self::class,'parent_id')->orderBy('sort_order');}}
