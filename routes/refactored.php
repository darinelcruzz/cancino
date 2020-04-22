<?php

Route::group(['prefix' => 'refactorizado/compras', 'as' => 'shoppings.', 'middleware' => 'nonCheckup'], function () {
    $ctrl = 'Refactored\ShoppingController';
    Route::get('/', usesas($ctrl, 'index'));
    Route::get('agregar', usesas($ctrl, 'create'));
    Route::post('agregar', usesas($ctrl, 'store'));
	Route::get('editar/{shopping}', usesas($ctrl, 'edit'));
    Route::post('editar', usesas($ctrl, 'update'));
    Route::get('verificar/{store}', usesas($ctrl, 'verify'));
});

Route::group(['prefix' => 'refactorizado/admin', 'as' => 'admin.', 'middleware' => 'high'], function () {
    $ctrl = 'AdminController';
    // Route::get('compras', usesas($ctrl, 'shoppings'));
    Route::post('compras/verificar', usesas($ctrl, 'verify'));
    Route::get('ventas', usesas($ctrl, 'sales'));
    Route::get('depositos', usesas($ctrl, 'deposits'));
    Route::post('depositos', usesas($ctrl, 'deposits'));
    Route::get('notas', usesas($ctrl, 'notes'));
    Route::get('saldos', usesas($ctrl, 'balances'));
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
    Route::get('formato-de-visita', usesas($ctrl, 'checklist'));
    Route::get('gastos', usesas($ctrl, 'expenses'));
    Route::get('gastos/tienda/{store}', usesas($ctrl, 'storeExpenses'));
});