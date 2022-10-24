<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Auth::routes();

Route::get('/recipe/{recipe_id}/like/{user_id}', [App\Http\Controllers\LikeController::class , 'liked'])->name('liked');

Route::post('/recipe/{recipe_id}/like/{user_id}', [App\Http\Controllers\LikeController::class , 'toggle'])->name('like');

