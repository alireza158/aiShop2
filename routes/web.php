<?php
use App\Http\Controllers\{BlogController,CartController,CategoryController,CheckoutController,HomeController,OrderController,ProductController};
use App\Http\Controllers\Admin;
use Illuminate\Support\Facades\Route;

Route::get('/', HomeController::class)->name('home');
Route::get('/products',[ProductController::class,'index'])->name('products.index');
Route::get('/products/{slug}',[ProductController::class,'show'])->name('products.show');
Route::get('/categories',[CategoryController::class,'index'])->name('categories.index');
Route::get('/categories/{slug}',[CategoryController::class,'show'])->name('categories.show');
Route::get('/cart',[CartController::class,'index'])->name('cart.index');
Route::post('/cart/{product}',[CartController::class,'add'])->name('cart.add');
Route::patch('/cart/{product}',[CartController::class,'update'])->name('cart.update');
Route::delete('/cart/{product}',[CartController::class,'remove'])->name('cart.remove');
Route::get('/checkout',[CheckoutController::class,'index'])->name('checkout.index');
Route::post('/checkout',[CheckoutController::class,'store'])->name('checkout.store');
Route::get('/order/success/{order}',[OrderController::class,'success'])->name('orders.success');
Route::get('/blog',[BlogController::class,'index'])->name('blog.index');
Route::get('/blog/{slug}',[BlogController::class,'show'])->name('blog.show');
Route::view('/about','pages.about')->name('about');
Route::view('/contact','pages.contact')->name('contact');
Route::prefix('admin')->name('admin.')->group(function(){Route::get('/',Admin\DashboardController::class)->name('dashboard');Route::resource('products',Admin\ProductController::class);Route::resource('categories',Admin\CategoryController::class);Route::resource('sliders',Admin\SliderController::class);Route::get('orders',[Admin\OrderController::class,'index'])->name('orders.index');});
