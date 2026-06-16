@extends('layouts.admin')

@section('title', 'فرم محصول')

@section('content')
@php
    $textFields = [
        'name' => 'نام',
        'slug' => 'slug',
        'sku' => 'SKU',
        'price' => 'قیمت',
        'discount_price' => 'قیمت تخفیف',
        'stock' => 'موجودی',
        'brand' => 'برند متنی',
        'rating' => 'امتیاز',
        'meta_title' => 'Meta title',
    ];
    $checkboxFields = [
        'is_featured' => 'ویژه',
        'is_new' => 'جدید',
        'is_best_selling' => 'پرفروش',
        'is_suggested' => 'پیشنهادی',
        'is_active' => 'فعال',
    ];
@endphp

<form class="card p-4" method="POST" enctype="multipart/form-data" action="{{ $product->exists ? route('admin.products.update', $product) : route('admin.products.store') }}">
    @csrf
    @if ($product->exists)
        @method('PUT')
    @endif

    <div class="row g-3">
        <div class="col-md-4">
            <select class="form-select" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}" @selected(old('category_id', $product->category_id) == $category->id)>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <select class="form-select" name="brand_id">
                <option value="">بدون برند</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}" @selected(old('brand_id', $product->brand_id) == $brand->id)>
                        {{ $brand->name }}
                    </option>
                @endforeach
            </select>
        </div>

        @foreach ($textFields as $name => $label)
            <div class="col-md-4">
                <input class="form-control" name="{{ $name }}" value="{{ old($name, $product->$name) }}" placeholder="{{ $label }}">
            </div>
        @endforeach

        <div class="col-md-6">
            <label class="form-label">تصویر اصلی</label>
            @if ($product->image)
                <div class="mb-2"><img src="{{ asset($product->image) }}" height="70" alt="{{ $product->name }}"></div>
            @endif
            <input class="form-control" type="file" name="image">
        </div>

        <div class="col-md-6">
            <label class="form-label">گالری</label>
            <input class="form-control" type="file" name="gallery[]" multiple>
        </div>

        <div class="col-12">
            <textarea class="form-control" name="short_description" placeholder="توضیح کوتاه">{{ old('short_description', $product->short_description) }}</textarea>
        </div>
        <div class="col-12">
            <textarea class="form-control js-editor" name="description">{{ old('description', $product->description) }}</textarea>
        </div>
        <div class="col-12">
            <textarea class="form-control" name="specifications" placeholder="مشخصات فنی JSON/متن">{{ old('specifications', is_array($product->specifications) ? json_encode($product->specifications, JSON_UNESCAPED_UNICODE) : $product->specifications) }}</textarea>
        </div>
        <div class="col-12">
            <textarea class="form-control" name="meta_description" placeholder="Meta description">{{ old('meta_description', $product->meta_description) }}</textarea>
        </div>

        @foreach ($checkboxFields as $name => $label)
            <div class="col-md-2">
                <label class="form-check-label">
                    <input type="checkbox" name="{{ $name }}" value="1" @checked(old($name, $product->$name))>
                    {{ $label }}
                </label>
            </div>
        @endforeach
    </div>

    <button class="btn btn-primary mt-4" type="submit">ذخیره</button>
</form>
@endsection
