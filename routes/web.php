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
//Middleware
Route::view('admin/login', 'admin.pages.login')->name('viewAdmin.login');
Route::post('admin/login','UserController@adminLogin')->name('admin.login');

//Admin
Route::group(['prefix' => 'admin', 'middleware' => 'admin.middleware'], function () {
    Route::view('/', 'admin.pages.index');
    Route::resource('category', 'CategoriesController');
    Route::resource('producttype', 'ProductTypeController');
    Route::resource('product', 'ProductsController');
    //Update Product by Ajax (vì nó ko cho gửi ảnh nên phải viết riêng)
    Route::post('updateProduct/{id}','ProductsController@update');

    //Xem các đơn hàng của khách
    Route::resource('order','OrderController');

    //Tính năng Search
    // Route::post('search', 'SearchController@search')->name('admin.search');
});

//Lấy loại sản phẩm theo Category
Route::get('getProductType', 'AjaxController@getProductType');

/** CLIENT */

//Đăng nhập bằng Facebook
Route::get('callback/{social}', 'UserController@handleProviderCallback');
Route::get('login/{social}', 'UserController@redirectProvider')->name('login.social');

//Tạo tài khoản
Route::post('register', 'UserController@register')->name('register');
Route::get('logout', 'UserController@logout')->name('logout');
Route::post('login', 'UserController@login')->name('login');

//Trang Chu
Route::get('/', 'HomeController@index')->name('home');
Route::get('about','HomeController@about')->name('about');
Route::get('contact','HomeController@contact')->name('contact');
Route::get('producttype/{id}','HomeController@producttype')->name('producttype');
Route::get('product/{id}','HomeController@product')->name('product');


//Cart
Route::resource('cart', 'CartController');
Route::get('addtocart/{id}', 'CartController@addProduct')->name('addToCart');
Route::get('payment', 'CartController@payment')->name('payment');
Route::resource('customer', 'CustomerController');
