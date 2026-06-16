<?php
namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;use Illuminate\Support\Facades\Storage;
trait HandlesAdminUploads{protected function upload(Request $r,string $field,string $dir,?string $old=null):?string{if(!$r->hasFile($field))return $old;$r->validate([$field=>'image|max:3072']);if($old && str_starts_with($old,'storage/'))Storage::disk('public')->delete(substr($old,8));return 'storage/'.$r->file($field)->store($dir,'public');}}
