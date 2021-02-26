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

Route::get('/', 'user\IndexController@index')->name('index');

Auth::routes();

Route::get('/admin', 'HomeController@index')->name('home');

// -------------------------------------------Category Manage------------------------------------------
Route::resource('category', 'category\CategoryController');
Route::get('all/category','category\CategoryController@all_category')->name('all.category');


// -------------------------------------------Product Controller-----------------------------------------
// admin
Route::resource('product', 'product\ProductController');
Route::get('all/product','product\ProductController@all_product')->name('all.product');

// user
Route::get('all-product-view','user\product\ProductController@view_product')->name('all-product');
Route::get('/home/category-wise-product/{id}', 'user\product\ProductController@category_wise_product')->name('categroy_product');
Route::get('/product/view-more/{id}', 'user\product\ProductController@view_about_product')->name('view.more');


// -------------------------------------------Pagenation------------------------------------------------
Route::post('/load-more-data', 'user\paginationController@index')->name('load-more-data');



// -------------------------------------------Cart Controller-------------------------------------------
Route::post('/home/add-to-cart/{id}', 'user\CartController@add_to_cart')->name('add-to-cart');
Route::get('/home/show-cart', 'user\CartController@show_cart')->name('show-cart');
Route::get('/order/empty-cart', 'user\CartController@empty_cart')->name('empty-cart');
Route::get('/cart/show-cart/{id}', 'user\CartController@remove_item')->name('item.remove');

// -------------------------------------------Order Controller -----------------------------------------
Route::get('/order/order-now', 'user\order\OrderController@order_now')->name('order-now');


//------------------------------Customer Controller---------------------//
Route::post('/buyer/buyer-info', 'user\customer\CustomerController@buyer_info')->name('buyer-info');


//------------------------------Customer Controller---------------------//
Route::resource('manage-order', 'admin\ManageCustomerController');
Route::get('all/customer','admin\ManageCustomerController@all_customer')->name('all.customer');

// customerOrder
Route::get('manage-order-list/{id}', 'admin\customer\CustomerController@view_customer_order_list')->name('manage-order-list');
Route::get('/order/order-done/{id}', 'admin\customer\CustomerController@order_done')->name('order-done');
Route::get('/order/delete-customer/{id}', 'admin\customer\CustomerController@delete_customer')->name('delete-customer');







