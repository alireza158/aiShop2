<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (! Schema::hasTable('brands')) {
            Schema::create('brands', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('slug')->unique();
                $table->string('logo')->nullable();
                $table->text('description')->nullable();
                $table->string('url')->nullable();
                $table->boolean('show_in_home')->default(true);
                $table->boolean('is_active')->default(true);
                $table->unsignedInteger('sort_order')->default(0);
                $table->timestamps();
            });
        }

        if (Schema::hasTable('users')) {
            Schema::table('users', function (Blueprint $table) {
                if (! Schema::hasColumn('users', 'role')) {
                    $table->string('role')->default('customer')->after('password')->index();
                }
                if (! Schema::hasColumn('users', 'is_admin')) {
                    $table->boolean('is_admin')->default(false)->after('role')->index();
                }
            });
        }

        if (Schema::hasTable('categories')) {
            Schema::table('categories', function (Blueprint $table) {
                if (! Schema::hasColumn('categories', 'parent_id')) {
                    $table->foreignId('parent_id')->nullable()->after('id')->constrained('categories')->nullOnDelete();
                }
                if (! Schema::hasColumn('categories', 'sort_order')) {
                    $table->unsignedInteger('sort_order')->default(0)->after('description');
                }
                if (! Schema::hasColumn('categories', 'show_in_home')) {
                    $table->boolean('show_in_home')->default(true)->after('sort_order');
                }
                if (! Schema::hasColumn('categories', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('is_active');
                }
                if (! Schema::hasColumn('categories', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (! Schema::hasColumn('categories', 'deleted_at')) {
                    $table->softDeletes();
                }
            });
        }

        if (Schema::hasTable('products')) {
            Schema::table('products', function (Blueprint $table) {
                if (! Schema::hasColumn('products', 'brand_id')) {
                    $table->foreignId('brand_id')->nullable()->after('category_id')->constrained('brands')->nullOnDelete();
                }
                if (! Schema::hasColumn('products', 'specifications')) {
                    $table->json('specifications')->nullable()->after('description');
                }
                if (! Schema::hasColumn('products', 'sku')) {
                    $table->string('sku')->nullable()->after('stock');
                }
                foreach (['is_new', 'is_best_selling', 'is_suggested'] as $column) {
                    if (! Schema::hasColumn('products', $column)) {
                        $table->boolean($column)->default(false)->after('is_featured');
                    }
                }
                if (! Schema::hasColumn('products', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('is_active');
                }
                if (! Schema::hasColumn('products', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (! Schema::hasColumn('products', 'deleted_at')) {
                    $table->softDeletes();
                }
            });
        }

        if (Schema::hasTable('sliders')) {
            Schema::table('sliders', function (Blueprint $table) {
                if (! Schema::hasColumn('sliders', 'mobile_image')) {
                    $table->string('mobile_image')->nullable()->after('image');
                }
                if (! Schema::hasColumn('sliders', 'display_mode')) {
                    $table->string('display_mode')->nullable()->after('button_link');
                }
                if (! Schema::hasColumn('sliders', 'show_mobile')) {
                    $table->boolean('show_mobile')->default(true)->after('sort_order');
                }
                if (! Schema::hasColumn('sliders', 'show_desktop')) {
                    $table->boolean('show_desktop')->default(true)->after('show_mobile');
                }
            });
        }

        if (Schema::hasTable('articles')) {
            Schema::table('articles', function (Blueprint $table) {
                if (! Schema::hasColumn('articles', 'author_id')) {
                    $table->foreignId('author_id')->nullable()->after('content')->constrained('users')->nullOnDelete();
                }
                if (! Schema::hasColumn('articles', 'published_at')) {
                    $table->timestamp('published_at')->nullable()->after('author_id');
                }
                if (! Schema::hasColumn('articles', 'show_in_home')) {
                    $table->boolean('show_in_home')->default(true)->after('published_at');
                }
                if (! Schema::hasColumn('articles', 'is_active')) {
                    $table->boolean('is_active')->default(true)->after('is_published');
                }
                if (! Schema::hasColumn('articles', 'meta_title')) {
                    $table->string('meta_title')->nullable()->after('is_active');
                }
                if (! Schema::hasColumn('articles', 'meta_description')) {
                    $table->text('meta_description')->nullable()->after('meta_title');
                }
                if (! Schema::hasColumn('articles', 'deleted_at')) {
                    $table->softDeletes();
                }
            });
        }
    }

    public function down(): void
    {
        // Intentionally non-destructive: these columns may now contain admin-managed content.
    }
};
