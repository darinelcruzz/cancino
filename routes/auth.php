<?php

Route::get('/inicio', function () {
    return view('welcome');
})->name('welcome');

Route::get('/prueba', usesas('SaleController', 'prueba'));

Route::group(['prefix' => 'compras', 'as' => 'shoppings.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'ShoppingController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{shopping}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('verificar/{store}', usesas($ctrl, 'verify'));
});

Route::group(['prefix' => 'gastos', 'as' => 'expenses.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'ExpenseController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('poliza/{expense}', usesas($ctrl, 'policy'));
	Route::get('editar/{expense}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::post('subir', usesas($ctrl, 'upFile'));
    Route::get('detalles/{expense}', usesas($ctrl, 'show'));
    Route::get('eliminar/{path}', usesas($ctrl, 'deleteFile'));
});

Route::group(['prefix' => 'ventas', 'as' => 'sales.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'SaleController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::post('deposit', usesas($ctrl, 'deposit'));
	Route::get('editar/{sale}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('publico', usesas($ctrl, 'show'));
    Route::post('publico', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'nc', 'as' => 'notes.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'NoteController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{note}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
	Route::get('capturar/{note}', usesas($ctrl, 'capture'));
    Route::post('capturar', usesas($ctrl, 'add'));
});

Route::group(['prefix' => '200', 'as' => 'wastes.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'WasteController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{store}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
});

Route::group(['prefix' => 'clientes', 'as' => 'clients.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'ClientController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{client}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{client}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'bitacora', 'as' => 'binnacles.', 'middleware' => 'nonCheckup'], function () {
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
    Route::get('/anteriores', usesas($ctrl, 'index'));
    Route::get('/actuales', usesas($ctrl, 'groups'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{loan}', usesas($ctrl, 'agree'));
    Route::post('editar', usesas($ctrl, 'pay'));
});

Route::group(['prefix' => 'facturas', 'as' => 'invoices.', 'middleware' => 'nonCheckup'], function () {
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

Route::group(['prefix' => 'metas', 'as' => 'goals.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'GoalController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{month}/{year}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
});

Route::group(['prefix' => 'empleados', 'as' => 'employers.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'EmployerController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{employer}', usesas($ctrl, 'edit'));
    Route::post('editar/{employer}', usesas($ctrl, 'update'));
    Route::get('detalles/{employer}', usesas($ctrl, 'show'));
    Route::get('documentos/{employer}', usesas($ctrl, 'explore'));
    Route::get('baja/{employer}', usesas($ctrl, 'dismiss'));
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

Route::group(['prefix' => 'pendientes', 'as' => 'tasks.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'TaskController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{task}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{task}', usesas($ctrl, 'show'));
    Route::get('actualizar/{task}', usesas($ctrl, 'agree'));
});

Route::group(['prefix' => 'documentos', 'as' => 'documents.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'DocumentController';
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('/{store}', usesas($ctrl, 'index'));
});

Route::group(['prefix' => 'deudas', 'as' => 'debts.', 'middleware' => 'high'], function () {
    $ctrl = 'DebtController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('detalles/{debt}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'abonos', 'as' => 'payments.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'PaymentController';
    Route::get('agregar/{debt}', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
});

Route::group(['prefix' => 'arqueo', 'as' => 'checkup.'], function () {
    $ctrl = 'CheckupController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{checkup}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{checkup}', usesas($ctrl, 'show'));
    Route::get('reporte/{checkup}', usesas($ctrl, 'report'));
    Route::get('actualizar/{checkup}', usesas($ctrl, 'agree'));
    Route::get('terminales', usesas($ctrl, 'cards'));
    Route::post('terminales', usesas($ctrl, 'cards'));
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'high'], function () {
    $ctrl = 'AdminController';
    Route::get('compras', usesas($ctrl, 'shoppings'));
    Route::post('compras/verificar', usesas($ctrl, 'verify'));
    Route::get('ventas', usesas($ctrl, 'sales'));
    Route::get('depositos', usesas($ctrl, 'deposits'));
    Route::post('depositos', usesas($ctrl, 'deposits'));
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
    Route::get('arqueos', usesas($ctrl, 'checkups'));
    Route::get('pendientes', usesas($ctrl, 'tasks'));
});

Route::group(['prefix' => 'apoyo', 'as' => 'helper.', 'middleware' => 'helper'], function () {
    $ctrl = 'HelperController';
    Route::get('depositos', usesas($ctrl, 'deposits'));
    Route::post('depositos', usesas($ctrl, 'deposits'));
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
    Route::get('arqueos', usesas($ctrl, 'checkups'));
    Route::get('pendientes', usesas($ctrl, 'tasks'));
});
