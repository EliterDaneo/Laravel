<?php

use App\Http\Controllers\LayoutController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('home', [
        'title' => 'Project LKS'
    ]);
});

Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login');
    Route::post('login/proses', 'proses');
    Route::post('login/register_proses', 'register_proses');
    Route::get('register', 'register');
    Route::get('logout', 'logout');
});

Route::get('/home', [LayoutController::class, 'index'])->middleware('auth');

Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['CekUserLogin:1']], function () {
        Route::controller(ProductController::class)->group(function () {
            Route::get('produk', 'index')->name('produk');
            Route::get('/create', 'create');
            Route::post('produk/store', 'store')->name('store');
            Route::get('show/{pRo}', 'show')->name('show');
        });
        Route::controller(UserController::class)->group(function () {
            Route::get('user', 'index')->name('user');
            Route::get('/create', 'create');
            Route::post('produk/store', 'store')->name('store');
            Route::get('show/{pRo}', 'show')->name('show');
        });
    });
});
