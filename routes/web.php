<?php

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

Route::get('/', [App\Http\Controllers\RecipeController::class , 'index'])->name('home');
Route::get('/chef/{chef}', [App\Http\Controllers\ChefController::class , 'chef'])->name('chef');
Route::get('/category/{category}', [App\Http\Controllers\CategoryController::class , 'index'])->name('category');

Route::resource(
    'recipes',
    App\Http\Controllers\RecipeController::class , [
        'except' => ['index']
    ]
);

Route::resource(
    'categories',
    App\Http\Controllers\CategoryController::class , [
        'except' => ['index']
    ]
);

Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class , 'index'])->name('dashboard');
Route::get('/admin/profile', [App\Http\Controllers\AdminController::class , 'profile'])->name('editProfile');
Route::post('/admin/profile', [App\Http\Controllers\AdminController::class , 'updateProfile'])->name('updateProfile');
Route::resource('likes', App\Http\Controllers\LikeController::class);
Route::post('ckeditor/upload', 'CKEditorController@upload')->name('ckeditor.image-upload');