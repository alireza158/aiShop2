@extends('layouts.app')
@section('title','ثبت موفق سفارش')
@section('content')<section class="products-section"><div class="container"><div class="success-card"><h1>سفارش شما با موفقیت ثبت شد ✅</h1><p>شماره سفارش: <strong>{{ $order->order_number }}</strong></p><p>مبلغ پرداختی: {{ number_format($order->final_price) }} تومان</p><a class="btn-main" href="{{ route('home') }}">بازگشت به خانه</a></div></div></section>@endsection
