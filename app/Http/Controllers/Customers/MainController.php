<?php

namespace App\Http\Controllers\Customers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainController extends Controller
{
	public function index()
	{
		return view('Customers.layouts.mainpage');
	}
}