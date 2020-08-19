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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('v1')->group(function (){
    Route::apiResource('/person', 'Api\v1\PersonController')
        ->only(['show', 'destroy', 'update', 'store']);
    
    Route::apiResource('/person', 'Api\v1\PersonController')
        ->only('index');
});

Route::prefix('v2')->group(function (){
    Route::apiResource('/person', 'Api\v2\PersonController')
        ->only('show');
});

Route::prefix('user')->group(function (){
    Route::post('/login', 'Api\v1\LoginController@login');
    Route::middleware('auth:api')->get('/all', 'Api\v1\User\UserController@index');
});


