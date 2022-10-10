<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Product;

class ProductController extends Controller
{
	function index()
	{
		return Product::query()
			->select('id', 'description', 'code')
			->where('status', 'Descontinuado')
			->where('quantity', '!=', 0)
			->get();
	}
}