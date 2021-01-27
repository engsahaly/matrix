<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Clinic ;
use Illuminate\Support\Facades\Validator;

class ClinicController extends Controller
{
    // frontend
    public static function allClinics() {
        $clinics = Clinic::orderby('id', 'desc')->with(['doctor'])->get() ;
        return $clinics ;
    }

    public function index() {        
        $clinics = Clinic::orderby('id', 'desc')->get() ;
        return view("default.doctor.doctorClinics", compact(['clinics']) );
    }

    

}
