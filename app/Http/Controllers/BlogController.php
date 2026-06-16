<?php
namespace App\Http\Controllers;
use App\Models\Article;use Illuminate\View\View;
class BlogController extends Controller{public function index():View{return view('blog.index',['articles'=>Article::where('is_published',1)->latest()->paginate(9)]);}public function show(string $slug):View{return view('blog.show',['article'=>Article::where('slug',$slug)->where('is_published',1)->firstOrFail()]);}}
