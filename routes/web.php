<?php

Route::get('/', function () {
    return view('web');
})->name('web');

Route::match(['post', 'get'], 'login', [
    'uses' => 'LoginController@authenticate',
    'as' => 'login'
]);

Route::get('logout',[
    'uses' => 'LoginController@logout',
    'as' => 'logout'
]);
