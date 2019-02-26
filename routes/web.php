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
// Route::get('/dashboard', function() {
//     return view('dashboard');
// });


// Cart 
// Route::get('/cart', function () {
//     return view('cart');
// });
Route::get('/cart','CartController@index')->name('cart.index');
// Route::post('/cart','CartController@store')->name('cart.index');
Route::post('/cart', 'CartController@store')->name('cart.index');
Route::patch('/cart/{product}','CartController@update')->name('cart.update');
// Route::patch('/cart/{product}', 'CartController@update')->name('cart.update');
Route::delete('/cart/{product}', 'CartController@destroy')->name('cart.destroy');
// Route::delete('/cart/emptycart', 'CartController@emptycart')->name('cart.emptycart');
// Route::get('/cart/emptycart',function(){
//     Cart:destroy();
// });

//Checkout
Route::get('/checkout', 'CheckoutController@index')->name('checkout.index')->middleware('auth');
Route::post('/checkout', 'CheckoutController@store')->name('checkout.store');


//Products
Route::get('/products', 'ProductController@products');

//Product Lists
Route::get('/product_lists/show_products', 'ProductListController@display_products');

// Season
Route::get('/seasons/add_farmer/{id}', 'SeasonController@add_farmer');
Route::get('/seasons/farmer_seasons', 'SeasonController@farmer_seasons');



Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');
Route::resource('rice_farmers', 'RiceFarmerController');
Route::resource('customers', 'CustomerController');
Route::resource('products', 'ProductController');
Route::resource('product_lists', 'ProductListController');
Route::resource('seasons', 'SeasonController');
Route::resource('dashboard', 'DashboardController');



