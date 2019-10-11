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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/denied', 'HomeController@denied')->name('denied');

//ADMIN routes
Route::group([
    'middleware' => ['auth', 'isAdmin'],
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function(){
    Route::resource('/roles', 'RoleController')->except(['destroy']);
    Route::resource('/menus', 'MenuController')->except(['destroy']);
    Route::resource('/users', 'UserController')->only(['index', 'show', 'edit', 'update']);
});

//CUSTOMER routes
Route::group([

], function(){
    Route::resource('/customers', 'CustomerController')->except(['destroy']);
});
