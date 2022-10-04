<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryProduct;
use App\Http\Controllers\FoodsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\PagesController;
use App\Http\Controllers\userController;
use App\Http\Controllers\UsersController;

// Fronend
Route::get('/', [PagesController::class, 'index']);
// Route::get('/trangchu', [PagesController::class, 'index']);
Route::get('/login-page',[userController::class, 'index']);
Route::get('/sign-up-page',[userController::class, 'sign_up_index']);
Route::post('/user-login',[userController::class, 'login']);
Route::post('/user-sign-up',[userController::class, 'sign_up']);
Route::get('/user-logout',[userController::class, 'logout']);


// Backend
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/dashboard', [AdminController::class, 'show_admin_dashboard']);
Route::get('/logout', [AdminController::class, 'logout']);
Route::post('/admin-dashboard', [AdminController::class, 'dashboard']);

//Category Product
Route::get('/add-category-product', [CategoryProduct::class, 'add_category_product']);
Route::get('/all-category-product', [CategoryProduct::class, 'all_category_product']);


Route::resource('/foods', FoodsController::class);
Route::resource('/users', UsersController::class);
