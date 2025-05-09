<?php

use Illuminate\Http\Request;


use App\Http\Controllers\UserController;

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


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return auth()->user();
});

Wave::api();

// Posts Example API Route
Route::group(['middleware' => 'auth:api'], function () {
    Route::get('/posts', '\App\Http\Controllers\Api\ApiController@posts');
    Route::post('/posts', '\App\Http\Controllers\Api\ApiController@createPost');
    Route::post('/posts/{id}', '\App\Http\Controllers\Api\ApiController@updatePost');

    Route::get('/users', '\App\Http\Controllers\Api\ApiController@users');
    
});

Route::post('/users', [UserController::class, 'store']);


