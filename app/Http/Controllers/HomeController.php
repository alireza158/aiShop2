<?php
namespace App\Http\Controllers;
use App\Models\{Article,Category,Product,Slider};use Illuminate\View\View;
class HomeController extends Controller{public function __invoke():View{return view('pages.home',['sliders'=>Slider::where('is_active',1)->orderBy('sort_order')->get(),'categories'=>Category::where('is_active',1)->take(8)->get(),'featuredProducts'=>Product::with('category')->where('is_active',1)->where('is_featured',1)->take(12)->get(),'bestSellers'=>Product::where('is_active',1)->orderByDesc('sales_count')->take(8)->get(),'latestProducts'=>Product::where('is_active',1)->latest()->take(8)->get(),'articles'=>Article::where('is_published',1)->latest()->take(3)->get(),'brands'=>Product::where('is_active',1)->whereNotNull('brand')->distinct()->pluck('brand')->take(10)]);}}
