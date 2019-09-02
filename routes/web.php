<?php

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

// Administrator routes
Route::prefix('admin')->group(function () {
    // Administration group
    Route::get('/', 'AdminController@overview')->name('admin.overview');
    // Configuration group
    Route::get('app', 'AdminController@overview')->name('admin.app_settings');
    Route::get('groups', 'AdminController@overview')->name('admin.groups');
    Route::get('items', 'AdminController@overview')->name('admin.items');
    // Authentication group
    Route::get('users', 'AdminController@users')->name('admin.users');
});

Route::get('/', 'AppController@overview')->name('overview');

Auth::routes(['register' => false]);
Route::get('logout', function () { Auth::logout(); return redirect('/'); })->name('logout');