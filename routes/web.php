<?php

Route::get('/', function () {
    return view('web');
})->name('web');

Route::group(['prefix' => 'publico', 'as' => 'public.'], function () {
    $ctrl = 'PublicController';
    Route::get('equipos/{equipment}', usesas($ctrl, 'equipment'));
});

Route::match(['post', 'get'], 'login', [
    'uses' => 'LoginController@authenticate',
    'as' => 'login'
]);

Route::get('logout',[
    'uses' => 'LoginController@logout',
    'as' => 'logout'
]);
