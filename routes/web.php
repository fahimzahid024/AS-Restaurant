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

Route::get('/', 'user\IndexController@index');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

// -------------------------------------------Category Manage------------------------------------------
Route::resource('category', 'category\CategoryController');
Route::get('all/category','category\CategoryController@all_category')->name('all.category');


// -------------------------------------------Product Controller-----------------------------------------
Route::resource('product', 'product\ProductController');
Route::get('all/product','product\ProductController@all_product')->name('all.product');


// -------------------------------------------Pagenation------------------------------------------------
Route::post('/load-more-data', 'user\paginationController@index')->name('load-more-data');




