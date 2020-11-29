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

    // MENUS MANAGEMENT ENDPOINT
    Route::get('menus', 'API\BO\MenuController@load');
    Route::get('menus/{id}', 'API\BO\MenuController@loadById');
    Route::get('parent-options', 'API\BO\MenuController@loadParentOptions');
    Route::post('menus', 'API\BO\MenuController@submit');
    Route::post('menus/{id}', 'API\BO\MenuController@update');
    Route::delete('menus/{id}', 'API\BO\MenuController@delete');
});

