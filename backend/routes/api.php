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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/something', 'API\Auth\LoginController@someThing');
Route::get('v1/login/{provider}', 'API\Auth\LoginController@redirectToProvider')->name('api.login.provider');
Route::get('v1/login/{provider}/callback', 'API\Auth\LoginController@handleProviderCallback')->name('api.login.provider');
