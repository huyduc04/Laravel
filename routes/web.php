<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\CategoryController;

use App\Http\Controllers\Users\ViewController;


//use App\Http\Controllers\Admin\AdminLoginController;
//use App\Http\Controllers\admin\ChangePasswordController;

use App\Http\Controllers\AuthController;


Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postLogin'])->name('postLogin');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/register', [AuthController::class, 'postRegister'])->name('postRegister');

Route::get('shop', [UserController::class, 'shop'])->name('users.shop');
Route::get('/home', [HomeController::class, 'home'])->name('users.home');

Route::get('/', function () {
    return view('users.home');
//    echo 'Trang Chủ';
});


//category//
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::group(['prefix' => 'category', 'as' => 'category.'], function() {
        Route::get('listCategory', [CategoryController::class, 'listCategory'])->name('listCategory');
        Route::get('create', [CategoryController::class, 'create'])->name('create');
        Route::post('store', [CategoryController::class, 'store'])->name('store');
        Route::delete('category/{category_id}', [CategoryController::class, 'delete'])->name('delete');
        Route::get('edit/{category_id}', [CategoryController::class, 'edit'])->name('edit');
        Route::put('update/{category_id}', [CategoryController::class, 'update'])->name('update');


        Route::get('category', [CategoryController::class, 'listCategory'])->name('category.listCategory');
        Route::resource('category', CategoryController::class)->except(['index']);
    });
});


//
//Route::get('/admin/products/{id}', [ProductController::class, 'show'])->name('admin.products.show');Route::get('/products/{id}', [ProductController::class, 'showUserProduct'])->name('user.products.show');




//products//
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::group(['prefix' => 'products', 'as' => 'products.'], function() {
        Route::get('listProduct', [ProductController::class, 'listProduct'])->name('listProduct');
        Route::get('create', [ProductController::class, 'create'])->name('create');
        Route::post('store', [ProductController::class, 'store'])->name('store');
        Route::delete('products/{product_id}', [ProductController::class, 'delete'])->name('delete');
        Route::get('edit/{product_id}', [ProductController::class, 'edit'])->name('edit');
        Route::put('update/{product_id}', [ProductController::class, 'update'])->name('update');


        Route::get('view/products/{id}', [ViewController::class, 'detail'])->name('detail');
    });

});

