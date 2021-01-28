<?php
  use \App\Http\Controllers\ClinicController;
  $clinics = ClinicController::allClinics();
?>

@extends('default.master')

@section('seoTitle','Matrix doctors | Home')
@section('s_home','active')

@section('mainContents')

    <div class="content">       
        
        <div class="page-inner mt-2">
            <div class="row">
                @if (count($clinics) > 0)
                    @foreach ($clinics as $clinic)
                        <div class="card col-md-4">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $clinic->doctor->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $clinic->speciality }}</h6>
                                <h6 class="card-subtitle mb-2 text-danger">{{ $clinic->fees }} $</h6>
                                <p class="card-text">{{ $clinic->description }}</p>
                                <a href="#" class="card-link btn btn-sm btn-primary">Reserve</a>                                
                            </div>
                        </div>
                    @endforeach
                @else 
                    <div class="col-12 alert alert-danger text-danger">
                        No clinics found right now ...
                    </div>
                @endif                    
            </div>
        </div>
    </div>

@endsection