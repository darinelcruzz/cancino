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

Route::group(['prefix' => 'gastos', 'as' => 'expenses.'], function () {
    $ctrl = 'ExpenseController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{expense}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{expense}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'ventas', 'as' => 'sales.'], function () {
    $ctrl = 'SaleController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::post('deposit', usesas($ctrl, 'deposit'));
	Route::get('editar/{sale}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{sale}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'nc', 'as' => 'creditnotes.'], function () {
    $ctrl = 'CreditNoteController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{creditnote}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{creditnote}', usesas($ctrl, 'destroy'));
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

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    $ctrl = 'AdminController';
    Route::get('compras', usesas($ctrl, 'shoppings'));
    Route::get('compras/{shopping}', usesas($ctrl, 'verify'));
    Route::get('ventas', usesas($ctrl, 'sales'));
    Route::get('nc', usesas($ctrl, 'creditnotes'));
});
