@extends('layouts.admin')

@section('title', 'جزئیات سفارش')

@section('content')
@php
    $statuses = [
        'pending' => 'جدید',
        'review' => 'در حال بررسی',
        'paid' => 'پرداخت شده',
        'ready' => 'آماده ارسال',
        'sent' => 'ارسال شده',
        'completed' => 'تکمیل شده',
        'cancelled' => 'لغو شده',
    ];
@endphp

<div class="card p-4">
    <h2>{{ $order->order_number }}</h2>
    <p>{{ $order->customer_name }} - {{ $order->customer_phone }}</p>
    <p>{{ $order->province }}، {{ $order->city }}، {{ $order->address }}</p>

    <form method="POST" action="{{ route('admin.orders.update', $order) }}">
        @csrf
        @method('PATCH')
        <select class="form-select w-auto d-inline" name="status">
            @foreach ($statuses as $key => $label)
                <option value="{{ $key }}" @selected($order->status == $key)>{{ $label }}</option>
            @endforeach
        </select>
        <button class="btn btn-primary" type="submit">تغییر وضعیت</button>
    </form>

    <hr>
    <table class="table">
        @foreach ($order->items ?? [] as $item)
            <tr>
                <td>{{ $item->product_name }}</td>
                <td>{{ $item->quantity }}</td>
                <td>{{ number_format($item->total) }}</td>
            </tr>
        @endforeach
    </table>
    <button onclick="print()" class="btn btn-outline-secondary" type="button">چاپ</button>
</div>
@endsection
