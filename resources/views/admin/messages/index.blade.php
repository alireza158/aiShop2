@extends('layouts.admin')
@section('title','پیام‌های تماس')
@section('content')<div class="card p-3"><table class="table"><tr><th>نام</th><th>موبایل</th><th>موضوع</th><th>وضعیت</th><th></th></tr>@foreach($messages as $m)<tr><td>{{ $m->name }}</td><td>{{ $m->mobile }}</td><td>{{ $m->subject }}</td><td>{{ $m->is_read?'خوانده شده':'جدید' }}</td><td><a href="{{ route('admin.contact-messages.show',$m) }}">مشاهده</a></td></tr>@endforeach</table>{{ $messages->links() }}</div>@endsection
