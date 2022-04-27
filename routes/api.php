<?php

use Illuminate\Http\Request;
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

Route::get('clear-all-cache', function() {

    Artisan::call('cache:clear');
    dd("Successfully, you have cleared all cache of application.");
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


















Route::resource('users', App\Http\Controllers\API\userAPIController::class);


Route::resource('cats', App\Http\Controllers\API\catAPIController::class);


Route::resource('staff', App\Http\Controllers\API\staffAPIController::class);


Route::resource('pros', App\Http\Controllers\API\proAPIController::class);


Route::resource('tags', App\Http\Controllers\API\tagAPIController::class);


Route::resource('chapters', App\Http\Controllers\API\chapterAPIController::class);
