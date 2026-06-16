@extends('layouts.app')

@section('title', 'محصولات - AI Shop')
@section('meta_description', 'مشاهده محصولات دیجیتال AI Shop')

@section('content')
    @include('partials.categories')
    @include('partials.featured-products')
    @include('partials.latest-products')
@endsection
