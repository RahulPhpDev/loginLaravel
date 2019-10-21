<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class CustomerController extends Controller
{
	public function __construct(){
		$this->middleware(['auth:customer'] );
	}

    public function dashboard()
    {
    	dd(Auth::user());
    	return view('customer.dashboard');
    }
}
