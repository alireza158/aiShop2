@extends('layouts.admin')

@section('title', 'تنظیمات سایت')

@section('content')
@php
    $textFields = [
        'site_name' => 'نام سایت',
        'default_title' => 'عنوان پیش‌فرض',
        'short_description' => 'توضیح کوتاه',
        'phone' => 'شماره تماس',
        'email' => 'ایمیل',
        'address' => 'آدرس',
        'whatsapp' => 'واتساپ',
        'telegram' => 'تلگرام',
        'instagram' => 'اینستاگرام',
        'linkedin' => 'لینکدین',
        'copyright' => 'کپی‌رایت',
        'primary_color' => 'رنگ اصلی',
        'meta_title' => 'Meta title',
        'meta_description' => 'Meta description',
        'maintenance_message' => 'پیام تعمیرات',
    ];

    $fileFields = [
        'logo' => 'لوگو',
        'mobile_logo' => 'لوگوی موبایل',
        'favicon' => 'favicon',
        'footer_logo' => 'لوگوی فوتر',
        'trust_badge' => 'نماد اعتماد',
    ];
@endphp

<form class="card p-4" method="POST" enctype="multipart/form-data" action="{{ route('admin.settings.update') }}">
    @csrf
    @method('PUT')

    <div class="row g-3">
        @foreach ($textFields as $key => $label)
            <div class="col-md-6">
                <label class="form-label" for="setting-{{ $key }}">{{ $label }}</label>
                <textarea
                    id="setting-{{ $key }}"
                    class="form-control"
                    name="{{ $key }}"
                    rows="{{ str_contains($key, 'description') || $key === 'address' ? 3 : 1 }}"
                >{{ old($key, $settings[$key]->value ?? '') }}</textarea>
            </div>
        @endforeach

        @foreach ($fileFields as $key => $label)
            <div class="col-md-4">
                <label class="form-label" for="setting-{{ $key }}">{{ $label }}</label>
                @if (! empty($settings[$key]->value))
                    <div class="mb-2">
                        <img src="{{ asset($settings[$key]->value) }}" alt="{{ $label }}" class="rounded" style="max-height: 70px; max-width: 140px;">
                    </div>
                @endif
                <input id="setting-{{ $key }}" class="form-control" type="file" name="{{ $key }}">
            </div>
        @endforeach

        <div class="col-md-4">
            <div class="form-check form-switch mt-4">
                <input
                    class="form-check-input"
                    type="checkbox"
                    id="setting-site-active"
                    name="site_active"
                    value="1"
                    @checked((bool) ($settings['site_active']->value ?? true))
                >
                <label class="form-check-label" for="setting-site-active">سایت فعال</label>
            </div>
        </div>
    </div>

    <button class="btn btn-primary mt-4" type="submit">ذخیره تنظیمات</button>
</form>
@endsection
