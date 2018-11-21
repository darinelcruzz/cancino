<?php

Route::get('/inicio', function () {
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
    Route::get('detalles/{expense}', usesas($ctrl, 'show'));
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

Route::group(['prefix' => 'nc', 'as' => 'notes.'], function () {
    $ctrl = 'NoteController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{note}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
	Route::get('capturar/{note}', usesas($ctrl, 'capture'));
    Route::post('capturar', usesas($ctrl, 'add'));
    Route::get('cancelar/{note}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'tiendas', 'as' => 'stores.'], function () {
    $ctrl = 'StoreController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{store}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{store}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'clientes', 'as' => 'clients.'], function () {
    $ctrl = 'ClientController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{client}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{client}', usesas($ctrl, 'destroy'));
    Route::get('detalles/{client}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'bitacora', 'as' => 'binnacles.'], function () {
    $ctrl = 'BinnacleController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('actividad', usesas($ctrl, 'activity'));
    Route::get('planeacion', usesas($ctrl, 'planning'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{binnacle}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{binnacle}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'prestamos', 'as' => 'loans.'], function () {
    $ctrl = 'LoanController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('detalles/{loan}', usesas($ctrl, 'show'));
	Route::get('factura/{loan}', usesas($ctrl, 'details'));
	Route::get('editar/{loan}', usesas($ctrl, 'agree'));
    Route::post('editar', usesas($ctrl, 'pay'));
    Route::post('facturar', usesas($ctrl, 'invoice'));
    Route::get('cancelar/{loan}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'usuarios', 'as' => 'users.', 'middleware' => 'admin'], function () {
    $ctrl = 'UserController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{user}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{user}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'metas', 'as' => 'goals.'], function () {
    $ctrl = 'GoalController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{user}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('cancelar/{user}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'high'], function () {
    $ctrl = 'AdminController';
    Route::get('compras', usesas($ctrl, 'shoppings'));
    Route::get('compras/{shopping}', usesas($ctrl, 'verify'));
    Route::get('ventas', usesas($ctrl, 'sales'));
    Route::get('notas', usesas($ctrl, 'notes'));
    Route::get('saldos', usesas($ctrl, 'balances'));
    Route::get('gastos/{store}', usesas($ctrl, 'expenses'));
    Route::get('bitacora', usesas($ctrl, 'binnacles'));
    Route::get('prestamos/{store}', usesas($ctrl, 'loans'));
});
