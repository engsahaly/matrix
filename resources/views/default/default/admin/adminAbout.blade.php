@extends('default.adminMaster')

@section('seoTitle','About Info')
@section('s_aboutInfo','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <!-- main page header -->
            <div class="page-header">
                <h4 class="page-title">About Info</h4>
                <ul class="breadcrumbs">
                    <li class="nav-home">
                        <a href="{{ route('admin.home') }}">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <span>About Info</span>
                    </li>                    
                </ul>
            </div>

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
                                        <button type="button" class="btn btn-danger" id="update_admin_about_basic">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- contact info card -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Contact Info</h4>
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.about.updateContact') }}" method="post" id="admin_about_contact_form">
                                <div id="admin_about_contact_alert_div">
                                    <ul></ul>
                                </div>
                                <div class="row">                                    

                                    @csrf

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_contact_address_01">Address 1</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_contact_address_01" id="admin_about_contact_address_01" value="{{ $about->address_01 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_contact_phone_01">Phone 1</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_contact_phone_01" id="admin_about_contact_phone_01" value="{{ $about->phone_01 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_contact_email_01">Email 1</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="email" class="form-control" name="admin_about_contact_email_01" id="admin_about_contact_email_01" value="{{ $about->email_01 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_contact_address_02">Address 2</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_contact_address_02" id="admin_about_contact_address_02" value="{{ $about->address_02 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_contact_phone_02">Phone 2</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_contact_phone_02" id="admin_about_contact_phone_02" value="{{ $about->phone_02 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_contact_email_02">Email 2</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="email" class="form-control" name="admin_about_contact_email_02" id="admin_about_contact_email_02" value="{{ $about->email_02 }}">                                        
                                    </div>
                                    

                                    <div class="form-group col-12 text-right">
                                        <button type="button" class="btn btn-danger" id="update_admin_about_contact">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- social links card -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Social Links</h4>
                            
                        </div>
                        <div class="card-body">
                            
                            <form action="{{ route('admin.about.updateSocial') }}" method="post" id="admin_about_social_form">
                                <div id="admin_about_social_alert_div">
                                    <ul></ul>
                                </div>
                                <div class="row">                                    

                                    @csrf

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_facebook">Facebook</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="url" class="form-control" name="admin_about_social_facebook" id="admin_about_social_facebook" value="{{ $about->facebook }}">                                        
                                    </div>                                    

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_twitter">Twitter</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_twitter" id="admin_about_social_twitter" value="{{ $about->twitter }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_linkedin">linkedin</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_linkedin" id="admin_about_social_linkedin" value="{{ $about->linkedin }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_youtube">youtube</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_youtube" id="admin_about_social_youtube" value="{{ $about->youtube }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_pinterest">pinterest</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_pinterest" id="admin_about_social_pinterest" value="{{ $about->pinterest }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_instagram">instagram</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_instagram" id="admin_about_social_instagram" value="{{ $about->instagram }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_behance">behance</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_behance" id="admin_about_social_behance" value="{{ $about->behance }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_dribble">dribble</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_dribble" id="admin_about_social_dribble" value="{{ $about->dribble }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_skype">skype</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_skype" id="admin_about_social_skype" value="{{ $about->skype }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_soundcloud">soundcloud</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_soundcloud" id="admin_about_social_soundcloud" value="{{ $about->soundcloud }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_vimeo">vimeo</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_vimeo" id="admin_about_social_vimeo" value="{{ $about->vimeo }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_tumblr">tumblr</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_tumblr" id="admin_about_social_tumblr" value="{{ $about->tumblr }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_snapchat">snapchat</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_snapchat" id="admin_about_social_snapchat" value="{{ $about->snapchat }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_reddit">reddit</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_reddit" id="admin_about_social_reddit" value="{{ $about->reddit }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_social_flickr">flickr</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_social_flickr" id="admin_about_social_flickr" value="{{ $about->flickr }}">                                        
                                    </div>

                                    <div class="form-group col-12 text-right">
                                        <button type="button" class="btn btn-danger" id="update_admin_about_social">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                <!-- Images card -->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Images</h4>
                            
                        </div>
                        <div class="card-body">

                            <form action="#" method="post" id="admin_about_images_form" enctype="multipart/form-data">
                                <div id="admin_about_images_alert_div">
                                    <ul></ul>
                                </div>
                                <div class="row">                                    

                                    @csrf

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_background_image">Background Image</label>
                                        <br>
                                        <input type="file" id="admin_about_images_background_image" name="admin_about_images_background_image">
                                        <!-- <small class="text-muted" for="admin_about_images_background_image">Recommended formats pdf/doc/image</small> -->
                                        @if ($about->background_image != null || $about->background_image != '')
                                        <p>
                                        <small class="text-danger mr-2">{{ substr($about->background_image, 11) }}</small>
                                        <a href="#" data-toggle="modal" data-target="#deleteFileModal" data-field="images_background_image" class="deleteFileClass"><i class="fas fa-times"></i></a>
                                        </p>
                                        @endif                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_about_image">About Image</label>
                                        <br>
                                        <input type="file" id="admin_about_images_about_image" name="admin_about_images_about_image">
                                        <!-- <small class="text-muted" for="admin_about_images_about_image">Recommended formats pdf/doc/image</small> -->
                                        @if ($about->about_image != null || $about->about_image != '')
                                        <p>
                                        <small class="text-danger mr-2">{{ substr($about->about_image, 11) }}</small>
                                        <a href="#" data-toggle="modal" data-target="#deleteFileModal" data-field="images_about_image" class="deleteFileClass"><i class="fas fa-times"></i></a>
                                        </p>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_cv">Resume</label>
                                        <br>
                                        <input type="file" id="admin_about_images_cv" name="admin_about_images_cv">
                                        <!-- <small class="text-muted" for="admin_about_images_cv">Recommended formats pdf/doc/image</small> -->
                                        @if ($about->cv != null || $about->cv != '')
                                        <p>
                                        <small class="text-danger mr-2">{{ substr($about->cv, 11) }}</small>
                                        <a href="#" data-toggle="modal" data-target="#deleteFileModal" data-field="images_cv" class="deleteFileClass"><i class="fas fa-times"></i></a>
                                        </p>
                                        @endif                                        
                                    </div>  

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_image_01">Image 1</label>
                                        <br>
                                        <input type="file" id="admin_about_images_image_01" name="admin_about_images_image_01">
                                        <!-- <small class="text-muted" for="admin_about_images_image_01">Recommended formats pdf/doc/image</small> -->
                                        @if ($about->image_01 != null || $about->image_01 != '')
                                        <p>
                                        <small class="text-danger mr-2">{{ substr($about->image_01, 11) }}</small>
                                        <a href="#" data-toggle="modal" data-target="#deleteFileModal" data-field="images_image_01" class="deleteFileClass"><i class="fas fa-times"></i></a>
                                        </p>
                                        @endif                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_image_02">Image 2</label>
                                        <br>
                                        <input type="file" id="admin_about_images_image_02" name="admin_about_images_image_02">
                                        <!-- <small class="text-muted" for="admin_about_images_image_02">Recommended formats pdf/doc/image</small> -->
                                        @if ($about->image_02 != null || $about->image_02 != '')
                                        <p>
                                        <small class="text-danger mr-2">{{ substr($about->image_02, 11) }}</small>
                                        <a href="#" data-toggle="modal" data-target="#deleteFileModal" data-field="images_image_02" class="deleteFileClass"><i class="fas fa-times"></i></a>
                                        </p>
                                        @endif                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_image_03">Image 3</label>
                                        <br>
                                        <input type="file" id="admin_about_images_image_03" name="admin_about_images_image_03">
                                        <!-- <small class="text-muted" for="admin_about_images_image_03">Recommended formats pdf/doc/image</small> -->
                                        @if ($about->image_03 != null || $about->image_03 != '')
                                        <p>
                                        <small class="text-danger mr-2">{{ substr($about->image_03, 11) }}</small>
                                        <a href="#" data-toggle="modal" data-target="#deleteFileModal" data-field="images_image_03" class="deleteFileClass"><i class="fas fa-times"></i></a>
                                        </p>
                                        @endif
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_text_image_01">Text Image 1</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_images_text_image_01" id="admin_about_images_text_image_01" value="{{ $about->text_image_01 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_text_image_02">Text Image 2</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_images_text_image_02" id="admin_about_images_text_image_02" value="{{ $about->text_image_02 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_text_image_03">Text Image 3</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_about_images_text_image_03" id="admin_about_images_text_image_03" value="{{ $about->text_image_03 }}">                                        
                                    </div>

                                    <div class="form-group col-12 text-right">
                                        <button type="button" class="btn btn-danger" id="update_admin_about_images">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @else 
            <div class="alert alert-danger text-danger">
                No About Details found ...
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

    // AJAX REQUEST FOR EDITING ABOUT CONTACT INFO    
    var contact_form_original_data = $("#admin_about_contact_form").serialize(); 
    $(document).on('click', "#update_admin_about_contact", function () {  

        if($("#admin_about_contact_form").serialize() != contact_form_original_data) {
            // get form and its dependences 
            var theForm = $("#admin_about_contact_form");
            var formAction = theForm[0].action;
            var formMethod = theForm[0].method;
            var formData = theForm.serialize();
            //   console.log(formData);
            //   console.log(formAction);
            //   console.log(formMethod);
            
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
                    $("#admin_about_contact_alert_div").empty() ;
                    $("#admin_about_contact_alert_div").removeClass() ;
                    
                    //console.log('hello');
                    if (data['admin_about_contact_errors']) {

                        $("#admin_about_contact_alert_div").addClass('col-12 alert alert-danger text-danger') ;                  
                        $.each( data['admin_about_contact_errors'] , function( key, value ) {
                        $("#admin_about_contact_alert_div").append("<li>" + value + "</li>") ;
                        });

                    }               
                    if (data['admin_about_contact_success']) {

                        $("#admin_about_contact_alert_div").addClass('col-12 alert alert-success text-success') ;
                        $("#admin_about_contact_alert_div").append("<li>" + data['admin_about_contact_success'] + "</li>") ;
                        setTimeout(function(){// wait for 5 secs(2)
                            //location.reload(); // then reload the page.(3)
                            //$("#admin_about_form").load(window.location.href + " #admin_about_form");
                            $("#admin_about_contact_form").load(" #admin_about_contact_form > *");
                        }, 800);
                        contact_form_original_data = $("#admin_about_contact_form").serialize(); 

                    }
                },
                error: function(){
                    alert("failed .. Please try again !");
                }
            }) ; 
        } else {
            // empty div for alert
            $("#admin_about_contact_alert_div").empty() ;
            $("#admin_about_contact_alert_div").removeClass() ;
            $("#admin_about_contact_alert_div").addClass('col-12 alert alert-danger text-danger') ;
            $("#admin_about_contact_alert_div").append("<li>" + "No changing in data !" + "</li>") ;
        }

    }) ;

    // AJAX REQUEST FOR EDITING ABOUT SOCIAL INFO
    var social_form_original_data = $("#admin_about_social_form").serialize();
    $(document).on('click', "#update_admin_about_social", function () {  

        if($("#admin_about_social_form").serialize() != social_form_original_data) {
            // get form and its dependences 
            var theForm = $("#admin_about_social_form");
            var formAction = theForm[0].action;
            var formMethod = theForm[0].method;
            var formData = theForm.serialize();
            //var formData = new FormData($('#admin_about_basic_form')[0]);
            //   console.log(formData);
            //   console.log(formAction);
            //   console.log(formMethod);
            
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
                    $("#admin_about_social_alert_div").empty() ;
                    $("#admin_about_social_alert_div").removeClass() ;
                    
                    if (data['admin_about_social_errors']) {

                        $("#admin_about_social_alert_div").addClass('col-12 alert alert-danger text-danger') ;                  
                        $.each( data['admin_about_social_errors'] , function( key, value ) {
                        $("#admin_about_social_alert_div").append("<li>" + value + "</li>") ;
                        });

                    }                    
                    if (data['admin_about_social_success']) {

                        $("#admin_about_social_alert_div").addClass('col-12 alert alert-success text-success') ;
                        $("#admin_about_social_alert_div").append("<li>" + data['admin_about_social_success'] + "</li>") ;
                        setTimeout(function(){// wait for 5 secs(2)
                            //location.reload(); // then reload the page.(3)
                            //$("#admin_about_form").load(window.location.href + " #admin_about_form");
                            $("#admin_about_social_form").load(" #admin_about_social_form > *");
                        }, 800);
                        social_form_original_data = $("#admin_about_social_form").serialize();

                    }
                },
                error: function(){
                    alert("failed .. Please try again !");
                }
            }) ; 
        } else {
            // empty div for alert
            $("#admin_about_social_alert_div").empty() ;
            $("#admin_about_social_alert_div").removeClass() ;
            $("#admin_about_social_alert_div").addClass('col-12 alert alert-danger text-danger') ;
            $("#admin_about_social_alert_div").append("<li>" + "No changing in data !" + "</li>") ;
        }        

    }) ;











    // AJAX REQUEST FOR EDITING ABOUT INFO
    $(document).on('click', "#update_admin_about", function () {  
      // get form and its dependences 
      var theForm = $("#admin_about_form");
      var formAction = theForm[0].action;      
      var formMethod = theForm[0].method;   
      //var formData = theForm.serialize();   
      var formData = new FormData($('#admin_about_form')[0]);
      // console.log(formData);
      // console.log(formAction);
      // console.log(formMethod);
        
      // send ajax request
      $.ajax({
          url: formAction ,
          method: formMethod ,                             
          data: formData ,
          processData: false,
          contentType: false,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: "json",
          success: function(data){            
              // empty div for alert
              $("#admin_about_alert_div").empty() ;
              $("#admin_about_alert_div").removeClass() ;
              
              //console.log('hello');
              if (data['admin_about_update_errors']) {

                  $("#admin_about_alert_div").addClass('col-12 alert alert-danger') ;                  
                  $.each( data['admin_about_update_errors'] , function( key, value ) {
                    $("#admin_about_alert_div").append("<li>" + value + "</li>") ;
                  });

              }
              if (data['admin_about_update_errors_single']) {

                  $("#admin_about_alert_div").addClass('col-12 alert alert-danger') ;
                  $("#admin_about_alert_div").append("<li>" + data['admin_about_update_errors_single'] + "</li>") ;

              } 
              if (data['admin_about_update_success']) {

                  $("#admin_about_alert_div").addClass('col-12 alert alert-success') ;
                  $("#admin_about_alert_div").append("<li>" + data['admin_about_update_success'] + "</li>") ;
                  setTimeout(function(){// wait for 5 secs(2)
                      //location.reload(); // then reload the page.(3)
                      //$("#admin_about_form").load(window.location.href + " #admin_about_form");
                      $("#admin_about_form").load(" #admin_about_form > *");
                  }, 800);

              }
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ; 

    }) ;

    //SCRIPT FOR DELETE FILE
    $(document).on('click', ".deleteFileClass", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentFieldForDelete = $(this).attr("data-field");
        $("#deleteFileHref").attr("href" , currentHrefForDelete );
        $("#deleteFileHref").attr("data-field" , currentFieldForDelete );
    }) ;

    // AJAX REQUEST FOR DELETING FILE
    $(document).on('click', "#deleteFileHref", function (e) {  
      e.preventDefault();

      // get form and its dependences
      var formAction = $(this).attr("href");
      var field = $(this).attr("data-field");
      //console.log(formAction);
      //console.log(formData);
      //console.log(formMethod);
        
      // send ajax request
      $.ajax({
          url: formAction ,
          method: 'POST' ,
          data: { 
            field : field ,
          } ,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: "json",
          success: function(data){   
              $("#delete_alert_div").removeClass() ; 
            
              if (data['delete_success']) {
                  $("#delete_alert_div").addClass('alert alert-success m-1') ;
                  $("#delete_alert_div").append("<p>" + data['delete_success'] + "</p>") ;
                  setTimeout(function(){// wait for 2 secs(2)                      
                      $('#deleteFileModal').modal('toggle');
                      $("#deleteFileModal").load(" #deleteFileModal > *");
                      $("#admin_about_form").load(" #admin_about_form > *");
                  }, 500);
              } else {
                  $("#delete_alert_div").addClass('alert alert-danger m-1') ;
                  $("#delete_alert_div").append("<p>" + data['delete_error'] + "</p>") ;
              }
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ; 

    }) ;

});
</script>



@endsection