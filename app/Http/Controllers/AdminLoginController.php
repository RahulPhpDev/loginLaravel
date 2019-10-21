<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Auth;
class AdminLoginController extends Controller
{
	 use AuthenticatesUsers;

	public function __construct()
	{
		// only people who is not logged in as admin 
		$this->middleware(['guest:admin','guest:customer','guest'], ['except' => ['logout']]);
	}

    public function showloginForm(){
    	return view('admin.login');
    }

    public function savelogin(Request $request){
    	if(Auth::guard('admin')->attempt( [
	    		'email' => $request->email,
	    		'password' => $request->password
	    	])
	    ){
    		return redirect()->intended(route('admin.dashboard'));
    	}
    	return redirect()->back()->withInput($request->only('email'));
    }
}
