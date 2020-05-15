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


Route::get('v1/user', 'API\Auth\LoginController@getUser')->middleware('jwt.auth');

Route::get('v1/something', 'API\Auth\LoginController@someThing')->middleware('jwt.auth');
Route::get('v1/login/{provider}', 'API\Auth\LoginController@redirectToProvider')->name('api.login.provider');
Route::post('v1/login', 'API\Auth\LoginController@login')->name('api.login');
Route::get('v1/login/{provider}/callback', 'API\Auth\LoginController@handleProviderCallback')->name('api.login.provider');
