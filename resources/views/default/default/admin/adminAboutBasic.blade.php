@extends('default.adminMaster')

@section('seoTitle','Basic Info')
@section('s_aboutInfo','active')
@section('s_aboutInfo_basic','active')
@section('s_aboutInfo_showCollapsed','show')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <!-- main page Content -->
            @if (isset($about) > 0)
            <div class="row">
                <!-- basic info card -->
                <div class="col-md-12" >
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Basic Info</h4>                    
                        </div>
                        <div class="card-body"> 

                            <form action="{{ route('admin.about.updateBasic') }}" method="post" id="admin_about_basic_form">
                                <div id="admin_about_basic_alert_div">
                                    <ul></ul>
                                </div>
                                <div class="row">                                    

                                    @csrf

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_basic_name">Name</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="admin_about_basic_name" id="admin_about_basic_name" value="{{ $about->name }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_basic_position">Position</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_basic_position" id="admin_about_basic_position" value="{{ $about->position }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_basic_birth_date">Birth Date</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="date" class="form-control" name="admin_about_basic_birth_date" id="admin_about_basic_birth_date" value="{{ $about->birth_date }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_basic_experience_years">Experience Years</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="number" class="form-control" name="admin_about_basic_experience_years" id="admin_about_basic_experience_years" value="{{ $about->experience_years }}" min="1" max="999">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_basic_projects_count">Projects Count</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="number" class="form-control" name="admin_about_basic_projects_count" id="admin_about_basic_projects_count" value="{{ $about->projects_count }}" min="1" max="9999999999">
                                    </div>

                                    <div class="form-group col-12">
                                        <label for="admin_about_basic_about">About</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <textarea class="form-control" name="admin_about_basic_about" id="admin_about_basic_about" rows="5">{{ $about->about }}</textarea>
                                    </div>

                                    <div class="form-group col-12 text-right">
                                        <button type="button" class="btn btn-danger" id="update_admin_about_basic" aria-label="Update">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @else 
            <div class="alert alert-danger text-danger">
                No Basic Info Details found ...
            </div>
            @endif

        </div>
    </div>










<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    

    // AJAX REQUEST FOR EDITING ABOUT BASIC INFO
    var basic_form_original_data = $("#admin_about_basic_form").serialize();    
    $(document).on('click', "#update_admin_about_basic", function () {  

        if($("#admin_about_basic_form").serialize() != basic_form_original_data) {            
            var theForm = $("#admin_about_basic_form");
            var formAction = theForm[0].action;
            var formMethod = theForm[0].method;
            var formData = theForm.serialize();            
            
            // send ajax request
            $.ajax({
                url: formAction ,
                method: formMethod ,
                data: formData ,          
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                dataType: "json",
                success: function(data){            
                    // empty div for alert
                    $("#admin_about_basic_alert_div").empty() ;
                    $("#admin_about_basic_alert_div").removeClass() ;
                    
                    if (data['admin_about_basic_errors']) {

                        $("#admin_about_basic_alert_div").addClass('col-12 alert alert-danger text-danger') ;                  
                        $.each( data['admin_about_basic_errors'] , function( key, value ) {
                        $("#admin_about_basic_alert_div").append("<li>" + value + "</li>") ;
                        });

                    }                   
                    if (data['admin_about_basic_success']) {

                        $("#admin_about_basic_alert_div").addClass('col-12 alert alert-success text-success') ;
                        $("#admin_about_basic_alert_div").append("<li>" + data['admin_about_basic_success'] + "</li>") ;
                        setTimeout(function(){                            
                            $("#admin_about_basic_form").load(" #admin_about_basic_form > *");
                        }, 800);
                        basic_form_original_data = $("#admin_about_basic_form").serialize();

                    }
                },
                error: function(){
                    alert("failed .. Please try again !");
                }
            }) ; 
        } else {
            // empty div for alert
            $("#admin_about_basic_alert_div").empty() ;
            $("#admin_about_basic_alert_div").removeClass() ;
            $("#admin_about_basic_alert_div").addClass('col-12 alert alert-danger text-danger') ;
            $("#admin_about_basic_alert_div").append("<li>" + "No changing in data !" + "</li>") ;
        }

    }) ;

});
</script>



@endsection