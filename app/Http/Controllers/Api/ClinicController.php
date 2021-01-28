<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ClinicResource ;
use App\Models\Doctor;
use App\Models\Clinic;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ClinicController extends Controller
{
    /**
     * Get all clinics with doctor - API
     */
    public function index() {
        $clinics = Clinic::with('doctor')->get() ;
        return ClinicResource::collection($clinics) ;
    }

}
