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

// Route::get('admin/routes', 'HomeController@admin')->middleware('admin');

// Route::group(['middleware' => 'auth'], function () {
//     Route::get('/', function () {
//         return view('welcome');
//    });
// });

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Dashboard
Route::get('/dashboard', function() {
    return view('dashboard');
});

// Cart 
Route::get('/cart', function () {
    return view('cart');
});

//Products
Route::get('/products', 'ProductController@products');

//Product Lists
Route::get('/product_lists/show_products', 'ProductListController@display_products');

// Season
Route::get('/seasons/add_farmer/{id}', 'SeasonController@add_farmer');



Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');
Route::resource('rice_farmers', 'RiceFarmerController');
Route::resource('customers', 'CustomerController');
Route::resource('products', 'ProductController');
Route::resource('product_lists', 'ProductListController');
Route::resource('seasons', 'SeasonController');


