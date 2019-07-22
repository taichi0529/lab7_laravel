<?php

use Illuminate\Http\Request;

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

Route::group(['prefix' => 'v1'], function () {
    Route::get('test/{id}', 'WorkController@test')->middleware('test');
    Route::post('auth/register', 'AuthController@register');
    Route::post('auth/login', 'AuthController@login');
    Route::post('auth/refresh', 'AuthController@refresh');
    Route::group(['middleware' => 'auth'], function () {
        Route::post('auth/logout', 'AuthController@logout');
        Route::post('auth/me', 'AuthController@me');
        Route::get('works', 'WorkController@index');
        Route::get('works/{work}', 'WorkController@show');
        Route::post('myworks', 'WorkController@store');
    });
});
