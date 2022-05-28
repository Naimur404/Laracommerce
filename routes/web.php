<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SizeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('admin', [AdminController::class, 'index']);
Route::post('admin/auth', [AdminController::class, 'auth'])->name('admin.auth');

Route::group(['middleware' => 'admin_auth'], function () {
    Route::get('admin/dashboard', [AdminController::class, 'dashboard'])->name('admin.dashboard');
    Route::get('admin/category', [CategoryController::class, 'index'])->name('admin.category');
    Route::get('admin/manage_category', [CategoryController::class, 'manage_category'])->name('manage_category');
    Route::get('admin/manage_category/{id}', [CategoryController::class, 'manage_category'])->name('manage_category.edit');
    Route::get('admin/category/delete/{id}', [CategoryController::class, 'delete']);
    Route::get('admin/category/status/{status}/{id}', [CategoryController::class, 'status']);
    Route::get('admin/category/edit/{id}', [CategoryController::class, 'edit']);
    Route::post('admin/manage_category_process', [CategoryController::class, 'manage_category_process'])->name('category.insert');


    Route::get('admin/coupon', [CouponController::class, 'index'])->name('admin.coupon');
    Route::get('admin/manage_coupon', [CouponController::class, 'manage_coupon'])->name('manage_coupon');
    Route::get('admin/manage_coupon/{id}', [CouponController::class, 'manage_coupon'])->name('manage_coupon.edit');
    Route::get('admin/coupon/delete/{id}', [CouponController::class, 'delete']);
    Route::get('admin/coupon/edit/{id}', [CouponController::class, 'edit']);
    Route::get('admin/coupon/status/{status}/{id}', [CouponController::class, 'status']);
    Route::post('admin/manage_coupon_process', [CouponController::class, 'manage_coupon_process'])->name('coupon.insert');

    Route::get('admin/size', [SizeController::class, 'index'])->name('admin.size');
    Route::get('admin/manage_size', [SizeController::class, 'manage_size'])->name('manage_size');
    Route::get('admin/manage_size/{id}', [SizeController::class, 'manage_size'])->name('manage_size.edit');
    Route::get('admin/size/delete/{id}', [SizeController::class, 'delete']);

    Route::get('admin/size/status/{status}/{id}', [SizeController::class, 'status']);
    Route::post('admin/manage_size_process', [SizeController::class, 'manage_size_process'])->name('size.insert');

    Route::get('admin/color', [ColorController::class, 'index'])->name('admin.color');
    Route::get('admin/manage_color', [ColorController::class, 'manage_color'])->name('manage_color');
    Route::get('admin/manage_color/{id}', [ColorController::class, 'manage_color'])->name('manage_color.edit');
    Route::get('admin/color/delete/{id}', [ColorController::class, 'delete']);
    Route::get('admin/color/edit/{id}', [ColorController::class, 'edit']);
    Route::get('admin/color/status/{status}/{id}', [ColorController::class, 'status']);
    Route::post('admin/manage_color_process', [ColorController::class, 'manage_color_process'])->name('color.insert');

    Route::get('admin/product', [ProductController::class, 'index'])->name('admin.product');
    Route::get('admin/manage_product', [ProductController::class, 'manage_product'])->name('manage_product');
    Route::get('admin/manage_product/{id}', [ProductController::class, 'manage_product'])->name('manage_product.edit');
    Route::get('admin/product/delete/{id}', [ProductController::class, 'delete']);
    Route::get('admin/product/product_arrt_delete/{paid}/{pid}', [ProductController::class, 'product_arrt_delete'])->name('product_arrt_delete');
    Route::get('admin/product/product_image_delete/{piid}/{pid}', [ProductController::class, 'product_image_delete']);

    Route::get('admin/product/status/{status}/{id}', [ProductController::class, 'status']);
    Route::post('admin/manage_product_process', [ProductController::class, 'manage_product_process'])->name('product.insert');


    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Sucessfully');
        return redirect('admin');

    });
});
