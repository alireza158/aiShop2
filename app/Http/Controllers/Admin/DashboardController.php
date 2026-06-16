<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\{Article,Category,Order,Product,Slider};use Illuminate\View\View;
class DashboardController extends Controller{public function __invoke():View{return view('admin.dashboard',['products'=>Product::count(),'categories'=>Category::count(),'orders'=>Order::count(),'sliders'=>Slider::count(),'articles'=>Article::count(),'latestOrders'=>Order::latest()->take(6)->get()]);}}
