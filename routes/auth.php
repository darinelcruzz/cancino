<?php

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::group(['prefix' => 'compras', 'as' => 'shoppings.'], function () {
    $ctrl = 'ShoppingController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{shopping}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{shopping}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'usuarios', 'as' => 'users.'], function () {
    $ctrl = 'UserController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{user}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{user}', usesas($ctrl, 'destroy'));
});
