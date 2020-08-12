<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
	public function index()
	{
		// dd($request->user());
		return view('Admin.dashboard.index');
	}
	public function create()
	{
		return view('admin.dashboard.create');
	}
}
