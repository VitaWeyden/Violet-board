<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BoxCollectController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SideBarController;
use Illuminate\Support\Facades\Route;

// -- Home --
Route::get('/', [HomeController::class, 'index'])->name('home');

// -- Shop --
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');
Route::get('/shop/on-sale', [NavBarController::class, 'showOnSale'])->name('shop.on-sale');
Route::get('/shop/new', [NavBarController::class, 'showNew'])->name('shop.new');
Route::get('/shop/bestsellers', [NavBarController::class, 'showBestSellers'])->name('shop.bestsellers');
Route::get('/shop/favorites', [NavBarController::class, 'showFavorites'])->name('shop.favorites');

// Category route must come after named shop routes to avoid conflicts
Route::get('/shop/{category}', [SideBarController::class, 'showCategory'])
    ->name('shop.category')
    ->where('category', '^(?!on-sale|new|bestsellers|favorites).*$');

// -- Product --
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update/{id}', [ProductController::class, 'updateCartQuantity'])->name('cart.update');
Route::post('/favorite/toggle/{id}', [ProductController::class, 'toggleFavorite'])->name('favorite.toggle');

// -- Cart --
Route::get('/cart', fn() => view('cart'))->name('cart');

// -- Delivery --
Route::get('/delivery/courier', fn() => view('transport', ['mode' => 'kurier', 'locations' => []]))->name('delivery.courier');
Route::get('/delivery/boxcollect', [BoxCollectController::class, 'showForm'])->name('boxcollect.form');

// -- Checkout --
Route::get('/checkout', fn() => view('payment'))->name('checkout');
Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');


// -- Auth --
Route::get('/login', fn() => view('log-in'))->name('login');
Route::get('/register', fn() => view('registration'))->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::delete('/profile/delete', [AuthController::class, 'destroy'])->middleware('auth')->name('profile.delete');

// -- Search --
Route::get('/search/suggest', [SearchController::class, 'suggest'])->name('search.suggest');
Route::get('/search', [SearchController::class, 'index'])->name('search');
