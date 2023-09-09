<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

// frontend
route::get('/', [App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('/collections', [App\Http\Controllers\Frontend\FrontendController::class, 'categories']);
Route::get('/collections/{category_slug}', [App\Http\Controllers\Frontend\FrontendController::class, 'products']);
// end frontend

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    // category
    // read
    Route::get('/category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    // create
    Route::get('/category/create', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('/category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    // edit
    Route::get('/category/{category}/edit', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('/category/{category}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    // end category

    // product
    Route::get('/products', [App\Http\Controllers\Admin\ProductController::class, 'index']);
    Route::get('/products/create', [App\Http\Controllers\Admin\ProductController::class, 'create']);
    Route::post('/products', [App\Http\Controllers\Admin\ProductController::class, 'store']);

    Route::get('/products/{product_id}/edit', [App\Http\Controllers\Admin\ProductController::class, 'edit']);
    Route::put('/products/{product_id}', [App\Http\Controllers\Admin\ProductController::class, 'update']);

    Route::get('/productImage/{product_image_id}/delete', [App\Http\Controllers\Admin\ProductController::class, 'destroyImage']);
    Route::get('/products/{product_id}/delete', [App\Http\Controllers\Admin\ProductController::class, 'destroy']);
    // end Product

    
    // brand
    Route::get('/brands', App\Http\Livewire\Admin\Brand\Index::class);

    // colors
    Route::get('/colors', [App\Http\Controllers\Admin\ColorController::class, 'index']);
    Route::get('/colors/create', [App\Http\Controllers\Admin\ColorController::class, 'create']);
    Route::post('/colors', [App\Http\Controllers\Admin\ColorController::class, 'store']);
    Route::get('/colors/{color_id}/edit', [App\Http\Controllers\Admin\ColorController::class, 'edit']);
    Route::put('/colors/{color_id}', [App\Http\Controllers\Admin\ColorController::class, 'update']);

    Route::get('/colors/{color_id}/delete', [App\Http\Controllers\Admin\ColorController::class, 'destroy']);

    // slider
    Route::get('/sliders', [App\Http\Controllers\Admin\SliderController::class, 'index']);
    Route::get('/sliders/create', [App\Http\Controllers\Admin\SliderController::class, 'create']);
    Route::post('/sliders', [App\Http\Controllers\Admin\SliderController::class, 'store']);
    Route::get('/sliders/{slider_id}/edit', [App\Http\Controllers\Admin\SliderController::class, 'edit']);
    Route::put('/sliders/{slider}', [App\Http\Controllers\Admin\SliderController::class, 'update']);
    Route::get('/sliders/{slider}/delete', [App\Http\Controllers\Admin\SliderController::class, 'destroy']);

// });

});
