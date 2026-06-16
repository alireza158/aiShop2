@extends('layouts.app')

@section('title', 'AI Shop - فروشگاه دیجیتال')
@section('meta_description', 'خرید آنلاین محصولات دیجیتال در AI Shop')

@section('content')
    <section class="hero-banner">
        <div class="container">
            <div class="hero-content">
                <div>
                    <span class="hero-badge">فروش ویژه محصولات دیجیتال</span>
                    <h1>خرید آسان، سریع و هوشمند</h1>
                    <p>جدیدترین موبایل‌ها، لپ‌تاپ‌ها و لوازم دیجیتال را با قیمت مناسب تهیه کنید.</p>
                    <button id="heroBtn" type="button">مشاهده محصولات</button>
                </div>

                <div class="hero-card">
                    <h3>پیشنهاد امروز</h3>
                    <p>هدفون بی‌سیم حرفه‌ای</p>
                    <strong>فقط ۱,۲۰۰,۰۰۰ تومان</strong>
                </div>
            </div>
        </div>
    </section>

    @include('partials.categories')
    @include('partials.featured-products')
    @include('partials.latest-products')
@endsection
