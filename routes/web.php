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

// Route::get('/', function () {
//     return view('home');
// });

Auth::routes();

Route::get('/', 'LandingPageController@index')->name('landing-page');

// Route::get('/home', 'HomeController@index')->name('home');

// Dashboard
// Route::get('/dashboard', function() {
//     return view('dashboard');
// });


// Cart 
// Route::get('/cart', function () {
//     return view('cart');
// });
Route::get('/cart','CartController@index')->name('cart.index');
Route::post('/cart','CartController@store')->name('cart.index');
// Route::post('/cart/{product}', 'CartController@store')->name('cart.store');
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

//Confirmation 
Route::get('/thankyou', 'ConfirmationController@index')->name('confirmation.index');

//Products
Route::get('/products', 'ProductController@products');

//Product Lists
Route::get('/product_lists/show_products', 'ProductListController@display_products')->name('show_products');
Route::get('/product_lists/view_product/{id}', 'ProductListController@view_product')->name('view_product');

// Season
// Route::get('/seasons/add_farmer/{id}', 'SeasonController@add_farmer');
// Route::get('/seasons/farmer_seasons', 'SeasonController@farmer_seasons');

// Orders
Route::get('/orders/my_orders', 'OrderController@orders')->name('my_orders');
Route::get('/orders/confirm_order/{id}', 'OrderController@confirm_order');
Route::get('/orders/cancel_order/{id}', 'OrderController@cancel_order');

// Damage Report
// Route::get('pdf/damage_report/{id}','DamageReportController@generatePDF');


// PDF
Route::get('pdf/damage_report/{id}', 'DamageReportController@pdfview');
Route::get('pdf/invoice/{id}', 'OrderController@pdfview');

// Weather
Route::get('/weather/weather_statistics', 'LandingPageController@weather_statistics')->name('weather_statistics');

// Notifications
// Route::get('/', function() {
//     $user = App\User::first();

//     $user->notify(new NewOrder);

//     return view('/')->with('success','User Notified');
// });


Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');
Route::resource('rice_farmers', 'RiceFarmerController');
Route::resource('customers', 'CustomerController');
Route::resource('products', 'ProductController');
Route::resource('product_lists', 'ProductListController');
Route::resource('seasons', 'SeasonController');
Route::resource('dashboard', 'DashboardController');
Route::resource('orders', 'OrderController');
Route::resource('damage_reports', 'DamageReportController');



