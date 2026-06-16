<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\Relations\HasMany;use Illuminate\Database\Eloquent\SoftDeletes;
class Category extends Model{use SoftDeletes;protected $fillable=['parent_id','name','slug','image','description','sort_order','show_in_home','is_active','meta_title','meta_description'];protected $casts=['show_in_home'=>'boolean','is_active'=>'boolean'];public function products():HasMany{return $this->hasMany(Product::class);}public function children():HasMany{return $this->hasMany(self::class,'parent_id')->orderBy('sort_order');}public function parent(){return $this->belongsTo(self::class,'parent_id');}}
