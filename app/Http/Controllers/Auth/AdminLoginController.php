<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
	/**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin', ['except'=>['logout']]);
    }

    public function showLoginForm(){
    	return view("auth.admin-login");
    }

    public function login(Request $request){
    	// validate the data
    	$this->validate($request,[
    		'email'=>'required|email',
    		'password'=>'required|min:6'
    	]); 
    	// attempt to log the user in
    	if (Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)) {
    		// if successful,then redirect to their intended locations
    		return redirect()->intended(route('admin.dashboard'));
    	}    	
    	
    	// if unsuccessful, then redirect back to the login with form data
    	return redirect()->back()->withInput($request->only('email','remember'));
    }

    /**
     * Log the admin out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
