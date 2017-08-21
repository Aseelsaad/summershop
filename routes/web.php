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

    //Home page
    Route::get('/', 'FrontController@index')
        ->name('home');

    //Contact Us page
    Route::get('/contact-us', 'FrontController@contact')
    ->name('contact');


//All available outfits
    Route::get('/shirts', 'FrontController@shirts')
        ->name('shirts');

    //Chosen outfit
    Route::get('/shirt', 'FrontController@shirt')
        ->name('shirt');

    Auth::routes();
    Route::get('/logout', 'Auth\LoginController@logout');

    Route::get('/home', 'HomeController@index');

    //Managing Cart
    Route::resource('/cart', 'CartController');

    //Adding outfit to cart
    Route::get('/cart/add-item/{id}', 'CartController@addItem')
    ->name('cart.addItem');

    Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {
    //Change Order type Pending<=>Delivered
    Route::post('toggledeliver/{orderId}', 'OrderController@toggledeliver')
        ->name('toggle.deliver');

    //Admin dashboard
    Route::get('/', function () {
        return view('admin.index');
    })->name('admin.index');

    //Manage Products
    Route::resource('product','ProductsController');

    //Manage Categories
    Route::resource('category','CategoriesController');

    //Manage Orders
    Route::get('orders/{type?}', 'OrderController@Orders');

    }); //Group End

    //Manage Addresses
    Route::resource('address','AddressController');

    //Take shipping info after placing order
    Route::group(['middleware' => 'auth'], function () {
    Route::get('shipping-info','CheckoutController@shipping')
        ->name('checkout.shipping');
    });

    //Create Order
    Route::get('createOrder','CheckoutController@storePayment')
        ->name('check.order');


