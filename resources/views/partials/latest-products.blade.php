<section class="products-section">
    <div class="container">
        <h2 class="section-title">جدیدترین محصولات</h2>

        <div class="row g-4">
            @foreach ([
                ['image' => 'product5.svg', 'alt' => 'موبایل', 'title' => 'گوشی هوشمند Nova', 'desc' => 'حافظه ۱۲۸ گیگابایت', 'price' => '۸,۹۰۰,۰۰۰ تومان'],
                ['image' => 'product6.svg', 'alt' => 'لپ تاپ', 'title' => 'لپ‌تاپ سبک و سریع', 'desc' => 'مناسب کارهای روزمره', 'price' => '۲۸,۵۰۰,۰۰۰ تومان'],
                ['image' => 'product7.svg', 'alt' => 'ماوس', 'title' => 'ماوس بی‌سیم', 'desc' => 'طراحی راحت و دقیق', 'price' => '۴۵۰,۰۰۰ تومان'],
                ['image' => 'product8.svg', 'alt' => 'شارژر', 'title' => 'شارژر سریع USB-C', 'desc' => 'مناسب موبایل و تبلت', 'price' => '۶۸۰,۰۰۰ تومان'],
            ] as $product)
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="simple-card">
                        <img src="{{ asset('assets/images/'.$product['image']) }}" alt="{{ $product['alt'] }}">
                        <h3>{{ $product['title'] }}</h3>
                        <p>{{ $product['desc'] }}</p>
                        <strong>{{ $product['price'] }}</strong>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
