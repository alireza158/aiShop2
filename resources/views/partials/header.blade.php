<header class="main-header">
    <div class="container">
        <div class="top-header">
            <a href="{{ route('home') }}" class="logo">AI Shop</a>

            <form class="search-box" action="{{ route('products') }}" method="GET">
                <input type="text" name="q" placeholder="جستجو در محصولات دیجیتال..." value="{{ request('q') }}">
                <button type="submit">جستجو</button>
            </form>

            <div class="header-actions">
                <a href="{{ url('/login') }}" class="login-btn">ورود | ثبت‌نام</a>
                <a href="{{ url('/cart') }}" class="cart-btn">سبد خرید</a>
            </div>
        </div>

        @include('partials.navbar')
    </div>
</header>
