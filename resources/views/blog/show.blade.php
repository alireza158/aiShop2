@extends('layouts.app')
@section('title',$article->title)
@section('content')<section class="products-section"><div class="container"><article class="simple-card article-single"><img src="{{ \App\Support\ShopImage::url($article->image, 'article') }}"><h1>{{ $article->title }}</h1><p>{{ $article->content }}</p></article></div></section>@endsection
