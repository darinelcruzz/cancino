<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\SupplyStock;

class SupplyStockController extends Controller
{
	function index($store_id)
	{
		return SupplyStock::where('store_id', $store_id)
            ->with('supply')
            ->paginate(5);
	}

	function show($store_id, $keyword)
    {
        return SupplyStock::where('store_id', $store_id)
            ->whereHas('supply', function ($query) use ($keyword) {
                $query->where('description', 'like', "%$keyword%")
                    ->orWhere('code', 'like', "%$keyword%")
                    ->orWhere('sat_key', 'like', "%$keyword%");
            })
            ->with('supply')
            ->paginate(5);
    }
}
