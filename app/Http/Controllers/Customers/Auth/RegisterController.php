<?php

namespace App\Http\Controllers\Customers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Register;
use App\Models\User;

class RegisterController extends Controller
{
   public function registerform()
   {
      return view('Customers.Auth.register');
   }
   public function register(Request $request)
   {
   	$customers=new Register;
      $users=new User;

      $users->email=$request['email'];
      $users->password=$request['password'];
      $users->save();

   	$customers->firstname=$request['firstname'];
   	$customers->lastname=$request['lastname'];
   	$customers->email=$request['email'];
   	$customers->password=$request['password'];
      $customers->address=$request['address'];
   	$customers->city=$request['city'];
   	$customers->country=$request['country'];
   	$customers->postalcode=$request['postalcode'];
   	$customers->save();
      return redirect()->route('\hotel');

   }

   
}
