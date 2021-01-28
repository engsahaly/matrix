<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Clinic ;
use Illuminate\Support\Facades\Validator;

class ClinicController extends Controller
{
    // frontend
    public static function allClinics() {
        $clinics = Clinic::where('status', '1')->orderby('id', 'desc')->with(['doctor'])->get() ;
        return $clinics ;
    }
    
    public function index() {
        $clinics = Clinic::orderby('id', 'desc')->get() ;
        return view("default.doctor.doctorClinics", compact(['clinics']) );
    }

    public function store(Request $request) {
        // get all data
        $doctor_clinic_add_fees         = $request->input('doctor_clinic_add_fees');
        $doctor_clinic_add_speciality   = $request->input('doctor_clinic_add_speciality');
        $doctor_clinic_add_location     = $request->input('doctor_clinic_add_location');
        $doctor_clinic_add_description  = $request->input('doctor_clinic_add_description');
        $doctor_clinic_add_doctor_id    = $request->input('doctor_clinic_add_doctor_id');
   
        $rules = [
            'doctor_clinic_add_fees'       => 'required|numeric|min:1',
            'doctor_clinic_add_speciality'       => 'required',
            'doctor_clinic_add_location'       => 'required',            
            'doctor_clinic_add_description'       => 'nullable',                        
        ];

        $messages = [
            'doctor_clinic_add_fees.required'=>"Please provide valid fees" ,
            'doctor_clinic_add_speciality.required'=>"Please provide valid speciality" ,
            'doctor_clinic_add_location.required'=>"Please provide valid location" ,
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $errors = $validator->errors();

        if (count($errors) > 0) {
            return response()->json(['doctor_clinic_add_errors'=>$errors]);
        } else {
            // save data into clinics table
            $newClinic                = new Clinic();
            $newClinic->fees          = $doctor_clinic_add_fees;
            $newClinic->speciality    = $doctor_clinic_add_speciality;
            $newClinic->location      = $doctor_clinic_add_location;
            $newClinic->description   = $doctor_clinic_add_description;
            $newClinic->status        = '0';
            $newClinic->doctor_id     = $doctor_clinic_add_doctor_id;
            $success = $newClinic->save();          

            if ($success) {
                return response()->json(['doctor_clinic_add_success'=>'Added Successfully']);
            } else {
                return response()->json(['doctor_clinic_add_errors_single'=>'There is something wrong .. Please try again later!']);
            }
        }
    }

    public function delete(Request $request) {
        $clinic = Clinic::find($request->input('id')) ;            
        $success = $clinic->delete() ;

        if ($success) {
            return response()->json(['doctor_clinic_delete_success'=>'Deleted Successfully']);
        } else {
            return response()->json(['doctor_clinic_delete_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    public function showEditForm(Request $request) {         
        $clinic = Clinic::find($request->input('id')) ;
        return response()->json($clinic);
    }

    public function update(Request $request) {
        // get all data
        $doctor_clinic_edit_fees         = $request->input('doctor_clinic_edit_fees');
        $doctor_clinic_edit_speciality   = $request->input('doctor_clinic_edit_speciality');
        $doctor_clinic_edit_location     = $request->input('doctor_clinic_edit_location');
        $doctor_clinic_edit_description  = $request->input('doctor_clinic_edit_description');
        $doctor_clinic_edit_id           = $request->input('doctor_clinic_edit_id');
   
        $rules = [
            'doctor_clinic_edit_fees'       => 'required|numeric|min:1',
            'doctor_clinic_edit_speciality'       => 'required',
            'doctor_clinic_edit_location'       => 'required',            
            'doctor_clinic_edit_description'       => 'nullable',                        
        ];

        $messages = [
            'doctor_clinic_edit_fees.required'=>"Please provide valid fees" ,
            'doctor_clinic_edit_speciality.required'=>"Please provide valid speciality" ,
            'doctor_clinic_edit_location.required'=>"Please provide valid location" ,
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $errors = $validator->errors();

        if (count($errors) > 0) {
            return response()->json(['doctor_clinic_edit_errors'=>$errors]);
        } else {
            // save data into experience table
            $currentClinic                = Clinic::find($doctor_clinic_edit_id );
            $currentClinic->fees          = $doctor_clinic_edit_fees;
            $currentClinic->speciality    = $doctor_clinic_edit_speciality;
            $currentClinic->location      = $doctor_clinic_edit_location;
            $currentClinic->description   = $doctor_clinic_edit_description;            
            $success = $currentClinic->save();

            if ($success) {
                return response()->json(['doctor_clinic_edit_success'=>'Updated Successfully']);
            } else {
                return response()->json(['doctor_clinic_edit_errors_single'=>'There is something wrong .. Please try again later!']);
            }
        }
    }



    // clinics for admins to approve or not
    public function clinicsForAdmin() {
        $clinics = Clinic::orderby('id', 'desc')->get() ;
        return view("default.admin.adminClinics", compact(['clinics']) );
    }

    public function approve(Request $request) {
        $clinic = Clinic::find($request->input('id')) ;        
        $clinic->status = '1' ;
        $success = $clinic->save() ;

        if ($success) {
            return response()->json(['admin_clinic_approve_success'=>'Updated Successfully']);
        } else {
            return response()->json(['admin_clinic_approve_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    public function decline(Request $request) {
        $clinic = Clinic::find($request->input('id')) ;
        $clinic->status = '0' ;
        $success = $clinic->save() ;

        if ($success) {
            return response()->json(['admin_clinic_decline_success'=>'Updated Successfully']);
        } else {
            return response()->json(['admin_clinic_decline_error'=>'There is something wrong .. Please try again later!']);
        }
    }

}
