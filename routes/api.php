<?php

use App\Http\Controllers\Admin\ContractController;
use App\Http\Controllers\Api\FrontController;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

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

Route::controller(FrontController::class)->group(function () {
    // project
    Route::get('/projects', 'get_projects');
    Route::get('/project/{slug}', 'find_project');
    // team 
    Route::get('/team', 'get_team');
    Route::get('/team/{id}', 'find_team');
    // blog 
    Route::get('/blog', 'get_blog');
    Route::get('/blog/{slug}', 'find_blog');
    // categories 
    Route::get('/categories', 'categories');
    Route::get('/category/{id}', 'category_by_id');
    
    // materials 
    Route::get('/materials', 'materials');
    // application 
    Route::get('application','application');
});
Route::controller(ContractController::class)->group(function () {
    Route::post('/send-contract', 'create');
});
