<?php

use App\Notifications\SeasonCreated;

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


// Notifications
// Route::get('/', function() {

//     $user = App\User::first();

//     $user->notify(new SeasonCreated());

//     return 'Done';
// });

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
Route::get('/seasons/complete_season/{id}', 'SeasonController@complete_season');
Route::get('/seasons', 'SeasonController@update_farmer');


// Orders
Route::get('/orders/my_orders', 'OrderController@orders')->name('my_orders');
Route::get('/orders/confirm_order/{id}', 'OrderController@confirm_order');
Route::get('/orders/cancel_order/{id}', 'OrderController@cancel_order');

// Damage Report
// Route::get('pdf/damage_report/{id}','DamageReportController@generatePDF');

// Plant Report
Route::get('reports/plant_reports/deactivateReport{id}','PlantReportController@deactivateReport');

// Season List
Route::get('/season_lists/complete_season_farmer/{id}', 'SeasonListController@complete_season_farmer');
Route::get('/season_lists/cancel/{id}', 'SeasonListController@cancel');

// Route::get('/season_statuses/complete_season_farmer/{id}', 'SeasonStatusController@complete_season_farmer');
// Route::get('/season_statuses/cancel/{id}', 'SeasonStatusController@cancel');
Route::get('/season_statuses/complete_season/{id}', 'SeasonStatusController@complete_season');


// PDF
Route::get('pdf/damage_report/{id}', 'DamageReportController@pdfview');
Route::get('pdf/invoice/{id}', 'OrderController@pdfview');
Route::get('pdf/season_report/{id}', 'SeasonController@pdfview');
Route::get('pdf/sales_report/{id}', 'SalesReportController@pdfview');
Route::get('pdf/plant_report/{id}', 'PlantReportController@pdfview');

// Weather
Route::get('/weather/weather_statistics', 'LandingPageController@weather_statistics')->name('weather_statistics');

// Order Products
Route::get('/order_products/confirm_order/{id}', 'OrderProductController@confirm_order');
Route::get('/order_products/cancel_order/{id}', 'OrderProductController@cancel_order');
Route::get('/order_products/paid_order/{id}', 'OrderProductController@paid_order');




Route::resource('users', 'UsersController');
Route::resource('roles', 'RolesController');
Route::resource('rice_farmers', 'RiceFarmerController');
Route::resource('customers', 'CustomerController');
Route::resource('products', 'ProductController');
Route::resource('product_lists', 'ProductListController');
Route::resource('seasons', 'SeasonController');
Route::resource('season_lists', 'SeasonListController');
Route::resource('season_statuses', 'SeasonStatusController');
Route::resource('dashboard', 'DashboardController');
Route::resource('orders', 'OrderController');
Route::resource('order_products', 'OrderProductController');
Route::resource('damage_reports', 'DamageReportController');
Route::resource('sales_reports', 'SalesReportController');
Route::resource('plant_reports', 'PlantReportController');




