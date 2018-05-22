<?php

Route::match(['post', 'get'], 'login', [
    'uses' => 'LoginController@authenticate',
    'as' => 'login'
]);

Route::get('logout',[
    'uses' => 'LoginController@logout',
    'as' => 'logout'
]);
