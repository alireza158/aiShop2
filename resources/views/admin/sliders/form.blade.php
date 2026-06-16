@extends('layouts.admin')

@section('title', 'فرم اسلایدر')

@section('content')
@php
    $textFields = [
        'title' => 'عنوان',
        'subtitle' => 'زیرعنوان',
        'button_text' => 'متن دکمه',
        'button_link' => 'لینک',
        'display_mode' => 'حالت نمایش',
        'sort_order' => 'ترتیب',
    ];
    $checkboxFields = [
        'is_active' => 'فعال',
        'show_mobile' => 'موبایل',
        'show_desktop' => 'دسکتاپ',
    ];
@endphp

<form class="card p-4" method="POST" enctype="multipart/form-data" action="{{ $slider->exists ? route('admin.sliders.update', $slider) : route('admin.sliders.store') }}">
    @csrf
    @if ($slider->exists)
        @method('PUT')
    @endif

    <div class="row g-3">
        @foreach ($textFields as $name => $label)
            <div class="col-md-6">
                <input class="form-control" name="{{ $name }}" value="{{ old($name, $slider->$name) }}" placeholder="{{ $label }}">
            </div>
        @endforeach

        <div class="col-md-6">
            <label class="form-label">تصویر دسکتاپ</label>
            <input class="form-control" type="file" name="image">
        </div>
        <div class="col-md-6">
            <label class="form-label">تصویر موبایل</label>
            <input class="form-control" type="file" name="mobile_image">
        </div>

        @foreach ($checkboxFields as $name => $label)
            <div class="col-md-3">
                <label class="form-check-label">
                    <input type="checkbox" name="{{ $name }}" value="1" @checked(old($name, $slider->$name ?? true))>
                    {{ $label }}
                </label>
            </div>
        @endforeach
    </div>

    <button class="btn btn-primary mt-4" type="submit">ذخیره</button>
</form>
@endsection
