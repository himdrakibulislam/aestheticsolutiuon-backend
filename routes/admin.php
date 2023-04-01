<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\auth\LoginController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SliderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//auth
Route::controller(LoginController::class)
->prefix('admin')->group(function () {
    Route::get('/login','create');
    Route::post('/login','authenticate')->name('admin.login');
});


//dashboard
Route::middleware(['admin'])->prefix('admin')->group(function(){

    // dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard','index');
        Route::get('/media','media');
        Route::get('/optimize-crear','optimizeClear')->name('optimize.clear');
    });

    // users
    Route::controller(UserController::class)->group(function () {
        Route::get('/users','index');
        Route::get('/user/{id}','view');
        Route::post('/user/status/{id}','updateStatus');
        Route::post('/user/delete/{id}','deleteUser');
        // social 
        Route::get('/social/users','social');
        Route::get('/social/user/{id}','socialView');
        Route::delete('/social/user-delete/{id}','deleteSU');
    });

    //admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard/admins','index');
        Route::post('/dashboard/add-admin','addAdmin');
        Route::get('/dashboard/admin/{id}','view');
        Route::get('/change-password','change');
        Route::post('/dashboard/admin/change-password','changePassword');
        Route::delete('/dashboard/remove-admin/{id}','removeAdmin');
    });

    // slider 
    Route::controller(SliderController::class)->group(function (){
        Route::get('sliders','index');
        
        Route::get('add-slider','add');
        Route::post('store-slider','store');

        Route::get('edit-slider/{id}','edit');
        Route::put('update-slider/{id}','update');

        Route::delete('delete-slider/{id}','desctroy');
    });

    //category 
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index');
        Route::get('add-category', 'addcategory');
        Route::post('category','store');
        Route::get('category/{category}/edit','edit');
        Route::put('category/{category}','update');
        Route::delete('category/delete/{id}','deleteCategory');
    });
    //brands 
    Route::controller(BrandController::class)->group(function () {
        Route::get('brands', 'index');
        Route::post('add-brand','store');
        Route::get('edit-brand/{brand}','edit');
        Route::put('update-brand/{id}','update');
        Route::delete('delete-brand/{id}','deleteBrand');
    });

    // product
    Route::controller(ProductController::class)->group(function(){
        Route::get('products','index');
        Route::get('add-product','add');
        Route::post('products','store');
        Route::get('product/{id}/edit','edit');
        Route::get('product/view/{id}','detail');
        Route::put('product/update/{id}','update');
        Route::delete('product/{id}/delete','destroy');
        Route::get('product-image/{id}/delete','desctroyImage')->name('deleteproduct.image');
     });

     // shop info..... 
     Route::controller(LocationController::class)->group(function () {
        Route::get('location', 'index');
        Route::post('store-shop-info', 'store');
        Route::get('address-edit/{id}', 'edit');
        Route::put('update-shop-info/{id}', 'update');
    
    });

    // order
    Route::controller(OrderController::class)->group(function(){
        Route::get('orders','index');
        Route::get('orders/history','orderHistory');
        Route::get('order/{id}','invoice');
        Route::get('order-details/{id}','orderDetails');
        Route::put('order-status/{id}','updateStatus');
        Route::get('invoice-pdf/{id}','invoicePDF');


        Route::delete('delete-order/{id}','deleteOrder');
    });



    Route::post('/logout',[LoginController::class,'logout'])->name('admin.logout');
});

