<?php

Route::get('/inicio', usesas('WelcomeController', 'index'));

Route::get('/prueba', function () {
    return view('test');
})->name('test');

// Route::get('/prueba', usesas('SaleController', 'prueba'));

Route::group(['prefix' => 'compras', 'as' => 'shoppings.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'ShoppingController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::post('/', usesas($ctrl, 'index'));
    Route::get('llenar/fecha/factura', usesas($ctrl, 'invoices'));
    Route::get('agregar', usesas($ctrl, 'create'))->middleware('helper');
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{shopping}', usesas($ctrl, 'edit'));
    Route::post('editar/{shopping}', usesas($ctrl, 'update'));
    Route::get('verificar/{store}', usesas($ctrl, 'verify'))->middleware('helper');
    Route::post('verificar/{store}', usesas($ctrl, 'verify'))->middleware('helper');
    Route::get('marcar-impreso/{store}', usesas($ctrl, 'mark'))->middleware('helper');
    Route::post('marcar-impreso/{store}', usesas($ctrl, 'mark'))->middleware('helper');
});

Route::group(['prefix' => 'gastos', 'as' => 'expenses.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'ExpenseController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar/{store}', usesas($ctrl, 'create'));
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
    Route::get('editar/{sale}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::post('deposit', usesas($ctrl, 'deposit'));
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

Route::group(['prefix' => 'productos-en-uso', 'as' => 'taken_products.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'TakenProductController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{store}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('imprimir-reporte/{store}', usesas($ctrl, 'print'));
});

Route::group(['prefix' => 'clientes', 'as' => 'clients.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'ClientController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{client}', usesas($ctrl, 'edit'));
    Route::post('editar/{client}', usesas($ctrl, 'update'));
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
    Route::get('imprimir-formato/{store}', usesas($ctrl, 'print'));
});

Route::group(['prefix' => 'facturas', 'as' => 'invoices.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'InvoiceController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar/{store}', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('detalles/{invoice}', usesas($ctrl, 'show'));
    Route::get('editar/{invoice}', usesas($ctrl, 'pay'));
    Route::post('editar/{invoice}', usesas($ctrl, 'pos'));
});

Route::group(['prefix' => 'usuarios', 'as' => 'users.', 'middleware' => 'admin'], function () {
    $ctrl = 'UserController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{user}', usesas($ctrl, 'edit'));
    Route::post('editar/{user}', usesas($ctrl, 'update'));
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
	Route::get('enviar-correo/{employer}', usesas($ctrl, 'notify'));
    Route::get('editar/{employer}', usesas($ctrl, 'edit'));
    Route::post('editar/{employer}', usesas($ctrl, 'update'));
    Route::get('editar/estado/{employer}/{status}', usesas($ctrl, 'updateStatus'));
    Route::get('detalles/{employer}', usesas($ctrl, 'show'));
    Route::get('documentos/{employer}', usesas($ctrl, 'explore'));
    Route::post('baja/{employer}', usesas($ctrl, 'dismiss'));
    Route::post('alta/{employer}', usesas($ctrl, 'restore'));
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
    Route::get('agregar/{equipment}', usesas($ctrl, 'create'));
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

Route::group(['prefix' => 'eventos', 'as' => 'events.', 'middleware' => 'high'], function () {
    $ctrl = 'EventController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{event}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('detalles/{event}', usesas($ctrl, 'show'));
    Route::get('actualizar/{event}', usesas($ctrl, 'agree'));
});

Route::group(['prefix' => 'documentos', 'as' => 'documents.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'DocumentController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('{store}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'formato-de-visita', 'as' => 'checklists.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'ChecklistController';
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{checklist}', usesas($ctrl, 'edit'));
    Route::post('editar/{checklist}', usesas($ctrl, 'update'));
    Route::get('detalles/{checklist}', usesas($ctrl, 'show'));
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
    Route::post('editar/{checkup}', usesas($ctrl, 'update'));
    Route::get('detalles/{checkup}', usesas($ctrl, 'show'));
    Route::get('reporte/{checkup}', usesas($ctrl, 'report'));
    Route::get('actualizar/{checkup}/{status}', usesas($ctrl, 'updateStatus'));
    Route::get('terminales', usesas($ctrl, 'cards'));
    Route::post('terminales', usesas($ctrl, 'cards'));
    Route::get('transferencias-y-cheques', usesas($ctrl, 'transfers'));
    Route::post('transferencias-y-cheques', usesas($ctrl, 'transfers'));
    Route::post('transferencias-y-cheques/imprimir', usesas($ctrl, 'print'));
});

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'high'], function () {
    $ctrl = 'AdminController';
    Route::get('ventas', usesas($ctrl, 'sales'));
    Route::get('depositos', usesas($ctrl, 'deposits'));
    Route::post('depositos', usesas($ctrl, 'deposits'));
    Route::get('notas', usesas($ctrl, 'notes'));
    Route::get('saldos', usesas($ctrl, 'balances'));
    Route::get('bitacora', usesas($ctrl, 'binnacles'));
    Route::get('prestamos/{store}', usesas($ctrl, 'loans'));
    Route::get('prestamos', usesas($ctrl, 'invoices'));
    Route::get('productos-en-uso', usesas($ctrl, 'taken_products'));
    Route::get('metas', usesas($ctrl, 'goals'));
    Route::get('publico', usesas($ctrl, 'public_sales', 'public'));
    Route::post('publico', usesas($ctrl, 'public_sales', 'public'));
    Route::get('terminales', usesas($ctrl, 'terminals'));
    Route::post('terminales', usesas($ctrl, 'terminals'));
    Route::get('resultados', usesas($ctrl, 'results'));
    Route::post('resultados', usesas($ctrl, 'results'));
    Route::get('documentos', usesas($ctrl, 'documents'));
    Route::get('empleados', usesas($ctrl, 'employers'));
    Route::get('equipos', usesas($ctrl, 'equipments'));
    Route::get('arqueos', usesas($ctrl, 'checkups'));
    Route::get('pendientes', usesas($ctrl, 'tasks'));
    Route::get('formato-de-visita', usesas($ctrl, 'checklist'));
    Route::get('gastos', usesas($ctrl, 'expenses'));
    Route::get('gastos/tienda/{store}', usesas($ctrl, 'storeExpenses'));
    Route::get('premios', usesas($ctrl, 'awards'));
});

Route::group(['prefix' => 'apoyo', 'as' => 'helper.', 'middleware' => 'helper'], function () {
    $ctrl = 'HelperController';
    Route::get('notas', usesas($ctrl, 'notes'));
    Route::get('bitacora', usesas($ctrl, 'binnacles'));
    Route::get('prestamos/{store}', usesas($ctrl, 'loans'));
    Route::get('productos-en-uso', usesas($ctrl, 'taken_products'));
    Route::get('metas', usesas($ctrl, 'goals'));
    Route::get('publico', usesas($ctrl, 'public'));
    Route::post('publico', usesas($ctrl, 'public'));
    Route::get('documentos', usesas($ctrl, 'documents'));
    Route::get('empleados', usesas($ctrl, 'employers'));
    Route::get('equipos', usesas($ctrl, 'equipments'));
    Route::get('arqueos', usesas($ctrl, 'checkups'));
    Route::get('pendientes', usesas($ctrl, 'tasks'));
    Route::get('gastos', usesas($ctrl, 'expenses'));
});

Route::group(['prefix' => 'conteos', 'as' => 'count.'], function () {
    $ctrl = 'CountController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('exportar', usesas($ctrl, 'export'));
    Route::get('agregar/{mode?}', usesas($ctrl, 'create'));
    Route::post('agregar/{mode?}', usesas($ctrl, 'store'));
    Route::get('editar/{count}', usesas($ctrl, 'edit'));
    Route::post('editar/{count}', usesas($ctrl, 'update'));
});

Route::group(['prefix' => 'productos', 'as' => 'product.'], function () {
    $ctrl = 'ProductController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('exportar/{format}', usesas($ctrl, 'export'));
    Route::post('importar', usesas($ctrl, 'import'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{product}', usesas($ctrl, 'edit'));
    Route::post('editar/{product}', usesas($ctrl, 'update'));
});

Route::group(['prefix' => 'ubicaciones', 'as' => 'location.'], function () {
    $ctrl = 'LocationController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{location}', usesas($ctrl, 'edit'));
    Route::post('editar/{location}', usesas($ctrl, 'update'));
    Route::post('asignar/{user}', usesas($ctrl, 'assign'));
});

Route::group(['prefix' => 'comisiones', 'as' => 'commision.'], function () {
    $ctrl = 'CommisionController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::post('/', usesas($ctrl, 'index'));
    Route::get('agregar/{store}', usesas($ctrl, 'create'))->middleware('commissions');
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/trabajador/{employer}/{goal}', usesas($ctrl, 'editEmployer'));
    Route::post('editar/trabajador', usesas($ctrl, 'updateEmployer'));
    Route::get('editar/{goal}/{week}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('extras/{goal}', usesas($ctrl, 'extras'));
    Route::post('extras/{goal}', usesas($ctrl, 'add'));
    Route::get('reporte/{goal}', usesas($ctrl, 'report'));
    Route::get('/{store}', usesas($ctrl, 'show'))->middleware('commissions');
    Route::post('/{store}', usesas($ctrl, 'show'))->middleware('commissions');
});

Route::group(['prefix' => 'movimientos-bancarios', 'as' => 'account_movements.'], function () {
    $ctrl = 'AccountMovementController';
    Route::get('tiendas', usesas($ctrl, 'choose'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('detalles/{account_movement}', usesas($ctrl, 'show'));
    Route::get('editar/{account_movement}', usesas($ctrl, 'edit'));
    Route::post('editar/{account_movement}', usesas($ctrl, 'update'));
    Route::post('importar', usesas($ctrl, 'import'));
    Route::get('importar', usesas($ctrl, 'import'));
    Route::get('arreglar', usesas($ctrl, 'fix'));
    Route::get('/{store?}', usesas($ctrl, 'index'));
    Route::post('/{store?}', usesas($ctrl, 'index'));
});

Route::group(['prefix' => 'proveedores', 'as' => 'providers.'], function () {
    $ctrl = 'ProviderController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{provider}', usesas($ctrl, 'edit'));
    Route::post('editar/{provider}', usesas($ctrl, 'update'));
    Route::get('eliminar/{provider}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'grupos-de-gastos', 'as' => 'expenses_groups.'], function () {
    $ctrl = 'ExpensesGroupController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{expenses_group}', usesas($ctrl, 'edit'));
    Route::post('editar/{expenses_group}', usesas($ctrl, 'update'));
    Route::get('eliminar/{expenses_group}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'cheques', 'as' => 'checks.'], function () {
    $ctrl = 'CheckController';
    Route::get('agregar/{store}', usesas($ctrl, 'create'));
    Route::post('agregar/{store}', usesas($ctrl, 'store'));
    Route::get('detalles/{check}', usesas($ctrl, 'show'));
    Route::get('editar/{check}', usesas($ctrl, 'edit'));
    Route::post('editar/{check}', usesas($ctrl, 'update'));
    Route::get('poliza/{check}', usesas($ctrl, 'policy'));
    Route::get('cancelar/{check}', usesas($ctrl, 'destroy'));
    Route::post('subir/{check}', usesas($ctrl, 'upload'));
    Route::get('imprimir/{check}', usesas($ctrl, 'print'));
    Route::get('eliminar/{path}', usesas($ctrl, 'remove'));
    Route::post('importar', usesas($ctrl, 'import'));
    Route::get('importar', usesas($ctrl, 'import'));
    Route::get('/{store?}', usesas($ctrl, 'index'));
});

Route::group(['prefix' => 'terminal', 'as' => 'terminal.'], function () {
    $ctrl = 'TerminalCheckController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar/{bank_account}', usesas($ctrl, 'create'));
    Route::post('agregar/{bank_account}', usesas($ctrl, 'store'));
    Route::get('editar/{check}', usesas($ctrl, 'edit'));
    Route::get('detalles/{check}', usesas($ctrl, 'show'));
    Route::post('editar/{check}', usesas($ctrl, 'update'));
    Route::get('poliza/{check}', usesas($ctrl, 'policy'));
    Route::get('cancelar/{check}', usesas($ctrl, 'destroy'));
});

Route::group(['prefix' => 'conceptos', 'as' => 'concepts.'], function () {
    $ctrl = 'ConceptController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{concept}', usesas($ctrl, 'edit'));
    Route::post('editar/{concept}', usesas($ctrl, 'update'));
    Route::get('{concept}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'servicios', 'as' => 'services.'], function () {
    $ctrl = 'ServiceController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::post('marcar-impresa/{service}', usesas($ctrl, 'mark'));
    Route::get('editar/{service}', usesas($ctrl, 'edit'));
    Route::post('editar/{service}', usesas($ctrl, 'update'));
    Route::get('{service}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'pago-de-servicios', 'as' => 'service_payments.'], function () {
    $ctrl = 'ServicePaymentController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar/{service}', usesas($ctrl, 'create'));
    Route::post('agregar/{service}', usesas($ctrl, 'store'));
    Route::get('editar/{service_payment}', usesas($ctrl, 'edit'));
    Route::post('editar/{service_payment}', usesas($ctrl, 'update'));
    Route::get('{service_payment}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'portales', 'as' => 'websites.'], function () {
    $ctrl = 'WebsiteController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{website}', usesas($ctrl, 'edit'));
    Route::post('editar/{website}', usesas($ctrl, 'update'));
    Route::get('{website}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'insumos', 'as' => 'supplies.'], function () {
    $ctrl = 'SupplyController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::get('migrar', usesas($ctrl, 'migrate'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('imprimir', usesas($ctrl, 'inventory'));
    Route::post('imprimir', usesas($ctrl, 'print'));
    Route::get('editar/{supply}', usesas($ctrl, 'edit'));
    Route::post('editar/{supply}', usesas($ctrl, 'update'));
    Route::get('subproducto/{supply}', usesas($ctrl, 'add'));
    Route::post('subproducto/{supply}', usesas($ctrl, 'save'));
    Route::get('{supply}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'compras-de-insumos', 'as' => 'supplies.purchases.'], function () {
    $ctrl = 'SupplyPurchaseController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{supply_purchase}', usesas($ctrl, 'edit'))->middleware('helper');
    Route::post('editar/{supply_purchase}', usesas($ctrl, 'update'));
    Route::get('{supply_purchase}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'ventas-de-insumos', 'as' => 'supplies.sales.'], function () {
    $ctrl = 'SupplySaleController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('marcar-entregada/{supply_sale}', usesas($ctrl, 'mark'));
    Route::get('editar/{supply_sale}', usesas($ctrl, 'edit'));
    Route::post('editar/{supply_sale}', usesas($ctrl, 'update'));
    Route::get('sumar/{supply_sale}', usesas($ctrl, 'add'));
    Route::post('sumar/{supply_sale}', usesas($ctrl, 'persist'));
    Route::post('pagar/{supply_sale}', usesas($ctrl, 'pay'));
    Route::get('cancelar/{supply_sale}', usesas($ctrl, 'destroy'));
    Route::get('pendientes/{store}', usesas($ctrl, 'pending'));
    Route::get('entregadas/{store}', usesas($ctrl, 'delivered'));
    Route::get('imprimir/{supply_sale}', usesas($ctrl, 'print'));
    Route::get('{supply_sale}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'transferencias-de-insumos', 'as' => 'supplies.transfers.'], function () {
    $ctrl = 'SupplyTransferController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{supply_transfer}', usesas($ctrl, 'edit'))->middleware('admin');
    Route::post('editar/{supply_transfer}', usesas($ctrl, 'update'))->middleware('admin');
    Route::get('imprimir/{supply_transfer}', usesas($ctrl, 'print'));
    Route::get('{supply_transfer}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'pos', 'as' => 'pos.'], function () {
    $ctrl = 'POSController';
    Route::get('subir-foto/{pos}', usesas($ctrl, 'upload'));
    Route::post('subir-foto/{pos}', usesas($ctrl, 'save'));
    Route::get('{pos}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'tiendas', 'as' => 'stores.'], function () {
    $ctrl = 'StoreController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
});

Route::group(['prefix' => 'casas', 'as' => 'homes.'], function () {
    $ctrl = 'HomeController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('editar/{home}', usesas($ctrl, 'edit'));
    Route::post('editar/{home}', usesas($ctrl, 'update'));
});

Route::group(['prefix' => 'cuentas', 'as' => 'bank_accounts.'], function () {
    $ctrl = 'BankAccountController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('/{bank_account}', usesas($ctrl, 'show'));
    Route::post('/{bank_account}', usesas($ctrl, 'show'));
});

Route::group(['prefix' => 'inventarios', 'as' => 'inventory.'], function () {
    $ctrl = 'InventoryController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
    Route::get('actualizar', usesas($ctrl, 'upload'));
    Route::post('actualizar', usesas($ctrl, 'upload'));
    Route::get('editar/{inventory}', usesas($ctrl, 'edit'));
    Route::post('editar/{inventory}', usesas($ctrl, 'update'));
    Route::get('/{inventory}', usesas($ctrl, 'show'));

    Route::group(['prefix' => 'parciales', 'as' => 'partial.'], function () {
        Route::get('inicio', usesas('PartialInventoryController', 'index'));
    });
});

Route::group(['prefix' => 'covid', 'as' => 'covid.'], function () {
    $ctrl = 'CovidController';
    Route::get('/imss', usesas($ctrl, 'imss'));
});

Route::get('/mailable/employer/to-firm', function () {
    $employer = App\Employer::find(1);

    return new App\Mail\EmployerCreatedToFirm($employer);
});

Route::get('/mailable/employer/to-manager', function () {
    $employer = App\Employer::find(1);

    return new App\Mail\EmployerCreated($employer);
});
