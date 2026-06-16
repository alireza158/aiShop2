<section class="amazing-section" id="products">
    <div class="container">
        <div class="amazing-box" id="amazing">
            <div class="amazing-title">
                <h2>پیشنهادهای شگفت‌انگیز</h2>
                <p>محصولات منتخب با تخفیف ویژه</p>
            </div>

            <div class="row g-3">
                @foreach ([
                    ['discount' => '۱۵٪', 'image' => 'product1.svg', 'alt' => 'هدفون بی‌سیم', 'title' => 'هدفون بی‌سیم مدل Pro', 'desc' => 'صدای باکیفیت، باتری بادوام', 'old' => '۱,۴۰۰,۰۰۰', 'price' => '۱,۲۰۰,۰۰۰ تومان'],
                    ['discount' => '۱۰٪', 'image' => 'product2.svg', 'alt' => 'ساعت هوشمند', 'title' => 'ساعت هوشمند سری X', 'desc' => 'مناسب ورزش و استفاده روزانه', 'old' => '۲,۸۰۰,۰۰۰', 'price' => '۲,۵۰۰,۰۰۰ تومان'],
                    ['discount' => '۲۰٪', 'image' => 'product3.svg', 'alt' => 'اسپیکر بلوتوثی', 'title' => 'اسپیکر بلوتوثی قابل حمل', 'desc' => 'صدای قدرتمند و طراحی زیبا', 'old' => '۱,۲۰۰,۰۰۰', 'price' => '۹۵۰,۰۰۰ تومان'],
                    ['discount' => '۱۲٪', 'image' => 'product4.svg', 'alt' => 'کیبورد گیمینگ', 'title' => 'کیبورد گیمینگ RGB', 'desc' => 'مناسب بازی و تایپ حرفه‌ای', 'old' => '۲,۰۵۰,۰۰۰', 'price' => '۱,۸۰۰,۰۰۰ تومان'],
                ] as $product)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="product-card">
                            <span class="discount">{{ $product['discount'] }}</span>
                            <img src="{{ asset('assets/images/'.$product['image']) }}" alt="{{ $product['alt'] }}">
                            <div class="product-info">
                                <h3>{{ $product['title'] }}</h3>
                                <p>{{ $product['desc'] }}</p>
                                <div class="price-row">
                                    <span class="old-price">{{ $product['old'] }}</span>
                                    <span class="price">{{ $product['price'] }}</span>
                                </div>
                                <button type="button">افزودن به سبد خرید</button>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
