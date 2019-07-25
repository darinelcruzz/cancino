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
    Route::get('verificar/{store}', usesas($ctrl, 'verify'));
});

Route::group(['prefix' => 'gastos', 'as' => 'expenses.'], function () {
    $ctrl = 'ExpenseController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{expense}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{expense}', usesas($ctrl, 'show'));
    Route::get('eliminar/{path}', usesas($ctrl, 'deleteFile'));
});

Route::group(['prefix' => 'ventas', 'as' => 'sales.'], function () {
    $ctrl = 'SaleController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::post('deposit', usesas($ctrl, 'deposit'));
	Route::get('editar/{sale}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('publico', usesas($ctrl, 'show'));
    Route::post('publico', usesas($ctrl, 'show'));
    Route::post('revisar', usesas($ctrl, 'check'));
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
});

Route::group(['prefix' => '200', 'as' => 'wastes.'], function () {
    $ctrl = 'WasteController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{store}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
});

Route::group(['prefix' => 'clientes', 'as' => 'clients.'], function () {
    $ctrl = 'ClientController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{client}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
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
});

Route::group(['prefix' => 'prestamos', 'as' => 'loans.'], function () {
    $ctrl = 'LoanController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{loan}', usesas($ctrl, 'agree'));
    Route::post('editar', usesas($ctrl, 'pay'));
});

Route::group(['prefix' => 'facturas', 'as' => 'invoices.'], function () {
    $ctrl = 'InvoiceController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar/{store}', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('detlles/{invoice}', usesas($ctrl, 'show'));
    Route::get('editar/{invoice}', usesas($ctrl, 'pay'));
    Route::post('editar', usesas($ctrl, 'pos'));
});

Route::group(['prefix' => 'usuarios', 'as' => 'users.', 'middleware' => 'admin'], function () {
    $ctrl = 'UserController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{user}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
});

Route::group(['prefix' => 'metas', 'as' => 'goals.'], function () {
    $ctrl = 'GoalController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{month}/{year}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
});

Route::group(['prefix' => 'empleados', 'as' => 'employers.'], function () {
    $ctrl = 'EmployerController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{employer}', usesas($ctrl, 'edit'));
    Route::post('editar/{employer}', usesas($ctrl, 'update'));
    Route::get('detalles/{employer}', usesas($ctrl, 'show'));
    Route::get('documentos/{employer}', usesas($ctrl, 'explore'));
});

Route::group(['prefix' => 'equipos', 'as' => 'equipments.'], function () {
    $ctrl = 'EquipmentController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{equipment}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{equipment}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'mantenimientos', 'as' => 'maintenances.'], function () {
    $ctrl = 'MaintenanceController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{maintenance}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{maintenance}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'documentos', 'as' => 'documents.'], function () {
    $ctrl = 'DocumentController';
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('/{store}', usesas($ctrl, 'index'));
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'high'], function () {
    $ctrl = 'AdminController';
    Route::get('compras', usesas($ctrl, 'shoppings'));
    Route::post('compras/verificar', usesas($ctrl, 'verify'));
    Route::get('ventas', usesas($ctrl, 'sales'));
    Route::get('depositos', usesas($ctrl, 'deposits'));
    Route::get('notas', usesas($ctrl, 'notes'));
    Route::get('saldos', usesas($ctrl, 'balances'));
    Route::get('gastos/{store}', usesas($ctrl, 'expenses'));
    Route::get('bitacora', usesas($ctrl, 'binnacles'));
    Route::get('prestamos/{store}', usesas($ctrl, 'loans'));
    Route::get('200', usesas($ctrl, 'wastes'));
    Route::get('metas', usesas($ctrl, 'goals'));
    Route::get('publico', usesas($ctrl, 'public'));
    Route::post('publico', usesas($ctrl, 'public'));
    Route::get('documentos', usesas($ctrl, 'documents'));
    Route::get('empleados', usesas($ctrl, 'employers'));
    Route::get('equipos', usesas($ctrl, 'equipments'));
});
