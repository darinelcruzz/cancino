<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Supply;

class SupplyController extends Controller
{
	function index()
	{
		return Supply::paginate(5);
	}

	function show($keyword)
    {
        return Supply::where('description', 'LIKE', "%$keyword%")
        	->orWhere('code', 'LIKE', "%$keyword%")
        	->orWhere('sat_key', 'LIKE', "%$keyword%")
        	->paginate(5);
    }
}
