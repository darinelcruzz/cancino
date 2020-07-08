<?php

Route::get('clients', function ()
{
    return App\Client::where('type', '3')->orWhere('type', '2')->get(['business', 'id']);
});


Route::apiResource('products', 'API\ProductController');
Route::apiResource('supplies', 'API\SupplyController');
Route::apiResource('expenses-groups', 'API\ExpensesGroupController');
