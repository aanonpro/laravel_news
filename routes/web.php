<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth; // import file



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/',[App\Http\Controllers\Frontend\FrontendController::class, 'index']);
Route::get('topic/{category_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'viewCategoryPost']);
Route::get('topic/{category_slug}/{post_slug}',[App\Http\Controllers\Frontend\FrontendController::class, 'viewPost']);


Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/', [App\Http\Controllers\Admin\DashboardController::class, 'index']);
});

Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('category', [App\Http\Controllers\Admin\CategoryController::class, 'index']);
    Route::get('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'create']);
    Route::post('add-category', [App\Http\Controllers\Admin\CategoryController::class, 'store']);
    Route::get('edit-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'edit']);
    Route::put('update-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'update']);
    // Route::get('delete-category/{category_id}', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);
    Route::post('delete-category', [App\Http\Controllers\Admin\CategoryController::class, 'destroy']);


    Route::get('posts',[App\Http\Controllers\Admin\PostController::class, 'index']);
    Route::get('add-posts',[App\Http\Controllers\Admin\PostController::class, 'create']);
    Route::post('add-posts',[App\Http\Controllers\Admin\PostController::class, 'store']);
    Route::get('edit-post/{post_id}',[App\Http\Controllers\Admin\PostController::class, 'edit']);
    Route::put('update-post/{post_id}',[App\Http\Controllers\Admin\PostController::class, 'update']);
    // Route::get('delete-post/{post_id}',[App\Http\Controllers\Admin\PostController::class, 'destroy']);
    Route::post('delete-post',[App\Http\Controllers\Admin\PostController::class, 'destroy']);

    Route::get('users', [App\Http\Controllers\Admin\UserController::class, 'index']);
    Route::get('users/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);
    Route::put('update-users/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);

    Route::get('settings', [App\Http\Controllers\Admin\SettingsController::class, 'index']);
    Route::post('settings', [App\Http\Controllers\Admin\SettingsController::class, 'savedata']);

});

