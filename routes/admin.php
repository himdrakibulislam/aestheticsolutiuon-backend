<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\auth\LoginController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LocationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\TeamController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//auth
Route::controller(LoginController::class)
    ->prefix('admin')->group(function () {
        Route::get('/login', 'create');
        Route::post('/login', 'authenticate')->name('admin.login');
    });


//dashboard
Route::middleware(['admin'])->prefix('admin')->group(function () {

    // dashboard
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/dashboard', 'index');
        Route::get('/media', 'media');
        Route::get('/optimize-crear', 'optimizeClear')->name('optimize.clear');
    });

    // users

    //admin
    Route::controller(AdminController::class)->group(function () {
        Route::get('/dashboard/admins', 'index');
        Route::post('/dashboard/add-admin', 'addAdmin');
        Route::get('/dashboard/admin/{id}', 'view');
        Route::get('/change-password', 'change');
        Route::post('/dashboard/admin/change-password', 'changePassword');
        Route::delete('/dashboard/remove-admin/{id}', 'removeAdmin');
    });

    // slider 
    Route::controller(SliderController::class)->group(function () {
        Route::get('sliders', 'index');

        Route::get('add-slider', 'add');
        Route::post('store-slider', 'store');

        Route::get('edit-slider/{id}', 'edit');
        Route::put('update-slider/{id}', 'update');

        Route::delete('delete-slider/{id}', 'desctroy');
    });

    //category 
    Route::controller(CategoryController::class)->group(function () {
        Route::get('categories', 'index');
        Route::get('add-category', 'addcategory');
        Route::post('category', 'store');
        Route::get('category/{category}/edit', 'edit');
        Route::put('category/{category}', 'update');
        Route::delete('category/delete/{id}', 'deleteCategory');
    });

    // product
    Route::controller(ProjectController::class)->group(function () {
        Route::get('projects', 'index');
        Route::get('add-project', 'add');
        Route::post('project', 'store');
        Route::get('project/{id}/edit', 'edit');
        Route::get('project/view/{id}', 'detail');
        Route::put('project/update/{id}', 'update');
        Route::delete('project/{id}/delete', 'destroy');
        Route::get('project-image/{id}/delete', 'desctroyImage')->name('deleteproject.image');
    });
    // team
    Route::controller(TeamController::class)->group(function () {
        Route::get('team', 'getTeam');
        Route::get('create-team-member', 'create');
        Route::post('create-team', 'store');
        Route::get('team/{id}/edit', 'edit');
        Route::get('team/view/{id}', 'detail');
        Route::put('team/update/{id}', 'update');
        Route::delete('team/{id}/delete', 'removeMember');
        
    });
     // blog
     Route::controller(BlogController::class)->group(function () {
        Route::get('/blogs', 'index');
        Route::get('/create-post', 'create');
        Route::post('/store-post', 'store')->name('store.post');
        Route::get('/post/{id}/edit', 'edit');
        Route::put('/post/update/{id}', 'update');
        Route::get('/post/{id}', 'watchBlog');

        Route::delete('/post/delete/{id}', 'deletePost');
    });
    // clients
     Route::controller(ContractController::class)->group(function () {
        Route::get('/clients', 'index');
    
        Route::get('/client/{id}', 'contract');

        Route::delete('/client/delete/{id}', 'delete_client');
    });



    // shop info..... 
    Route::controller(LocationController::class)->group(function () {
        Route::get('location', 'index');
        Route::post('store-shop-info', 'store');
        Route::get('address-edit/{id}', 'edit');
        Route::put('update-shop-info/{id}', 'update');
    });

    Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout');
});
