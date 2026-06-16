<?php

namespace App\Support;

class ShopImage
{
    public const PLACEHOLDERS = [
        'product' => 'assets/images/placeholders/placeholder-product.svg',
        'category' => 'assets/images/placeholders/placeholder-category.svg',
        'banner' => 'assets/images/placeholders/placeholder-banner.svg',
        'article' => 'assets/images/placeholders/placeholder-article.svg',
        'brand' => 'assets/images/placeholders/placeholder-brand.svg',
    ];

    public static function url(?string $path, string $type = 'product'): string
    {
        $path = trim((string) $path);
        $fallback = self::PLACEHOLDERS[$type] ?? self::PLACEHOLDERS['product'];

        if ($path === '') {
            return asset($fallback);
        }

        if (self::startsWith($path, ['http://', 'https://', '//'])) {
            return $path;
        }

        $relative = ltrim($path, '/');
        if (self::startsWith($relative, ['public/'])) {
            $relative = substr($relative, strlen('public/'));
        }

        return file_exists(public_path($relative)) ? asset($relative) : asset($fallback);
    }

    public static function pathFor(string $type, string $slug, int $variant = 1): string
    {
        $folder = match ($type) {
            'category' => 'categories',
            'slider', 'banner' => 'sliders',
            'article' => 'articles',
            'brand' => 'brands',
            default => 'products',
        };

        return "assets/images/{$folder}/".self::slug($slug ?: $type)."-{$variant}.svg";
    }

    public static function ensureSvg(string $relativePath, string $title, string $type = 'product', int $variant = 1): void
    {
        $fullPath = public_path($relativePath);
        if (file_exists($fullPath)) {
            return;
        }

        if (! is_dir(dirname($fullPath))) {
            mkdir(dirname($fullPath), 0755, true);
        }

        file_put_contents($fullPath, self::svg($title, $type, $variant));
    }

    public static function svg(string $title, string $type = 'product', int $variant = 1): string
    {
        $palette = [
            ['#fff1f2', '#eef2ff', '#ef3f56', '#7c3aed'],
            ['#ecfeff', '#f0fdf4', '#0891b2', '#16a34a'],
            ['#fff7ed', '#fffbeb', '#f97316', '#f59e0b'],
            ['#eff6ff', '#faf5ff', '#2563eb', '#9333ea'],
        ][$variant % 4];
        [$bg1, $bg2, $primary, $secondary] = $palette;
        $label = htmlspecialchars($title, ENT_QUOTES, 'UTF-8');
        $wide = in_array($type, ['slider', 'banner'], true);
        $w = $wide ? 1400 : 900;
        $h = $wide ? 520 : 700;
        $icon = self::icon($type, $primary, $secondary);

        return <<<SVG
<svg xmlns="http://www.w3.org/2000/svg" width="{$w}" height="{$h}" viewBox="0 0 {$w} {$h}" role="img" aria-label="{$label}">
  <defs><linearGradient id="g" x1="0" x2="1" y1="0" y2="1"><stop stop-color="{$bg1}"/><stop offset="1" stop-color="{$bg2}"/></linearGradient><filter id="s"><feDropShadow dx="0" dy="18" stdDeviation="20" flood-opacity=".14"/></filter></defs>
  <rect width="100%" height="100%" rx="42" fill="url(#g)"/>
  <circle cx="80" cy="80" r="160" fill="{$primary}" opacity=".10"/><circle cx="{$w}" cy="{$h}" r="260" fill="{$secondary}" opacity=".12"/>
  {$icon}
  <text x="50%" y="82%" font-family="Arial,Tahoma,sans-serif" font-size="46" font-weight="800" fill="#111827" text-anchor="middle">{$label}</text>
  <text x="50%" y="90%" font-family="Arial,Tahoma,sans-serif" font-size="24" font-weight="700" fill="#6b7280" text-anchor="middle">AI Shop</text>
</svg>
SVG;
    }

    private static function startsWith(string $value, array $needles): bool
    {
        foreach ($needles as $needle) {
            if ($needle !== '' && str_starts_with($value, $needle)) {
                return true;
            }
        }

        return false;
    }

    private static function slug(string $value): string
    {
        $value = preg_replace('/[^\pL\pN]+/u', '-', trim($value));
        $value = trim((string) $value, '-');

        return strtolower($value) ?: 'image';
    }

    private static function icon(string $type, string $primary, string $secondary): string
    {
        return match ($type) {
            'category' => "<g transform='translate(270 150)'><rect width='360' height='300' rx='34' fill='#fff'/><rect x='45' y='55' width='110' height='90' rx='22' fill='{$primary}'/><rect x='205' y='55' width='110' height='90' rx='22' fill='{$secondary}'/><rect x='45' y='185' width='270' height='54' rx='18' fill='#e5e7eb'/></g>",
            'slider', 'banner' => "<g transform='translate(820 95)'><rect width='360' height='300' rx='36' fill='#fff'/><path d='M65 210h230l-48-74-58 52-48-64z' fill='{$primary}' opacity='.9'/><circle cx='115' cy='95' r='44' fill='{$secondary}'/></g><text x='160' y='210' font-family='Arial,Tahoma' font-size='58' font-weight='900' fill='#fff'>فروش ویژه</text>",
            'article' => "<g transform='translate(250 130)'><rect width='400' height='350' rx='34' fill='#fff'/><rect x='55' y='60' width='290' height='38' rx='16' fill='{$primary}'/><rect x='55' y='135' width='240' height='24' rx='12' fill='#d1d5db'/><rect x='55' y='190' width='290' height='24' rx='12' fill='#d1d5db'/><rect x='55' y='245' width='180' height='24' rx='12' fill='{$secondary}'/></g>",
            'brand' => "<g transform='translate(250 130)'><rect width='400' height='300' rx='42' fill='#fff'/><circle cx='200' cy='120' r='74' fill='{$primary}'/><path d='M130 235h140' stroke='{$secondary}' stroke-width='34' stroke-linecap='round'/></g>",
            default => "<g transform='translate(250 115)'><rect width='400' height='380' rx='40' fill='#fff'/><rect x='95' y='45' width='210' height='250' rx='32' fill='{$primary}' opacity='.95'/><circle cx='200' cy='330' r='20' fill='{$secondary}'/><rect x='135' y='80' width='130' height='170' rx='18' fill='#fff' opacity='.85'/></g>",
        };
    }
}
