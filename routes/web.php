<?php

use App\Http\Controllers\Pagescontroller;

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
Route::get('/','Pagescontroller@index');
Route::get('/about','Pagescontroller@about')->name('about');
Route::get('/contact','Pagescontroller@contact')->name('contact');
Route::get('/account','Accountcontroller@index')->name('account');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/manager', 'ManagerController@dashboard')->name('manager');

Route::prefix('manager')->middleware('isadmin')->group(function () {
    Route::resource('users', 'UserController', ['only' => [
        'index', 'edit', 'update', 'destroy'
    ]]);
});

Route::prefix('manager')->middleware('isadmin')->group(function(){
    Route::resource('categories','Categoriescontroller');
});

Route::prefix('manager')->middleware('isadmin')->group(function(){
    Route::resource('files','Filescontroller');
});
Route::get('/manager/catlist', 'Categoriescontroller@catlist')->name('catlist');

