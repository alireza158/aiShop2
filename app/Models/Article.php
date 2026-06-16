<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;use Illuminate\Database\Eloquent\SoftDeletes;
class Article extends Model{use SoftDeletes;protected $fillable=['title','slug','image','excerpt','content','author_id','published_at','show_in_home','is_published','is_active','meta_title','meta_description'];protected $casts=['published_at'=>'datetime','show_in_home'=>'boolean','is_published'=>'boolean','is_active'=>'boolean'];}
