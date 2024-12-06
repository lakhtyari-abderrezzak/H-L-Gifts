<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;


Route::get('/about', function () {
    return view('about');
});
Route::get('/services', function () {
    return view('services');
});

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'sendEnquiry'])->name('contact.sendEnquiry');


Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard.index');
    Route::get('dashboard/edit/{id}', [DashboardController::class, 'edit'])->name('dashboard.edit');
    Route::get('dashboard/edit_product/{id}', [DashboardController::class, 'edit_product'])->name('dashboard.edit_product');
    Route::get('/latest', [DashboardController::class, 'latest'])->name('dashboard.latest');
    Route::get('/add', [DashboardController::class, 'add'])->name('dashboard.add');
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::post('/products', [ProductController::class, 'store'])->name('products.store');
Route::get('/products{id}', [ProductController::class, 'show'])->name('products.show');
Route::patch('/products/{id}', [ProductController::class, 'update'])->name('products.update');
Route::post('/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy');

Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store');
Route::get('categories/product/{id}', [CategoryController::class, 'cat_product'])->name('categories.cat_product');
Route::patch('categories/{id}', [CategoryController::class, 'update'])->name('categories.update');
Route::post('categories/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');


Route::middleware('guest')->group(function(){
    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');
});

Route::get('cart', [CartController::class, 'index'])->name('cart.index');
Route::post('cart/{product}', [CartController::class, 'addToCart'])->name('cart.addToCart');
Route::post('cart', [CartController::class, 'removeFromCart'])->name('cart.removeFromCart');
Route::patch('cart', [CartController::class, 'updateCart'])->name('cart.updateCart');

Route::get('checkout', [CheckoutController::class, 'index'])->name('checkout.index');
Route::get('payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
Route::post('checkout', [CheckoutController::class, 'order'])->name('checkout.order');
        


Route::controller(CheckoutController::class)->group(function(){

    Route::get('stripe/{total_price}', 'stripe')->name('checkout.stripe');

    Route::post('stripe/{total_price}', 'stripePost')->name('stripe.post');

});




