<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductReview;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TaxController;
use App\Http\Controllers\Front\FrontController;
use App\Models\Admin\Customer;
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


    Route::get('admin/brand', [BrandController::class, 'index'])->name('admin.brand');
    Route::get('admin/manage_brand', [BrandController::class, 'manage_brand'])->name('manage_brand');
    Route::get('admin/manage_brand/{id}', [BrandController::class, 'manage_brand'])->name('manage_brand.edit');
    Route::get('admin/brand/delete/{id}', [BrandController::class, 'delete']);
    Route::get('admin/brand/edit/{id}', [BrandController::class, 'edit']);
    Route::get('admin/brand/status/{status}/{id}', [BrandController::class, 'status']);
    Route::post('admin/manage_brand_process', [BrandController::class, 'manage_brand_process'])->name('brand.insert');


    Route::get('admin/tax', [TaxController::class, 'index'])->name('admin.tax');
    Route::get('admin/manage_tax', [TaxController::class, 'manage_tax'])->name('manage_tax');
    Route::get('admin/manage_tax/{id}', [TaxController::class, 'manage_tax'])->name('manage_tax.edit');
    Route::get('admin/tax/delete/{id}', [TaxController::class, 'delete']);
    Route::get('admin/tax/edit/{id}', [TaxController::class, 'edit']);
    Route::get('admin/tax/status/{status}/{id}', [TaxController::class, 'status']);
    Route::post('admin/manage_tax_process', [TaxController::class, 'manage_tax_process'])->name('tax.insert');

    Route::get('admin/banner', [BannerController::class, 'index'])->name('admin.banner');
    Route::get('admin/manage_banner', [BannerController::class, 'manage_banner'])->name('manage_banner');
    Route::get('admin/manage_banner/{id}', [BannerController::class, 'manage_banner'])->name('manage_banner.edit');
    Route::get('admin/banner/delete/{id}', [BannerController::class, 'delete']);
    Route::get('admin/banner/edit/{id}', [BannerController::class, 'edit']);
    Route::get('admin/banner/status/{status}/{id}', [BannerController::class, 'status']);
    Route::post('admin/manage_banner_process', [BannerController::class, 'manage_banner_process'])->name('banner.insert');


    Route::get('admin/product_review', [ProductReview::class, 'index'])->name('admin.product_review');

    Route::get('admin/product_review/delete/{id}', [ProductReview::class, 'delete']);

    Route::get('admin/product_review/status/{status}/{id}', [ProductReview::class, 'status']);



    Route::get('admin/customer', [CustomerController::class, 'index'])->name('admin.customer');
    Route::get('admin/customer/show/{id}', [CustomerController::class, 'show'])->name('customer.show');
    Route::get('admin/customer/status/{status}/{id}', [CustomerController::class, 'status']);
    Route::get('admin/order', [OrderController::class, 'index'])->name('admin.order');
    Route::get('admin/order_details/{id}', [OrderController::class, 'order_details'])->name('admin.order_detail');
    Route::get('admin/update_payment_status/{status}/{id}', [OrderController::class, 'update_payment_status']);
    Route::get('admin/update_order_status/{status}/{id}', [OrderController::class, 'update_order_status']);
    Route::post('admin/order_details/{id}', [OrderController::class, 'update_track_details']);
    Route::get('admin/logout', function () {
        session()->forget('ADMIN_LOGIN');
        session()->forget('ADMIN_ID');
        session()->flash('error', 'Logout Sucessfully');
        return redirect('admin');

    });


});
Route::get('/',[FrontController::class, 'index'] )->name('index');
Route::get('product/{slug}',[FrontController::class, 'product'] );
Route::get('search/{str}',[FrontController::class, 'search'] );
Route::get('registration',[FrontController::class, 'registration'] )->name('registration');
Route::Post('product/add_to_cart',[FrontController::class, 'add_to_cart'] )->name('add_to_cart');
Route::Post('user/registration_process',[FrontController::class, 'registration_process'])->name('user.registration');
Route::get('/cart',[FrontController::class, 'cart'] )->name('cart');
Route::get('/category/{slug}',[FrontController::class, 'category'] )->name('category');
Route::Post('user/login_process',[FrontController::class, 'login_process'])->name('user.login');

Route::get('/logout', function () {
    session()->forget('USER_LOGIN');
    session()->forget('USER_ID');
    session()->forget('USER_NAME');

    return redirect('/');

})->name('user.logout');
Route::Post('user/login_process',[FrontController::class, 'login_process'])->name('user.login');
Route::get('/verification/{id}',[FrontController::class, 'email_verification'] );
Route::Post('/forgot_password_change_process',[FrontController::class, 'forgot_password_change_process'])->name('user.orgot_password_change_process');
Route::Post('/forgot_password',[FrontController::class, 'forgot_password'])->name('user.forgot_password');
Route::get('/forget_password_change/{id}',[FrontController::class, 'forgot_password_change'] );
Route::get('/checkout',[FrontController::class, 'checkout'] )->name('checkout');
Route::Post('/apply_coupon_code',[FrontController::class, 'apply_coupon_code'])->name('user.apply_coupon_code');
Route::Post('/user/remove_coupon_code',[FrontController::class, 'remove_coupon_code'])->name('user.remove_coupon_code');
Route::Post('/place_order',[FrontController::class, 'place_order'])->name('user.place_order');
Route::get('/order_placed',[FrontController::class, 'order_placed'] );
//payment success and fail Route

Route::post('/success',[FrontController::class, 'success'])->name('success');

Route::post('/fail',[FrontController::class, 'fail'])->name('fail');

Route::get('/cancel',[FrontController::class, 'cancel'])->name('cancel');

Route::post('/product_review_process',[FrontController::class, 'product_review_process']);
Route::group(['middleware' => 'user_auth'], function () {
Route::get('/my_order',[FrontController::class, 'my_order']);
Route::get('/order_detail/{id}',[FrontController::class, 'my_order_detail']);

});
