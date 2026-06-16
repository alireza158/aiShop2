<?php
namespace App\Http\Controllers\Admin;use App\Http\Controllers\Controller;use App\Models\User;use Illuminate\Http\Request;
class UserController extends Controller{public function index(){return view('admin.users.index',['users'=>User::latest()->paginate(20)]);}public function update(Request $r,User $user){$d=$r->validate(['role'=>'required','is_admin'=>'nullable']);$d['is_admin']=$r->boolean('is_admin');$user->update($d);return back()->with('success','کاربر به‌روزرسانی شد');}}
