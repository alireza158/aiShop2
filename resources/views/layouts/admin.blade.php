<!doctype html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'پنل مدیریت')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;600;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: Vazirmatn, Tahoma, sans-serif; background: #f5f7fb; }
        .admin-sidebar { min-height: 100vh; background: #101827; }
        .admin-sidebar a { color: #dbe4ff; text-decoration: none; display: block; padding: .65rem 1rem; border-radius: .75rem; }
        .admin-sidebar a:hover,
        .admin-sidebar .active { background: #2563eb; color: #fff; }
        .card { border: 0; border-radius: 1rem; box-shadow: 0 10px 30px rgba(24, 35, 58, .07); }
        .form-control, .form-select, .btn { border-radius: .75rem; }
        .table > :not(caption) > * > * { padding: 1rem; }
    </style>
    @stack('styles')
</head>
<body>
@php
    $adminLinks = [
        'dashboard' => 'داشبورد',
        'products.index' => 'محصولات',
        'categories.index' => 'دسته‌بندی‌ها',
        'brands.index' => 'برندها',
        'sliders.index' => 'اسلایدرها',
        'banners.index' => 'بنرها',
        'articles.index' => 'مقاله‌ها',
        'orders.index' => 'سفارش‌ها',
        'users.index' => 'کاربران',
        'menus.index' => 'منوها',
        'pages.index' => 'صفحات ثابت',
        'home-sections.index' => 'صفحه اصلی',
        'settings.index' => 'تنظیمات',
        'contact-messages.index' => 'پیام‌ها',
    ];
@endphp
<div class="container-fluid">
    <div class="row">
        <aside class="col-lg-2 admin-sidebar p-3">
            <h4 class="text-white mb-4">AI Shop Admin</h4>
            @foreach ($adminLinks as $route => $label)
                <a class="{{ request()->routeIs('admin.'.$route) ? 'active' : '' }}" href="{{ route('admin.'.$route) }}">
                    {{ $label }}
                </a>
            @endforeach
            <form method="POST" action="{{ route('admin.logout') }}" class="mt-3">
                @csrf
                <button class="btn btn-outline-light w-100" type="submit">خروج</button>
            </form>
        </aside>
        <main class="col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 mb-0">@yield('title', 'پنل مدیریت')</h1>
                <a href="{{ route('home') }}" class="btn btn-light">مشاهده سایت</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/41.4.2/classic/ckeditor.js"></script>
<script>
    document.querySelectorAll('.js-editor').forEach((element) => {
        if (window.ClassicEditor) {
            ClassicEditor.create(element).catch(() => {});
        }
    });
</script>
@stack('scripts')
</body>
</html>
