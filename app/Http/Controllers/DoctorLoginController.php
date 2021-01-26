<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorLoginController extends Controller
{
    
    public function __construct() {
        $this->middleware('guest:doctor', ['except' => ['doctorLogout']]) ;
    }

    public function showLoginForm() {
        return view("default.doctorAuth.doctorLogin") ;
    }

    public function login(Request $request) {
        // validate form data 
        $this->validate($request, [
            'doctor_login_email' => 'required|email',
            'doctor_login_password' => 'required',
        ]);

        // attemp to log the doctor in 
        if (Auth::guard('doctor')->attempt(['email' => $request->doctor_login_email, 'password' => $request->doctor_login_password], $request->doctor_login_remember)) {
            // if successful , then redirect to their location 
            return redirect()->intended( route('doctor.home') );
        }

        // if unsuccessful , then redirect back to the login with the form data 
        return redirect()->back()->withInput($request->only('email', 'remember'))->with('doctorLoginMSG', 'These credentials do not match our records');
    }

    public function doctorLogout() {
        Auth::guard('doctor')->logout();
        return view("default.doctorAuth.doctorLogin") ;
    }

}
