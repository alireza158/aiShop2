<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Brand extends Model{protected $fillable=['name','slug','logo','description','url','show_in_home','is_active','sort_order']; protected $casts=['show_in_home'=>'boolean','is_active'=>'boolean']; public function products(){return $this->hasMany(Product::class);}}
