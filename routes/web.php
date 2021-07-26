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
//    return view('pages.splash');
//});
//
//Route::get('/test', function () {
//    return view('test');
//});

Route::get('/', 'PageController@index');


// Pages Controller (Serve Static Pages)
Route::get('/mission', 'PageController@mission');
Route::get('/history', 'PageController@history');
Route::get('/legal', 'PageController@legal');
Route::get('/contact', 'PageController@contact');
Route::get('/marko', 'PageController@marko');
Route::get('/nathan', 'PageController@nathan');
Route::get('/ian', 'PageController@ian');
Route::get('/sehaj', 'PageController@sehaj');
Route::get('/ehu', 'PageController@ehu');
Route::get('/join', 'PageController@join');



// Product Controller
Route::get('/products/men', 'ProductsController@men');
Route::get('/products/women', 'ProductsController@women');
Route::get('/products/kids', 'ProductsController@kids');
Route::resource('products', 'ProductsController');


// Cart Controller
Route::resource('cart', 'CartController');
Route::get('/cart/create/{id}', 'CartController@createOrder');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
