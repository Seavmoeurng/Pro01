<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SubCategoryController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// Route::middleware(['is_admin'])->group(function () {
//     Route::get('/admin/profile', [ProfileController::class, 'edit']);
//     Route::patch('/admin/profile', [ProfileController::class, 'update']);
// });
Route::middleware('auth')->group(function(){
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);
    Route::resource('product', ProductController::class);
});
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/get-subcategories/{categoryId}', [ProductController::class, 'getSubcategories']);
Route::get('/get-subcategories/{categoryID}',[ProductController::class,'getSubcategories']);
