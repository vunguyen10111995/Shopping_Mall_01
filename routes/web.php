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
Route::get('/', 'HomeController@index');
Route::get('login', 'HomeController@login');
Route::post('/language', 'LanguageController@changeLanguage');

Route::get('contact', ['as' => 'frontend', 'uses' => 'BlocksController@contact']);
Route::post('contactStore', ['as' => 'contact', 'uses' => 'BlocksController@store']);
Route::get('about', ['as' => 'frontend', 'uses' => 'BlocksController@about']);
Route::post('subcrice', ['as' => 'subcrice', 'uses' => 'BlocksController@subcrice']);
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
//Login /Logout
Route::get('auth/get-login', [
    'as' => 'getLogin',
    'uses' => 'Auth\LoginController@getLogin'
]);
Route::post('auth/post-login', [
    'as' => 'postLogin',
    'uses' => 'Auth\LoginController@postLogin'
]);
Route::get('auth/logout', [
    'as' => 'logout',
    'uses' => 'Auth\LoginController@logout'
]);
//Reset Password
Route::get('auth/reset', [
    'as' => 'Reset',
    'uses' => 'Auth\ForgotPasswordController@getEmail'
]);
//Register
Route::get('auth/register', [
    'as' => 'Register',
    'uses' => 'Auth\RegisterController@getRegiter'
]);
//Login Facebook
Route::get('redirect', 'Auth\LoginController@redirectToProvider');
Route::get('callback', 'Auth\LoginController@handleProviderCallback');
Route::get('/', 'HomeController@index');
// Search product
Route::get('pro-search', 'HomeController@searchpro')->name('search.pro');
//Option  Category
Route::get('option-category/{id}/{cate_name}', ['as' => 'optioncate', 'uses' => 'CategoryController@optionCategory']);
//Detail Product
Route:: get('detail-product/{id}/{cate_name}', ['as' => 'detailproduct', 'uses' => 'ProductController@detailProduct']);
Route::get('listfactory/{id}', ['as' => 'factory', 'uses' => 'ProductController@listfactory']);
// Cart
Route::post('addcart/{id}/{tensanpham}', ['as' => 'muahang', 'uses' => 'BlocksController@addCart']);
Route::get('cart', ['as' => 'cart', 'uses' => 'BlocksController@cart']);
Route::get('delete-cart/{id}', ['as' => 'delete', 'uses' => 'BlocksController@deleteCart']);
Route::get('update-cart/{id}/{qty}', ['as' => 'updateCart', 'uses' => 'BlocksController@updateCart']);
//PaymentShopp
Route::get('payment-shop', ['as' => 'payment-shop', 'uses' => 'BlocksController@paymentShop']);
Route::post('payment-shopping', ['as' => 'payment-shopping', 'uses' => 'BlocksController@paymentShopping']);
// wish list
Route::get('wishlist', ['as' => 'wishlist', 'uses' => 'BlocksController@wishList']);
Route::post('addwish/{id}/{tensanpham}', ['as' => 'addwish', 'uses' => 'BlocksController@addWish']);
Route::get('delete-wish/{id}', ['as' => 'delete', 'uses' => 'BlocksController@deleteWish']);

Route::group(['middleware' => 'admin'], function () {
    Route::get('backend', 'BlocksController@index');
    //user
    Route::get('user-search', 'UserController@search')->name('search.user');
    Route::resource('User', 'UserController');
       //Categoty
    Route::resource('category-list', 'CategoryController');
    Route::get('edit', 'CategoryController@edit');
    Route::get('show', 'CategoryController@show');
    //Color
    Route::resource('color-list', 'ColorController');
    Route::get('edit-color', 'ColorController@edit');
    Route::get('show-color', 'ColorController@show');
    //Size
    Route::resource('size-list', 'SizeController');
    Route::get('edit-size', 'SizeController@edit');
    Route::get('show-size', 'SizeController@show');
    //factory
    Route::resource('factory-list', 'FactoryController');
    Route::get('show-factory', 'FactoryController@show');
    //product
    Route::get('show-factory', 'FactoryController@show');
    Route::get('editfactory', 'FactoryController@edit');
    Route::resource('product-list', 'ProductController');
    Route::get('view-product', 'ProductController@show');
    //Payment
    Route::resource('Payment', 'PaymentController');
});
Route::get('productajax/{id}', ['as'=> 'productajax', 'uses' => 'ProductController@productajax']);
Route::post('/search', ['as' => 'searchproduct', 'uses' => 'ProductController@searchProduct']);
Route::get('comment', ['as'=> 'comment', 'uses' => 'CommentController@postComment']);
Route::get('reply', ['as'=> 'reply', 'uses' => 'CommentController@postReply']);
Route::get('editComment', 'CommentController@updateComment');
Route::get('editReply', 'CommentController@updateReply');
Route::get('comment/{commentId}/delete', [
        'as' => 'comment.delete',
        'uses' => 'CommentController@destroy',
    ]);
Route::get('ajax/{id}', ['as'=> 'ajax', 'uses' => 'ProductController@ajax']);
Route::get('productajax/{id}', ['as'=> 'ajax', 'uses' => 'ProductController@productajax']);
