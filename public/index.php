<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AI Shop - فروشگاه دیجیتال</title>

    <!-- Bootstrap RTL -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

    <!-- Top Header -->
    <header class="main-header">
        <div class="container">

            <div class="top-header">
                <a href="#" class="logo">AI Shop</a>

                <div class="search-box">
                    <input type="text" placeholder="جستجو در محصولات دیجیتال...">
                    <button>جستجو</button>
                </div>

                <div class="header-actions">
                    <a href="#" class="login-btn">ورود | ثبت‌نام</a>
                    <a href="#" class="cart-btn">سبد خرید</a>
                </div>
            </div>

            <nav class="main-menu">
                <a href="#">دسته‌بندی کالاها</a>
                <a href="#">موبایل</a>
                <a href="#">لپ‌تاپ</a>
                <a href="#">هدفون</a>
                <a href="#">ساعت هوشمند</a>
                <a href="#">تخفیف‌ها</a>
                <a href="#">تماس با ما</a>
            </nav>

        </div>
    </header>

    <!-- Hero Banner -->
    <section class="hero-banner">
        <div class="container">
            <div class="hero-content">
                <div>
                    <span class="hero-badge">فروش ویژه محصولات دیجیتال</span>
                    <h1>خرید آسان، سریع و هوشمند</h1>
                    <p>
                        جدیدترین موبایل‌ها، لپ‌تاپ‌ها و لوازم دیجیتال را با قیمت مناسب تهیه کنید.
                    </p>
                    <button id="heroBtn">مشاهده محصولات</button>
                </div>

                <div class="hero-card">
                    <h3>پیشنهاد امروز</h3>
                    <p>هدفون بی‌سیم حرفه‌ای</p>
                    <strong>فقط ۱,۲۰۰,۰۰۰ تومان</strong>
                </div>
            </div>
        </div>
    </section>

    <!-- Categories -->
    <section class="categories-section">
        <div class="container">
            <h2 class="section-title">دسته‌بندی‌های محبوب</h2>

            <div class="category-list">
                <div class="category-item">
                    <div class="category-icon">📱</div>
                    <p>موبایل</p>
                </div>

                <div class="category-item">
                    <div class="category-icon">💻</div>
                    <p>لپ‌تاپ</p>
                </div>

                <div class="category-item">
                    <div class="category-icon">🎧</div>
                    <p>هدفون</p>
                </div>

                <div class="category-item">
                    <div class="category-icon">⌚</div>
                    <p>ساعت هوشمند</p>
                </div>

                <div class="category-item">
                    <div class="category-icon">🔊</div>
                    <p>اسپیکر</p>
                </div>

                <div class="category-item">
                    <div class="category-icon">⌨️</div>
                    <p>لوازم جانبی</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Amazing Products -->
    <section class="amazing-section" id="products">
        <div class="container">
            <div class="amazing-box">

                <div class="amazing-title">
                    <h2>پیشنهادهای شگفت‌انگیز</h2>
                    <p>محصولات منتخب با تخفیف ویژه</p>
                </div>

                <div class="row g-3">

                    <!-- Product 1 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="product-card">
                            <span class="discount">۱۵٪</span>
                            <img src="assets/images/product1.jpg" alt="هدفون بی‌سیم">

                            <div class="product-info">
                                <h3>هدفون بی‌سیم مدل Pro</h3>
                                <p>صدای باکیفیت، باتری بادوام</p>

                                <div class="price-row">
                                    <span class="old-price">۱,۴۰۰,۰۰۰</span>
                                    <span class="price">۱,۲۰۰,۰۰۰ تومان</span>
                                </div>

                                <button>افزودن به سبد خرید</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 2 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="product-card">
                            <span class="discount">۱۰٪</span>
                            <img src="assets/images/product2.jpg" alt="ساعت هوشمند">

                            <div class="product-info">
                                <h3>ساعت هوشمند سری X</h3>
                                <p>مناسب ورزش و استفاده روزانه</p>

                                <div class="price-row">
                                    <span class="old-price">۲,۸۰۰,۰۰۰</span>
                                    <span class="price">۲,۵۰۰,۰۰۰ تومان</span>
                                </div>

                                <button>افزودن به سبد خرید</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 3 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="product-card">
                            <span class="discount">۲۰٪</span>
                            <img src="assets/images/product3.jpg" alt="اسپیکر بلوتوثی">

                            <div class="product-info">
                                <h3>اسپیکر بلوتوثی قابل حمل</h3>
                                <p>صدای قدرتمند و طراحی زیبا</p>

                                <div class="price-row">
                                    <span class="old-price">۱,۲۰۰,۰۰۰</span>
                                    <span class="price">۹۵۰,۰۰۰ تومان</span>
                                </div>

                                <button>افزودن به سبد خرید</button>
                            </div>
                        </div>
                    </div>

                    <!-- Product 4 -->
                    <div class="col-12 col-sm-6 col-lg-3">
                        <div class="product-card">
                            <span class="discount">۱۲٪</span>
                            <img src="assets/images/product4.jpg" alt="کیبورد گیمینگ">

                            <div class="product-info">
                                <h3>کیبورد گیمینگ RGB</h3>
                                <p>مناسب بازی و تایپ حرفه‌ای</p>

                                <div class="price-row">
                                    <span class="old-price">۲,۰۵۰,۰۰۰</span>
                                    <span class="price">۱,۸۰۰,۰۰۰ تومان</span>
                                </div>

                                <button>افزودن به سبد خرید</button>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </section>

    <!-- More Products -->
    <section class="products-section">
        <div class="container">
            <h2 class="section-title">جدیدترین محصولات</h2>

            <div class="row g-4">

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="simple-card">
                        <img src="assets/images/product5.jpg" alt="موبایل">
                        <h3>گوشی هوشمند Nova</h3>
                        <p>حافظه ۱۲۸ گیگابایت</p>
                        <strong>۸,۹۰۰,۰۰۰ تومان</strong>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="simple-card">
                        <img src="assets/images/product6.jpg" alt="لپ تاپ">
                        <h3>لپ‌تاپ سبک و سریع</h3>
                        <p>مناسب کارهای روزمره</p>
                        <strong>۲۸,۵۰۰,۰۰۰ تومان</strong>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="simple-card">
                        <img src="assets/images/product7.jpg" alt="ماوس">
                        <h3>ماوس بی‌سیم</h3>
                        <p>طراحی راحت و دقیق</p>
                        <strong>۴۵۰,۰۰۰ تومان</strong>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="simple-card">
                        <img src="assets/images/product8.jpg" alt="شارژر">
                        <h3>شارژر سریع USB-C</h3>
                        <p>مناسب موبایل و تبلت</p>
                        <strong>۶۸۰,۰۰۰ تومان</strong>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">

                <div>
                    <h3>AI Shop</h3>
                    <p>فروشگاه ساده محصولات دیجیتال</p>
                </div>

                <div>
                    <h4>دسترسی سریع</h4>
                    <a href="#">خانه</a>
                    <a href="#">محصولات</a>
                    <a href="#">درباره ما</a>
                    <a href="#">تماس با ما</a>
                </div>

                <div>
                    <h4>پشتیبانی</h4>
                    <p>شماره تماس: ۰۲۱-۱۲۳۴۵۶۷۸</p>
                    <p>ایمیل: info@aishop.com</p>
                </div>

            </div>

            <div class="copyright">
                تمام حقوق این فروشگاه محفوظ است © 2026
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom JS -->
    <script src="assets/js/script.js"></script>
</body>
</html>