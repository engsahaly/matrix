<?php
  use \App\Http\Controllers\ClinicController;
  $clinics = ClinicController::allClinics();
?>

@extends('default.master')

@section('seoTitle','Matrix doctors | Home')
@section('s_home','active')

@section('mainContents')

    
    <div class="content">
        <div class="page-inner">            
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($clinics) > 0)
                    @foreach ($clinics as $clinic)
                        <div class="card col-md-4">
                            <div class="card-body">
                                <h5 class="card-title text-primary">{{ $clinic->doctor->name }}</h5>
                                <h6 class="card-subtitle mb-2 text-muted">{{ $clinic->speciality }}</h6>
                                <h6 class="card-subtitle mb-2 text-danger">{{ $clinic->fees }} $</h6>
                                <p class="card-text">{{ $clinic->description }}</p>                                   
                                @if (Auth::guard()->check()) 
                                    @if ( $clinic->reservations->contains('user_id', Auth::user()->id) )                                        
                                        <span class="badge badge-warning user_cancel_class">Pending Confirmation</span>  
                                    @else 
                                        <a href="{{ route('user.reserve') }}" data-id="{{ $clinic->id }}" data-user="{{ Auth::user()->id }}" class="btn btn-sm  btn-success user_reserve_class" data-toggle="modal" data-target="#user_reserve_modal">Reserve</a>
                                    @endif
                                @else
                                    <a href="{{ route('user.login') }}" class="btn btn-sm  btn-success">Reserve</a>
                                @endif
                            </div>
                        </div>
                    @endforeach
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No clinics found ...
                </div>
                @endif
            </div>

        </div>
    </div>








    <!-- ######################################################################### -->
    <!-- ######################################################################### -->
    <!-- THIS IS FOR RESERVE CLINIC MODAL -->
    <div class="modal fade" id="user_reserve_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="user_reserve_modal_header"> Reserve clinic</h5>
                </div>

                <div id="user_reserve_alert_div"></div>

                <div class="modal-body">
                    Are you sure you want to reserve this clinic?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                    <a href="#" data-id="#" data-user="#" class="btn btn-success" id="user_reserve_btn">Confirm</a>
                </div>

            </div>
        </div>
    </div>
    <!-- THIS IS FOR RESERVE CLINIC MODAL -->








    <!-- ######################################################################### -->
    <!-- ######################################################################### -->
    <script>
    $("document").ready(function(){    
        
    //SCRIPT FOR ACCESS RESERVE CLINIC IN MODAL
    $(document).on('click', ".user_reserve_class", function () {    
        // get attribute value of name (clinic id)
        var currentHrefForreserve = $(this).attr("href");
        var currentIdForreserve = $(this).attr("data-id");
        var currentUser = $(this).attr("data-user");
        $("#user_reserve_btn").attr("href" , currentHrefForreserve );
        $("#user_reserve_btn").attr("data-id" , currentIdForreserve );
        $("#user_reserve_btn").attr("data-user" , currentUser );
    }) ;

    // AJAX REQUEST FOR RESERVING CLINIC
    $(document).on('click', "#user_reserve_btn", function (e) {  
        e.preventDefault();

        // get form and its dependences
        var formAction = $(this).attr("href");
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        // console.log(formAction);
        // console.log(id);
        
        // send ajax request
        $.ajax({
            url: formAction ,
            method: 'POST' ,
            data: { 
                id : id ,
                user : user ,
            } ,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function(data){
            $("#user_reserve_alert_div").empty() ;
            $("#user_reserve_alert_div").removeClass() ;

            if (data['user_reserve_success']) {                
                    $('#user_reserve_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#user_reserve_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#user_reserve_alert_div").append("<p>" + data['user_reserve_error'] + "</p>") ;
            }
            },
            error: function() {
                alert("failed .. Please try again !");
            }
        }) ;

    }) ;

    });
    </script>





@endsection