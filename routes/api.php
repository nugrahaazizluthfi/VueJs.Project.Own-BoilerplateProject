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

Route::group([
    'middleware' => 'api',
    'prefix' => 'bo'
], function ($router) {
    Route::post('auth/signin', 'API\BO\AuthController@signin');
    Route::post('auth/signout', 'API\BO\AuthController@signout');
});


Route::get('show-users', 'API\BO\SampleCrudController@showUser');
