<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;use App\Models\Order;use Illuminate\View\View;
class OrderController extends Controller{public function index():View{return view('admin.orders.index',['orders'=>Order::latest()->paginate(20)]);}}
