<?php

namespace App\Console\Commands;

use App\Models\{Article, Category, Product, Slider};
use App\Support\ShopImage;
use Illuminate\Console\Command;

class FillShopImages extends Command
{
    protected $signature = 'shop:fill-images';
    protected $description = 'Fill missing or broken local shop images for products, galleries, categories, sliders, articles, and brand placeholders.';

    public function handle(): int
    {
        $counts = ['products' => 0, 'galleries' => 0, 'categories' => 0, 'sliders' => 0, 'articles' => 0, 'brands' => 0];

        Category::query()->each(function (Category $category) use (&$counts) {
            $path = ShopImage::pathFor('category', $category->slug ?: $category->name);
            ShopImage::ensureSvg($path, $category->name, 'category');
            if ($this->missing($category->image)) {
                $category->update(['image' => $path]);
                $counts['categories']++;
            }
        });

        Product::with('category')->each(function (Product $product) use (&$counts) {
            $base = $product->slug ?: $product->name;
            $main = ShopImage::pathFor('product', $base, 1);
            ShopImage::ensureSvg($main, $product->name, 'product', 1);
            $gallery = [];
            for ($i = 1; $i <= 3; $i++) {
                $path = ShopImage::pathFor('product', $base, $i);
                ShopImage::ensureSvg($path, $product->name, 'product', $i);
                $gallery[] = $path;
            }
            $updates = [];
            if ($this->missing($product->image)) {
                $updates['image'] = $main;
                $counts['products']++;
            }
            if (count(array_filter((array) $product->gallery)) < 3) {
                $updates['gallery'] = $gallery;
                $counts['galleries']++;
            }
            if ($updates) {
                $product->update($updates);
            }
            if ($product->brand) {
                $brand = ShopImage::pathFor('brand', $product->brand);
                ShopImage::ensureSvg($brand, $product->brand, 'brand');
                $counts['brands']++;
            }
        });

        Slider::query()->each(function (Slider $slider) use (&$counts) {
            $path = ShopImage::pathFor('slider', $slider->title ?: 'slider-'.$slider->id);
            ShopImage::ensureSvg($path, $slider->title, 'slider');
            if ($this->missing($slider->image)) {
                $slider->update(['image' => $path]);
                $counts['sliders']++;
            }
        });

        Article::query()->each(function (Article $article) use (&$counts) {
            $path = ShopImage::pathFor('article', $article->slug ?: $article->title);
            ShopImage::ensureSvg($path, $article->title, 'article');
            if ($this->missing($article->image)) {
                $article->update(['image' => $path]);
                $counts['articles']++;
            }
        });

        foreach (ShopImage::PLACEHOLDERS as $type => $path) {
            ShopImage::ensureSvg($path, ucfirst($type), $type === 'banner' ? 'slider' : $type);
        }

        $this->info('Images completed: '.json_encode($counts, JSON_UNESCAPED_UNICODE));
        return self::SUCCESS;
    }

    private function missing(?string $path): bool
    {
        if (! $path) {
            return true;
        }
        if (str_starts_with($path, 'http://') || str_starts_with($path, 'https://')) {
            return false;
        }
        $relative = ltrim(str_starts_with($path, 'public/') ? substr($path, 7) : $path, '/');
        return ! file_exists(public_path($relative));
    }
}
