<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    
    public function __construct() {
        $this->middleware('guest:admin', ['except' => ['adminLogout']]) ;
    }

    public function showLoginForm() {
        return view("default.adminAuth.adminLogin") ;
    }

    public function login(Request $request) {
        // validate form data 
        $this->validate($request, [
            'admin_login_email' => 'required|email',
            'admin_login_password' => 'required',
        ]);

        // attemp to log the admin in 
        if (Auth::guard('admin')->attempt(['email' => $request->admin_login_email, 'password' => $request->admin_login_password], $request->admin_login_remember)) {
            // if successful , then redirect to their location 
            return redirect()->intended( route('admin.home') );
        }

        // if unsuccessful , then redirect back to the login with the form data 
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('adminLoginMSG', 'These credentials do not match our records');
    }

    public function adminLogout() {
        Auth::guard('admin')->logout();
        return view("default.adminAuth.adminLogin") ;
    }

    public function showForgetPasswordForm() {        
        return view("default.adminAuth.adminForget") ;
    }

}
