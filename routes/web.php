<?php

use Illuminate\Support\Facades\Auth;
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

// auth
Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');
Auth::routes();

// front
Route::namespace('Front')->group(function () {
    Route::name('front.')->group(function () {
        Route::get('/home', 'FrontController@index')->name('index');
        Route::get('/', 'FrontController@index')->name('index');

        // cart
        Route::prefix('keranjang')->group(function () {
            Route::name('cart.')->group(function () {
                Route::get('', 'CartController@index')->name('index');
                Route::get('tambah-keranjang/{id}/{slug}', 'CartController@store')->name('store');
                Route::delete('hapus-keranjang/{id}/{slug}', 'CartController@destroy')->name('destroy');
                Route::get('pesan', 'CartController@order')->name('order');
            });
        });

        // bus
        Route::prefix('bus')->group(function () {
            Route::name('bus.')->group(function () {
                Route::get('', 'BusController@index')->name('index');
                Route::get('detail/{id}/{slug}', 'BusController@show')->name('show');
            });
        });
    });
});


// admin

Route::namespace('Admin')->group(function () {
    Route::name('admin.')->group(function () {
        Route::middleware(['auth', 'admin_role'])->group(function () {
            Route::prefix('admin')->group(function () {
                // dashboard
                Route::get('dashboard', 'DashboardController@index')->name('dashboard');

                // bus
                Route::name('bus.')->group(function () {
                    Route::prefix('bus')->group(function () {
                        Route::get('', 'BusController@index')->name('index');
                        Route::get('tambah-bus', 'BusController@create')->name('create');
                        Route::post('simpan-bus', 'BusController@store')->name('store');
                        Route::get('detail-bus/{id}/{slug}', 'BusController@show')->name('show');
                        Route::get('edit-bus/{id}/{slug}', 'BusController@edit')->name('edit');
                        Route::delete('hapus-bus/{id}/{slug}', 'BusController@destroy')->name('destroy');
                        Route::put('update-bus/{id}/{slug}', 'BusController@update')->name('update');
                        Route::get('sampah', 'BusController@trash')->name('trash');
                        Route::get('sampah/restore/{id}/{slug}', 'BusController@restore')->name('restore');
                        Route::delete('sampah/hapus-permanen/{id}/{slug}', 'BusController@forceDelete')->name('force_delete');
                    });
                });
            });
        });
    });
});
