<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\userController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\OrderController;

// ----------Frontend----------
Route::get('/', [PagesController::class, 'index']);
// Route::get('/trangchu', [PagesController::class, 'index']);
Route::post('/tim-kiem',[PagesController::class, 'search']);

Route::get('/login-page',[userController::class, 'index']);
Route::get('/sign-up-page',[userController::class, 'sign_up_index']);
Route::post('/user-login',[userController::class, 'login']);
Route::post('/user-sign-up',[userController::class, 'sign_up']);
Route::get('/user-logout',[userController::class, 'logout']);

Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);


// ----------Backend----------
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_admin_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);
Route::resource('/users', UsersController::class);

Route::get('/ordered', [OrderController::class, 'ordered']);
Route::get('/un-order', [OrderController::class, 'un_order']);

//Category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/edit-category-product/{category_product_id}', [CategoryProduct::class, 'edit_category_product']);
Route::get('/delete-category-product/{category_product_id}', [CategoryProduct::class, 'delete_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);

Route::get('/unactive-category-product/{category_product_id}', [CategoryProduct::class, 'unactive_category_product']);
Route::get('/active-category-product/{category_product_id}', [CategoryProduct::class, 'active_category_product']);

Route::post('/save-category-product', [CategoryProduct::class, 'save_category_product']);
Route::post('/update-category-product/{category_product_id}', [CategoryProduct::class, 'update_category_product']);



// Product
Route::get('/add-product', [ProductController::class, 'add_product']);
Route::get('/edit-product/{product_id}', [ProductController::class, 'edit_product']);
Route::get('/delete-product/{product_id}', [ProductController::class, 'delete_product']);
Route::get('/all-product', [ProductController::class, 'all_product']);
Route::get('/unactive-product/{product_id}', [ProductController::class, 'unactive_product']);
Route::get('/active-product/{product_id}', [ProductController::class, 'active_product']);

Route::post('/save-product', [ProductController::class, 'save_product']);
Route::post('/update-product/{product_id}', [ProductController::class, 'update_product']);

Route::get('/danh-muc-san-pham/{category_id}', [CategoryProduct::class, 'show_category_home']);
Route::get('/chi-tiet-san-pham/{product_id}', [ProductController::class, 'details_product']);
//Cart 
Route::post('/save-cart', 'App\Http\Controllers\CartController@save_cart');
Route::get('/delete-to-cart/{rowId}', 'App\Http\Controllers\CartController@delete_to_cart');
Route::get('/show_cart', 'App\Http\Controllers\CartController@show_cart');
Route::post('/update-cart-qty', 'App\Http\Controllers\CartController@update_cart');

Route::post('/update-cart-size', 'App\Http\Controllers\CartController@update_cart_size');
//Checkout
Route::get('/login-checkout','App\Http\Controllers\CheckoutController@login_checkout');
Route::post('/checkout-info','App\Http\Controllers\CheckoutController@get_cusinfo');


Route::get('/login-checkout', 'App\Http\Controllers\CheckoutController@login_checkout');
Route::post('/checkout-info','App\Http\Controllers\CheckoutController@get_cusinfo');

