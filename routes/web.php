<?php

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

Route::match(['post', 'get'], 'login', [
    'uses' => 'LoginController@authenticate',
    'as' => 'login'
]);

Route::get('logout',[
    'uses' => 'LoginController@logout',
    'as' => 'logout'
]);
