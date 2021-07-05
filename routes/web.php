<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ProductsController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Cart\CartController;
use App\Http\Controllers\Cart\CheckoutController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\SocialController;
use App\Http\Controllers\BannerContrller;
use App\Http\Controllers\Admin\VourcherController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'Index'])->name('home');
Route::get('/detail/{id}', [\App\Http\Controllers\HomeController::class, 'Detail'])->name('detail.view');
Route::get('/category/{id}', [\App\Http\Controllers\HomeController::class, 'Category'])->name('Category.view');
Route::get('/forget', [CustomerController::class, 'forget'])->name('user.forget');
Route::resource('search', \App\Http\Controllers\SearchController::class);

// social login
Route::get('/auth/redirect/facebook', function () {
    return Socialite::driver('facebook')->redirect();
})->name('auth.facebook');
Route::get('/auth/callback/facebook', [SocialController::class, 'FacebookCallback']);

//
Route::group([
    'middleware' => 'auth',
], function () {
    Route::group([
        'name' => 'admin.',
        'prefix' => 'admin',
        'middleware' => 'Admin'
    ], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
        Route::group(['prefix' => '/category',], function () {
            Route::get('/', [CategoryController::class, 'index'])->name('cate.list');
            Route::get('/create', [CategoryController::class, 'create'])->name('cate.create');
            Route::post('/create', [CategoryController::class, 'store'])->name('cate.store');
            Route::delete('/delete/{id}', [CategoryController::class, 'destroy'])->name('cate.destroy');
            Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('cate.edit');
            Route::put('/{id}', [CategoryController::class, 'update'])->name('cate.update');
        });
        Route::group(['prefix' => '/product',], function () {
            Route::get('/', [ProductsController::class, 'index'])->name('prod.list');
            Route::get('/create', [ProductsController::class, 'create'])->name('prod.create');
            Route::post('/create', [ProductsController::class, 'store'])->name('prod.store');
            Route::delete('/delete/{id}', [ProductsController::class, 'destroy'])->name('prod.destroy');
            Route::get('/{id}/edit', [ProductsController::class, 'edit'])->name('prod.edit');
            Route::put('/{id}', [ProductsController::class, 'update'])->name('prod.update');
            Route::get('/view/{id}', [ProductsController::class, 'show'])->name('prod.view');
        });
        Route::group(['prefix' => '/user'], function () {
            Route::get('/', [UserController::class, 'index'])->name('user.list');
            Route::get('/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
            Route::put('/{id}', [UserController::class, 'update'])->name('user.update');
            Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('user.delete');

        });
        Route::group(['prefix' => '/options'], function () {
            Route::get('/', [\App\Http\Controllers\OptionsController::class, 'index'])->name('options.list');
            Route::put('/{id}', [\App\Http\Controllers\OptionsController::class, 'update'])->name('options.update');
        });
        Route::group(['prefix' => 'filemanager'], function () {
            \UniSharp\LaravelFilemanager\Lfm::routes();

        });
        Route::group(['prefix' => '/orders'], function () {
            Route::get('/', [\App\Http\Controllers\Admin\OrderController::class, 'index'])->name('orders.list');
            Route::get('/view/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'show'])->name('orders.show');
            Route::get('/view/{id}/pdf', [\App\Http\Controllers\Admin\OrderController::class, 'PDF'])->name('orders.pdf');
            Route::get('/{id}/edit', [\App\Http\Controllers\Admin\OrderController::class, 'edit'])->name('orders.edit');
            Route::put('/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'update'])->name('orders.update');
            Route::delete('/delete/{id}', [\App\Http\Controllers\Admin\OrderController::class, 'destroy'])->name('orders.destroy');


        });
        Route::group(['prefix' => '/banner',], function () {
            Route::get('/', [BannerContrller::class, 'index'])->name('banner.list');
            Route::get('/create', [BannerContrller::class, 'create'])->name('banner.create');
            Route::post('/create', [BannerContrller::class, 'store'])->name('banner.store');
            Route::delete('/delete/{id}', [BannerContrller::class, 'destroy'])->name('banner.destroy');
        });
        Route::group(['prefix' => '/voucher',], function () {
            Route::get('/', [VourcherController::class, 'index'])->name('voucher.list');
            Route::get('/create', [VourcherController::class, 'create'])->name('voucher.create');
            Route::post('/create', [VourcherController::class, 'store'])->name('voucher.store');
            Route::delete('/delete/{id}', [VourcherController::class, 'destroy'])->name('voucher.destroy');
        });
    });
    Route::group([
        'name' => 'customer.',
        'prefix' => 'customer',

    ], function () {
        Route::get('/', [CustomerController::class, 'index'])->name('customer');
        Route::get('/profile', [CustomerController::class, 'Profile'])->name('customer.prodfile');
        Route::put('/profile/{id}', [CustomerController::class, 'UpdateProfile'])->name('customer.update');
        Route::post('/change/{id}', [CustomerController::class, 'ChangePass'])->name('custom.password');
        Route::group(['prefix' => 'cart'], function () {
            Route::get('/', [CartController::class, 'view'])->name('cart.view');
            Route::get('/add/{id}', [CartController::class, 'add'])->name('cart.add');
            Route::get('/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');
            Route::post('/update/', [CartController::class, 'update'])->name('cart.update');
            Route::get('/clear', [CartController::class, 'clear'])->name('cart.clear');
        });

        Route::group(['prefix' => 'checkout'], function () {
            Route::get('/', [CheckoutController::class, 'view'])->name('cart.checkout');
            Route::post('/', [CheckoutController::class, 'submit_form'])->name('cart.checkout');
            Route::get('/success/', [CheckoutController::class, 'Success'])->name('cart.success');

        });
        Route::group(['prefix' => 'voucher'], function () {
            Route::post('/', [CheckoutController::class, 'check_voucher'])->name('cart.check_voucher');
        });
        Route::group(['prefix' => 'tracking'], function () {
            Route::get('/', [\App\Http\Controllers\TrackingController::class, 'show'])->name('tracking');
            Route::get('/{id}', [\App\Http\Controllers\TrackingController::class, 'detail'])->name('tracking.detail');
            Route::get('/{id}/pdf', [\App\Http\Controllers\Admin\OrderController::class, 'PDF'])->name('orders.pdf');

        });
        Route::resource('review', \App\Http\Controllers\ReviewController::class);
    });

});

require __DIR__ . '/auth.php';
