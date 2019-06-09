<?php

Route::get('/', function () {
    return view('web');
})->name('web');

Route::group(['prefix' => 'publico', 'as' => 'public.'], function () {
    $ctrl = 'PublicController';
    Route::get('mantenimiento/{maintenance}', usesas($ctrl, 'maintenance'));
});

Route::match(['post', 'get'], 'login', [
    'uses' => 'LoginController@authenticate',
    'as' => 'login'
]);

Route::get('logout',[
    'uses' => 'LoginController@logout',
    'as' => 'logout'
]);
