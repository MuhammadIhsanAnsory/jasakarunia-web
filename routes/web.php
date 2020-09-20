<?php

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
    return view('welcome');
});

Route::get('logout', 'Auth\LoginController@logout')->name('logout.get');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

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
