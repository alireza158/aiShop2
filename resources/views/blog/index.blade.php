@extends('layouts.app')
@section('title','مجله فروشگاه')
@section('content')<section class="products-section"><div class="container"><h1 class="section-title">مجله فروشگاه</h1><div class="row g-4">@foreach($articles as $article)<div class="col-md-4"><a class="simple-card article-card" href="{{ route('blog.show',$article->slug) }}"><img src="{{ \App\Support\ShopImage::url($article->image, 'article') }}"><h3>{{ $article->title }}</h3><p>{{ $article->excerpt }}</p></a></div>@endforeach</div>{{ $articles->links() }}</div></section>@endsection
