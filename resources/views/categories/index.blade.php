@extends('layouts.app')
@section('title','دسته‌بندی‌ها')
@section('content')<section class="categories-section"><div class="container"><h1 class="section-title">دسته‌بندی محصولات</h1><div class="category-list">@foreach($categories as $category)<a class="category-item" href="{{ route('categories.show',$category->slug) }}"><img src="{{ $category->image ?: asset('assets/images/product2.svg') }}" alt="{{ $category->name }}"><p>{{ $category->name }}</p><small>{{ $category->products_count }} محصول</small></a>@endforeach</div></div></section>@endsection
