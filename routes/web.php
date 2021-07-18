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
Route::get('/mission', 'PageController@mission');
Route::get('/legal', 'PageController@legal');


Route::get('/products/men', 'ProductsController@men');
Route::get('/products/women', 'ProductsController@women');
Route::get('/products/kids', 'ProductsController@kids');
Route::resource('products', 'ProductsController');

