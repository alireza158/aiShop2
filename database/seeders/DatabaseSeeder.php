<?php

namespace Database\Seeders;

use App\Models\{Article, Category, Product, Slider, User};
use App\Support\ShopImage;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::firstOrCreate(['email' => 'admin@aishop.test'], ['name' => 'Admin', 'password' => Hash::make('password')]);

        $cats = [
            ['موبایل', 'mobile', 'گوشی‌های هوشمند'],
            ['لپ‌تاپ', 'laptop', 'لپ‌تاپ و اولترابوک'],
            ['هدفون', 'headphone', 'هدفون و هندزفری'],
            ['ساعت هوشمند', 'watch', 'گجت پوشیدنی'],
            ['اسپیکر', 'speaker', 'صدای قابل حمل'],
            ['لوازم جانبی', 'accessories', 'کابل و شارژر'],
            ['گیمینگ', 'gaming', 'تجهیزات بازی'],
            ['خانه هوشمند', 'smart-home', 'خانه متصل'],
        ];

        foreach ($cats as $i => $c) {
            $image = ShopImage::pathFor('category', $c[1]);
            ShopImage::ensureSvg($image, $c[0], 'category', $i + 1);
            Category::updateOrCreate(['slug' => $c[1]], ['name' => $c[0], 'description' => $c[2], 'image' => $image, 'is_active' => true]);
        }

        Slider::truncate();
        foreach ([
            ['کمپین تابستانی AI Shop', 'تا ۳۰٪ تخفیف محصولات دیجیتال', 'خرید ویژه'],
            ['لپ‌تاپ‌های حرفه‌ای', 'انتخابی مطمئن برای کار و آموزش', 'مشاهده لپ‌تاپ‌ها'],
            ['گجت‌های هوشمند', 'تجربه زندگی مدرن با بهترین برندها', 'شروع خرید'],
        ] as $i => $s) {
            $image = ShopImage::pathFor('slider', 'slider-'.($i + 1));
            ShopImage::ensureSvg($image, $s[0], 'slider', $i + 1);
            Slider::create(['title' => $s[0], 'subtitle' => $s[1], 'button_text' => $s[2], 'button_link' => route('products.index'), 'image' => $image, 'sort_order' => $i]);
        }

        $brands = ['Apple', 'Samsung', 'Xiaomi', 'Asus', 'Lenovo', 'Sony', 'JBL', 'Logitech'];
        foreach ($brands as $brand) {
            ShopImage::ensureSvg(ShopImage::pathFor('brand', $brand), $brand, 'brand');
        }

        $names = ['گوشی هوشمند Nova', 'لپ‌تاپ سبک Pro', 'هدفون بی‌سیم Max', 'ساعت هوشمند Fit', 'اسپیکر بلوتوثی Boom', 'کیبورد گیمینگ RGB', 'ماوس بی‌سیم Silent', 'شارژر سریع USB-C', 'تبلت آموزشی Tab', 'مانیتور ۲۷ اینچ', 'وبکم Full HD', 'پاوربانک ۲۰۰۰۰', 'روتر دو بانده', 'دوربین امنیتی', 'کنسول بازی دستی', 'هارد اکسترنال', 'فلش پرسرعت', 'میکروفون استریم', 'هاب تایپ سی', 'چراغ هوشمند'];
        foreach ($names as $i => $name) {
            $cat = Category::skip($i % 8)->first();
            $price = rand(4, 90) * 100000;
            $gallery = [];
            for ($v = 1; $v <= 3; $v++) {
                $path = ShopImage::pathFor('product', 'product-'.($i + 1), $v);
                ShopImage::ensureSvg($path, $name, 'product', $v);
                $gallery[] = $path;
            }
            Product::updateOrCreate(['slug' => 'product-'.($i + 1)], ['category_id' => $cat->id, 'name' => $name, 'image' => $gallery[0], 'gallery' => $gallery, 'short_description' => 'محصولی باکیفیت برای استفاده روزمره و حرفه‌ای.', 'description' => 'این محصول با طراحی مدرن، کیفیت ساخت بالا و گارانتی معتبر برای خرید آنلاین مطمئن در AI Shop عرضه شده است.', 'price' => $price, 'discount_price' => $i % 3 === 0 ? $price - rand(1, 8) * 50000 : null, 'stock' => rand(3, 50), 'brand' => $brands[$i % count($brands)], 'rating' => rand(42, 50) / 10, 'features' => ['گارانتی اصالت کالا', 'ارسال سریع', 'کیفیت ساخت بالا'], 'sales_count' => rand(10, 300), 'is_featured' => $i < 12, 'is_active' => true]);
        }

        Article::truncate();
        foreach (['راهنمای خرید گوشی هوشمند', 'چطور لپ‌تاپ مناسب انتخاب کنیم؟', 'مزایای گجت‌های خانه هوشمند'] as $i => $title) {
            $image = ShopImage::pathFor('article', 'article-'.($i + 1));
            ShopImage::ensureSvg($image, $title, 'article', $i + 1);
            Article::create(['title' => $title, 'slug' => 'article-'.($i + 1), 'image' => $image, 'excerpt' => 'نکات کاربردی برای خرید بهتر محصولات دیجیتال.', 'content' => 'در این مقاله معیارهای مهم انتخاب، بودجه‌بندی، گارانتی و تجربه کاربری را بررسی می‌کنیم.', 'is_published' => true]);
        }
    }
}
