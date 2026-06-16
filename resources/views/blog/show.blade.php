@extends('layouts.app')
@section('title',$article->title)
@section('content')<section class="products-section"><div class="container"><article class="simple-card article-single"><img src="{{ $article->image ?: asset('assets/images/product8.svg') }}"><h1>{{ $article->title }}</h1><p>{{ $article->content }}</p></article></div></section>@endsection
