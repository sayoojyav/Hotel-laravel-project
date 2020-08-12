<?php

namespace App\Http\Controllers\admin\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

class ForgotController extends Controller
{
	use SendsPasswordResetEmails;

    public function showLinkRequestForm()
    {
    	 return view('Admin.auth.email');
    }
    public function sendResetLinkEmail()
    {
    	
    	
    	
    }
}
