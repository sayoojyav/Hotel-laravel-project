<?php

namespace App\Http\Controllers\Admin\Auth;

use Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Artisan;
class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest:admins')->except('logout');
    }

    public function showLoginForm()
    {
        return view('Admin.auth.login');
    }
    public function username()
    {
        return 'username';
    }

    public function login(Request $request)
    {

        
         $this->validateLogin($request);
         // dd($request);


        if ($lockedOut = $this->hasTooManyLoginAttempts($request)) {
            
            $this->fireLockoutEvent($request);
               
            return $this->sendLockoutResponse($request);
        }

        $credentials = $this->credentials($request);

           
        if ($this->guard()->attempt($credentials, $request->has('remember')))
        {

            return $this->sendLoginResponse($request);
        
        }
        

        if (! $lockedOut) {
            $this->incrementLoginAttempts($request);
        }

        return $this->sendFailedLoginResponse($request);
    }

    protected function authenticated(Request $request)
     {
            return redirect()->route('admin::dashboard');
       

       
       
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('admin::get_login');
    }

    protected function guard()
    {
        return Auth::guard('admins');
    }

   
}
