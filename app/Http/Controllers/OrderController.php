<?php
namespace App\Http\Controllers;
use App\Models\Order;use Illuminate\View\View;
class OrderController extends Controller{public function success(Order $order):View{return view('orders.success',['order'=>$order->load('items')]);}}
