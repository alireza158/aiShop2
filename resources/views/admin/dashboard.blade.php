@extends('layouts.admin')

@section('title', 'داشبورد مدیریت')

@section('content')
@php
    $cards = [
        'محصولات' => $products,
        'دسته‌بندی‌ها' => $categories,
        'سفارش‌ها' => $orders,
        'مقاله‌ها' => $articles,
        'کاربران' => $users,
        'مجموع فروش' => number_format($sales).' تومان',
        'سفارش جدید' => $newOrders,
        'محصول ناموجود' => $outOfStock,
    ];
@endphp

<div class="row g-3">
    @foreach ($cards as $label => $value)
        <div class="col-md-3">
            <div class="card p-3">
                <span class="text-muted">{{ $label }}</span>
                <strong class="fs-3">{{ $value }}</strong>
            </div>
        </div>
    @endforeach
</div>

<div class="row g-4 mt-2">
    <div class="col-lg-6">
        <div class="card p-3">
            <h2 class="h5">آخرین سفارش‌ها</h2>
            <table class="table">
                @foreach ($latestOrders as $order)
                    <tr>
                        <td>{{ $order->order_number }}</td>
                        <td>{{ $order->customer_name }}</td>
                        <td>{{ $order->status }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card p-3">
            <h2 class="h5">آخرین محصولات</h2>
            <table class="table">
                @foreach ($latestProducts as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->stock }}</td>
                        <td>{{ number_format($product->price) }}</td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
