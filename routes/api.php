<?php

Route::get('clients', function ()
{
    return App\Client::where('type', '3')->orWhere('type', '2')->get(['business', 'id']);
});


Route::apiResource('products', 'API\ProductController');
Route::apiResource('expenses-groups', 'API\ExpensesGroupController');

Route::group(['prefix' => 'supplies'], function () {
    $ctrl = 'API\SupplyStockController';
    Route::get('/{store_id}', usesas($ctrl, 'index'));
    Route::get('/{store_id}/{keyword}', usesas($ctrl, 'show'));
});
