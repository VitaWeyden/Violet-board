<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SideBarController;
use App\Http\Controllers\NavBarController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DakujemeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BoxCollectController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\OrderController;



Route::get('/', function () {
    return view('home');
});

Route::get('/shop', function () {
    return view('shop', ['categoryTitle' => 'Všetky produkty']);
});

Route::get('/kosik', function () {
    return view('kosik');
});

Route::get('/boxcollect', function () {
    return view('boxcollect');
});

Route::get('/kurierskadoprava', function () {
    return view('kurierskadoprava');
});

Route::get('/platba', function () {
    return view('platba');
});


Route::get('/dakujeme', function () {
    return view('dakujeme');
});

Route::get('/prihlasenie', function () {
    return view('prihlasenie');
});

Route::get('/registracia', function () {
    return view('registracia');
});

Route::get('/shop/akcie', [NavBarController::class, 'showAkcie']);
Route::get('/shop/novinky', [NavBarController::class, 'showNovinky']);
Route::get('/shop/best-sellers', [NavBarController::class, 'showBestSellers']);
Route::get('/shop/oblubene', [NavBarController::class, 'showOblubene']);
Route::get('/dakujeme', [DakujemeController::class, 'index'])->name('dakujeme');

Route::get('/shop/{category}', [SideBarController::class, 'showCategory'])
    ->where('category', '^(?!akcie|novinky|best-sellers).*$');

Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/shop', [ProductController::class, 'index'])->name('shop.index');

Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', function () {
    Auth::logout();
    return redirect('/prihlasenie');
})->name('logout');
Route::delete('/profil/zmazat', [AuthController::class, 'destroy'])->middleware('auth')->name('profil.zmazat');

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/favorite/{id}', [ProductController::class, 'toggleFavorite'])->name('product.favorite');

Route::post('/cart/remove/{id}', [ProductController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/update/{id}', [ProductController::class, 'updateCartQuantity'])->name('cart.update');

Route::post('/cart/add/{id}', [ProductController::class, 'addToCart'])->name('cart.add');
Route::post('/favorite/toggle/{id}', [ProductController::class, 'toggleFavorite'])->name('favorite.toggle');

Route::get('/boxcollect', [BoxCollectController::class, 'showForm'])->name('boxcollect.form');
Route::post('/boxcollect', [BoxCollectController::class, 'submitForm'])->name('boxcollect.submit');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'index'])->name('search');

Route::post('/logout', function () {

    session()->forget('cart');
    Auth::logout();
    return redirect('/prihlasenie');
})->name('logout');

Route::post('/place-order', [OrderController::class, 'placeOrder'])->name('place.order');

