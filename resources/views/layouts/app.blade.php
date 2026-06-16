<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="@yield('meta_description', 'AI Shop - فروشگاه دیجیتال')">
    <title>@yield('title', 'AI Shop - فروشگاه دیجیتال')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">
    @stack('styles')
</head>
<body>
    @include('partials.header')

    <main>
        @if (session('success'))
            <div class="container pt-3"><div class="alert alert-success rounded-4 shadow-sm">{{ session('success') }}</div></div>
        @endif
        @if ($errors->any())
            <div class="container pt-3"><div class="alert alert-danger rounded-4 shadow-sm"><ul class="mb-0">@foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach</ul></div></div>
        @endif
        @yield('content')
    </main>

    @include('partials.footer')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/js/script.js') }}"></script>
    @stack('scripts')
</body>
</html>
