<?php

use Illuminate\Support\Facades\Auth;

Route::get('clients/{store}', function ($store)
{
	return App\Client::where('store_id', $store)
    	->whereIn('type', ['3', '2'])
    	->get(['business', 'id']);
});


Route::apiResource('products', 'API\ProductController');
Route::apiResource('expenses-groups', 'API\ExpensesGroupController');

Route::group(['prefix' => 'supplies'], function () {
    $ctrl = 'API\SupplyStockController';
    Route::get('/{store_id}', usesas($ctrl, 'index'));
    Route::get('/{store_id}/{keyword}', usesas($ctrl, 'show'));
});
