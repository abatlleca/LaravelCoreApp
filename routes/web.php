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

//ALL routes
Route::group([
    'middleware' => ['auth', 'generate_menus'],
], function(){
Route::get('/', 'HomeController@index')->name('home');
Route::get('/contact', 'HomeController@contact')->name('contact');
Route::get('/denied', 'HomeController@denied')->name('denied');
Route::get('/profile', 'ProfileController@show')->name('profile.show');
Route::get('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::put('/profile/edit', 'ProfileController@update')->name('profile.update');
});

//ADMIN routes
Route::group([
    'middleware' => ['auth', 'isAdmin', 'role:admin-panel', 'generate_menus'],
    'prefix' => 'admin',
    'namespace' => 'Admin',
], function(){
    Route::resource('/roles', 'RoleController')->except(['destroy']);
    Route::resource('/permissions', 'PermissionController')->except(['destroy']);
    Route::resource('/menus', 'MenuController')->except(['destroy']);
    Route::get('/menus/create/{parent?}', 'MenuController@create')->name('menus.create');
    Route::resource('/users', 'UserController')->only(['index', 'show', 'edit', 'update']);
    Route::resource('/customers', 'CustomerController')->except(['destroy']);
    Route::resource('/tickets', 'TicketController', ['as' => 'ad'])->except(['destroy']);
    Route::get('/tickets/create/{customer_id?}', 'TicketController@create')->name('ad.tickets.create');
    Route::resource('/actuations', 'ActuationController', ['as' => 'ad'])->except(['index', 'create', 'destroy']);
    Route::get('/actuations/create/{ticket_id}', 'ActuationController@create')->name('ad.actuations.create');
});

//CUSTOMER routes
Route::group([
    'middleware' => ['auth', 'role:customer-panel', 'generate_menus'],
    'namespace' => 'Customer',
], function(){
    Route::resource('/tickets', 'TicketController', ['as' => 'cu'])->except(['destroy']);
    Route::resource('/actuations', 'ActuationController', ['as' => 'cu'])->except(['index', 'create', 'destroy']);
    Route::get('/actuations/create/{ticket_id}', 'ActuationController@create', ['as' => 'cu'])->name('actuations.create');
});
