<?php


use App\Http\Controllers\Api\AddressController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\FrontController;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Database\Query\JoinClause;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//auth
Route::post('/social',[AuthController::class,'social']);

Route::middleware(['auth:sanctum','verified'])->group(function(){
    //  user
     Route::controller(AuthController::class)->group(function () {
        Route::get('/user', 'user');
        Route::post('/change-profile', 'profileUpload');
        Route::post('/update-password', 'updatePassword');
        Route::post('/verify-otp', 'verifyOTP');
        Route::post('/resend-otp', 'resendOTP');
        Route::post('/logout', 'logout');
    });
    // address
    Route::controller(AddressController::class)->group(function () {
        // all division with district
        Route::get('all-division','allDivision');

        Route::post('/create-address', 'addAddress');
        Route::put('/update-address/{id}', 'updateAddress');
        Route::put('/address/default/{id}', 'setDefaultAddress');
        Route::delete('/address/delete/{id}', 'deleteAddress');
    });
    // checkout
    Route::controller(CheckoutController::class)->group(function () {
        Route::post('checkout','checkout');
    });
    
});
// accessable to all 
Route::controller(FrontController::class)->group(function(){
    Route::get('sliders','sliders');
    Route::get('all-products','allProducts');
    Route::get('products','products');
    Route::get('categories','categories');
    Route::get('shop-information','shopInformation');
});





