<?php
namespace App\Http\Controllers;
use App\Models\Category;use Illuminate\View\View;
class CategoryController extends Controller{public function index():View{return view('categories.index',['categories'=>Category::where('is_active',1)->withCount('products')->get()]);}public function show(string $slug):View{$category=Category::where('slug',$slug)->where('is_active',1)->firstOrFail();$products=$category->products()->where('is_active',1)->paginate(12);return view('categories.show',compact('category','products'));}}
