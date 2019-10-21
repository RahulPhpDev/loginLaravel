<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class CustomerLoginController extends Controller
{
    use AuthenticatesUsers;
    public function __construct()
    {
    	$this->middleware(['guest', 'guest:admin', 'guest:customer'], ['except' => ['logout']]);
    }

    public function showloginForm()
    {
		return view('customer.login');
    }

    public function savelogin(Request $request)
    {
    	if(Auth::guard('customer')->attempt( [
	    		'email' => $request->email,
	    		'password' => $request->password
	    	])
	    ){
    		return redirect()->intended(route('customer.dashboard'));
    	}
    	return redirect()->back()->withInput($request->only('email'));
    }
}
