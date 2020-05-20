<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\ExpensesGroup;

class ExpensesGroupController extends Controller
{
	function index()
	{
		return ExpensesGroup::all();
	}

	function show(ExpensesGroup $expenses_group)
	{
		return $expenses_group->providers;
	}
}