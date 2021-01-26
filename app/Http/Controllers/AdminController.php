<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator; 
use \App\Models\Admin ;

class AdminController extends Controller
{

    public function __construct() {
        $this->middleware('auth:admin');
    }

    public function edit(Request $request) {
        if ($request->method() == 'POST') {   
            return $this->update($request);
        } else {
            return view("default.admin.adminProfile") ;
        }
    }

    public function update(Request $request) {
        $admin = Auth::guard('admin')->user();

        if ( $request->input('email') != $admin->email || $request->input('admin_profile_name') != $admin->name) {
            // validation 
            if ( $request->input('email') != $admin->email ) {
                $validatedData = Validator::make($request->all(), [
                    'admin_profile_name' => 'required',
                    'email' => 'required|email|unique:admins',
                ])->validateWithBag('updateAdminInfoErrors');
            } else {
                $validatedData = Validator::make($request->all(), [
                    'admin_profile_name' => 'required',
                ])->validateWithBag('updateAdminInfoErrors');
            }
    
            $inputs = $request->except(['_token']);
            $admin->name = $request->input('admin_profile_name');
            $admin->email = $request->input('email');
            $admin->save();
    
            return redirect()->back()->with('adminProfileUpdateMSG', 'Updated Successfully');
        } else {
            return redirect()->back();
        }
    }

    public function updatePassword(Request $request) {
        $admin = Auth::guard('admin')->user();

        Validator::make($request->all(), [
            'admin_profile_current_password' => ['required'],
            'admin_profile_new_password' => ['required'],
            'admin_profile_confirm_new_password' => ['same:admin_profile_new_password'],
        ])->validateWithBag('updateAdminPasswordErrors');
   
        if (Hash::check($request->admin_profile_current_password, $admin->password)) { 
            $admin->fill([
             'password' => Hash::make($request->admin_profile_new_password)
             ])->save();
         
             return redirect()->back()->with('adminPasswordUpdateSuccessMSG', 'Updated Successfully');
             
        } else {
            return redirect()->back()->with('adminPasswordUpdateFailureMSG', 'The current password is incorrect');
        }
    }


}
