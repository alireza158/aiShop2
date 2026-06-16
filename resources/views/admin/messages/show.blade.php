@extends('layouts.admin')
@section('title','مشاهده پیام')
@section('content')<div class="card p-4"><h2>{{ $message->subject }}</h2><p>{{ $message->name }} - {{ $message->mobile }} - {{ $message->email }}</p><hr><p>{{ $message->message }}</p></div>@endsection
