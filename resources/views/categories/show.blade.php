@extends('layouts.app')
@section('title',$category->name)
@section('content')<section class="products-section"><div class="container"><h1 class="section-title">{{ $category->name }}</h1><p>{{ $category->description }}</p><div class="row g-4">@foreach($products as $product)<div class="col-md-3">@include('partials.product-card',['product'=>$product])</div>@endforeach</div>{{ $products->links() }}</div></section>@endsection
