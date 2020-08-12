<?php

namespace App\Http\Controllers\Customers\Auth;
use Auth;
use App\Http\Controllers\Controller;
use App\Models\Register;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{

	 use AuthenticatesUsers;

	 public function __construct()
    {
        $this->middleware('guest:web')->except('logout');
    }
   public function showLoginForm()
   {
   	return view('Customers.Auth.login');
   }
   public function username()
    {
        return 'email';
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
        dd($credentials);

            return $this->sendLoginResponse($request);
          
        }

        if (! $lockedOut) {

            $this->incrementLoginAttempts($request);
            

        }

        return $this->sendFailedLoginResponse($request);
       
    }
     protected function authenticated(Request $request)
     {

            return redirect()->route('hotel::/');
       
         
    }
    public function logout(Request $request)
    {
        $this->guard()->logout();
        return redirect()->route('hotel::get_login');
    }
     protected function guard()
    {
        return Auth::guard('web');
    }


}

