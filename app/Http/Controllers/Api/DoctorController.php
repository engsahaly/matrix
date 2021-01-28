<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DoctorResource ;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class DoctorController extends Controller
{
    /**
     * Get all doctors
     */
    public function index() {
        $doctors = Doctor::all() ;
        return DoctorResource::collection($doctors) ;
    }


}
