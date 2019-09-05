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

    Route::prefix('app')->group(function () {
        Route::get('/', 'AdminController@app')->name('admin.app');
        Route::post('update', 'AdminController@updateAppSettings')->name('admin.app.update');
    });

    Route::prefix('groups')->group(function () {
        Route::get('/', 'AdminController@groups')->name('admin.groups');
        Route::post('add', 'AdminController@addGroup')->name('admin.groups.add');
    });

    Route::prefix('items')->group(function () {
        Route::get('/', 'AdminController@items')->name('admin.items');
        Route::get('add', 'AdminController@addItem')->name('admin.items.add');
        Route::post('add', 'AdminController@postAddItem')->name('admin.items.add');
    });

    // Authentication group
    Route::get('users', 'AdminController@users')->name('admin.users');
});

Route::get('/', 'AppController@overview')->name('overview');

Auth::routes(['register' => false]);
Route::get('logout', function () { Auth::logout(); return redirect('/'); })->name('logout');