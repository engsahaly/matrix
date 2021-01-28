<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{
    
    public function __construct() {
        $this->middleware('guest', ['except' => ['userLogout']]) ;
    }

    /**
     * Show user login form
     */
    public function showLoginForm() {
        return view("default.userAuth.userLogin") ;
    }


    /**
     * User login
     */
    public function login(Request $request) {
        // validate form data 
        $this->validate($request, [
            'user_login_email' => 'required|email',
            'user_login_password' => 'required',
        ]);

        // attemp to log the user in 
        if (Auth::guard()->attempt(['email' => $request->user_login_email, 'password' => $request->user_login_password], $request->user_login_remember)) {
            // if successful , then redirect to their location 
            return redirect()->intended( route('user.home') );
        }

        // if unsuccessful , then redirect back to the login with the form data 
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('userLoginMSG', 'These credentials do not match our records');
    }


    /**
     * User logout
     */
    public function userLogout() {
        Auth::guard()->logout();
        return view("default.user.home") ;
    }

}
