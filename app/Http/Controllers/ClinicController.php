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
        $project = Project::find($request->input('id')) ;
        
        // delete previous uploaded file 
        $images = Image::where('project_id', $project->id)->get() ;

        if (count($images) > 0) {
            foreach ($images as $image) {
                // delete previous uploaded file 
                File::delete("storage/projects/".$image->image);
                $deleteSuccess = $image->delete() ;
            }
        }
        $success = $project->delete() ;

        if ($success) {
            return response()->json(['doctor_clinic_delete_success'=>'Deleted Successfully']);
        } else {
            return response()->json(['doctor_clinic_delete_error'=>'There is something wrong .. Please try again later!']);
        }
    }

    public function showEditForm(Request $request) {         
        $project = Project::find($request->input('id')) ;
        return response()->json($project);
    }

    public function update(Request $request) {
        // get all data
        $doctor_clinic_edit_id           = $request->input('doctor_clinic_edit_id');
        $doctor_clinic_edit_name         = $request->input('doctor_clinic_edit_name');
        $doctor_clinic_edit_created_by   = $request->input('doctor_clinic_edit_created_by');
        $doctor_clinic_edit_client       = $request->input('doctor_clinic_edit_client');
        $doctor_clinic_edit_leader       = $request->input('doctor_clinic_edit_leader');
        $doctor_clinic_edit_developer    = $request->input('doctor_clinic_edit_developer');
        $doctor_clinic_edit_designer     = $request->input('doctor_clinic_edit_designer');
        $doctor_clinic_edit_skills       = $request->input('doctor_clinic_edit_skills');
        $doctor_clinic_edit_link         = $request->input('doctor_clinic_edit_link');
        $doctor_clinic_edit_date         = $request->input('doctor_clinic_edit_date');
        $doctor_clinic_edit_description  = $request->input('doctor_clinic_edit_description');
        $doctor_clinic_edit_service      = $request->input('doctor_clinic_edit_service');
        $doctor_clinic_edit_images       = $request->file('doctor_clinic_edit_images');

        if ($request->input('doctor_clinic_edit_ordering')) {
            $doctor_clinic_edit_ordering         = $request->input('doctor_clinic_edit_ordering');
        } else {
            $doctor_clinic_edit_ordering         = 999 ;
        }

        $rules = [
            'doctor_clinic_edit_name'       => 'required',            
            'doctor_clinic_edit_images.*'       => 'mimes:jpeg,png,jpg,gif|max:2048',
            'doctor_clinic_edit_service'       => 'required',
            'doctor_clinic_edit_ordering'       => 'numeric|min:1|max:999|nullable',
        ];

        $messages = [
            'doctor_clinic_edit_name.required'=>"Please provide valid project name" ,
            'doctor_clinic_edit_service.required'=>"Please choose valid service" ,
            'doctor_clinic_edit_images.required'=>"Please provide valid project images" ,
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        $errors = $validator->errors();

        if (count($errors) > 0) {
            return response()->json(['doctor_clinic_edit_errors'=>$errors]);
        } else {
            // save data into experience table
            $currentProject               = Project::find($doctor_clinic_edit_id );
            $currentProject->name         = $doctor_clinic_edit_name;
            $currentProject->created_by   = $doctor_clinic_edit_created_by;
            $currentProject->client       = $doctor_clinic_edit_client;
            $currentProject->leader       = $doctor_clinic_edit_leader;
            $currentProject->developer    = $doctor_clinic_edit_developer;
            $currentProject->designer     = $doctor_clinic_edit_designer;
            $currentProject->skills       = $doctor_clinic_edit_skills;
            $currentProject->link         = $doctor_clinic_edit_link;
            $currentProject->date         = $doctor_clinic_edit_date;
            $currentProject->description  = $doctor_clinic_edit_description;
            $currentProject->ordering     = $doctor_clinic_edit_ordering;
            $currentProject->service_id   = $doctor_clinic_edit_service;
            $success = $currentProject->save();

            // add project images to DB table
            if ($request->hasFile('doctor_clinic_edit_images')) {
                $files = $request->file('doctor_clinic_edit_images');
                foreach ($files as $file) {
                    $newImage = new Image() ;
                    $name = time().'-'.$file->getClientOriginalName();
                    $destinationPath = public_path('storage/projects');
                    $file->move($destinationPath, $name);
                    $newImage->image = $name ;   // save name to DB
                    $newImage->project_id = $currentProject->id ;
                    $newImage->save() ;
                }
            }


            if ($success) {
                return response()->json(['doctor_clinic_edit_success'=>'Updated Successfully']);
            } else {
                return response()->json(['doctor_clinic_edit_errors_single'=>'There is something wrong .. Please try again later!']);
            }
        }
    }

}
