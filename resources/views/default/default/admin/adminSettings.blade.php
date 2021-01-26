@extends('default.adminMaster')

@section('seoTitle','Settings')
@section('s_settings','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">           

            <!-- main page Content -->
            @if (isset($settings))
            <div class="row">               
                <!-- Images card Update-->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Settings</h4>
                            
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.settings.update') }}" method="post" id="admin_settings_form" enctype="multipart/form-data">
                                <div id="admin_settings_alert_div">
                                    <ul></ul>
                                </div>
                                <div class="row">

                                    @csrf

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_name">Site Name</label>                                        
                                        <input type="text" id="admin_settings_name" name="admin_settings_name" class="form-control" value="{{ $settings->name }}">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_fav_icon">Fav Icon</label>
                                        <br>
                                        <input type="file" id="admin_settings_fav_icon" name="admin_settings_fav_icon" class="form-control">
                                        <!-- <small class="text-muted" for="admin_settings_fav_icon">Recommended formats pdf/doc/image</small> -->                                                                              
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_front_logo">Front Logo</label>
                                        <br>
                                        <input type="file" id="admin_settings_front_logo" name="admin_settings_front_logo" class="form-control">
                                        <!-- <small class="text-muted" for="admin_settings_front_logo">Recommended formats pdf/doc/image</small> -->
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_back_logo">Back Logo</label>
                                        <br>
                                        <input type="file" id="admin_settings_back_logo" name="admin_settings_back_logo" class="form-control">
                                        <!-- <small class="text-muted" for="admin_settings_back_logo">Recommended formats pdf/doc/image</small> --> 
                                    </div>  

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_copyright">Copyright</label>
                                        <input type="text" id="admin_settings_copyright" name="admin_settings_copyright" class="form-control" value="{{ $settings->copyright }}">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_seo_site_name">Seo Site Name</label>
                                        <input type="text" id="admin_settings_seo_site_name" name="admin_settings_seo_site_name" class="form-control" value="{{ $settings->seo_site_name }}"> 
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_seo_keywords">Seo Keywords</label>
                                        <small class="text-muted">(Separated with commas)</small>
                                        <input type="text" id="admin_settings_seo_keywords" name="admin_settings_seo_keywords" class="form-control" value="{{ $settings->seo_keywords }}">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_seo_description">Seo Description</label>
                                        <input type="text" id="admin_settings_seo_description" name="admin_settings_seo_description" class="form-control" value="{{ $settings->seo_description }}">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_seo_site_url">Seo Site URL</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="text" class="form-control" name="admin_settings_seo_site_url" id="admin_settings_seo_site_url" value="{{ $settings->seo_site_url }}">
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_settings_seo_cover_image">Seo Cover Image</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <input type="file" class="form-control" name="admin_settings_seo_cover_image" id="admin_settings_seo_cover_image">
                                    </div>

                                    <div class="form-group col-12 text-right">
                                        <button type="button" class="btn btn-danger" id="update_admin_settings">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>

                 <!-- Images card preview-->
                @if ($settings->fav_icon != null || $settings->front_logo != null || $settings->back_logo != null || $settings->seo_cover_image != null)
                    <div class="col-md-12" id="admin_settings_preview">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Images Preview</h4>
                                
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    @if ($settings->fav_icon != null || $settings->fav_icon != '')
                                    <div class="card col-4">
                                        <p class="text-primary">Fav Icon</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $settings->fav_icon }}" alt="fav_icon" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($settings->fav_icon, 11) }}</span>
                                            <a href="{{ route('admin.settings.downloadFile', ['field' => 'fav_icon']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.settings.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="fav_icon" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($settings->front_logo != null || $settings->front_logo != '')
                                    <div class="card col-4">
                                        <p class="text-primary">Front Logo</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $settings->front_logo }}" alt="front_logo" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($settings->front_logo, 11) }}</span>
                                            <a href="{{ route('admin.settings.downloadFile', ['field' => 'front_logo']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.settings.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="front_logo" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($settings->back_logo != null || $settings->back_logo != '')
                                    <div class="card col-4">
                                        <p class="text-primary">Back Logo</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $settings->back_logo }}" alt="back_logo" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($settings->back_logo, 11) }}</span>
                                            <a href="{{ route('admin.settings.downloadFile', ['field' => 'back_logo']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.settings.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="back_logo" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($settings->seo_cover_image != null || $settings->seo_cover_image != '')
                                    <div class="card col-4">
                                        <p class="text-primary">Seo Cover Image</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $settings->seo_cover_image }}" alt="seo_cover_image" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($settings->seo_cover_image, 11) }}</span>
                                            <a href="{{ route('admin.settings.downloadFile', ['field' => 'seo_cover_image']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.settings.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="seo_cover_image" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                </div>

                            </div>
                        </div>
                    </div>
                @endif
            </div>
            @else 
            <div class="alert alert-danger text-danger">
                No settings found ...
            </div>
            @endif

        </div>
    </div>








<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR DELETE FILE MODAL -->    
<div class="modal fade" id="deleteFileModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div id="delete_alert_div"></div>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete Confirmation</h5>                    
                </div>
                <div class="modal-body">                   
                    Are you sure you want to delete this file ?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" style="margin-left:10px">Close</button>
                    <a href="#" data-field="#" class="btn btn-danger" id="deleteFileHref">Delete</a>
                </div>
            </div>
        </div>
    </div>
<!-- THIS IS FOR DELETE FILE MODAL -->







<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
       
    // AJAX REQUEST FOR EDITING SETTINGS INFO    
    $(document).on('click', "#update_admin_settings", function () {  
            var empty = 0;  
            // get form and its dependences 
            var theForm = $("#admin_settings_form");
            var formAction = theForm[0].action;
            var formMethod = theForm[0].method;            
            var formData = new FormData($('#admin_settings_form')[0]);
            //   console.log(formData);
            //   console.log(formAction);
            //   console.log(formMethod);              
            
            //check if all inputs are empty
            $(theForm).find('input').each(function(index, elem){
                if($(elem).val().length == 0){
                    empty += 1 ;            
                }
            });           

            if (empty == 10) {
                // empty div for alert
                $("#admin_settings_alert_div").empty() ;
                $("#admin_settings_alert_div").removeClass() ;
                $("#admin_settings_alert_div").addClass('col-12 alert alert-danger text-danger') ;
                $("#admin_settings_alert_div").append("<li>" + "Empty Fields !" + "</li>") ;              
            } else {
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
                        $("#admin_settings_alert_div").empty() ;
                        $("#admin_settings_alert_div").removeClass() ;
                        
                        if (data['admin_settings_errors']) {

                            $("#admin_settings_alert_div").addClass('col-12 alert alert-danger text-danger') ;                  
                            $.each( data['admin_settings_errors'] , function( key, value ) {
                                $("#admin_settings_alert_div").append("<li>" + value + "</li>") ;
                            });

                        }
                        if (data['admin_settings_success']) {

                            $("#admin_settings_alert_div").addClass('col-12 alert alert-success text-success') ;
                            $("#admin_settings_alert_div").append("<li>" + data['admin_settings_success'] + "</li>") ;
                            setTimeout(function(){// wait for 5 secs(2)                                
                                $("#admin_settings_form").load(" #admin_settings_form > *");
                                $("#admin_settings_preview").load(" #admin_settings_preview > *");
                            }, 800);

                        }
                    },
                    error: function(){
                        alert("failed .. Please try again !");
                    }
                }) ; 
            }
        

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
                  $("#delete_alert_div").addClass('alert alert-success text-success') ;
                  $("#delete_alert_div").append("<p>" + data['delete_success'] + "</p>") ;
                  setTimeout(function(){// wait for 0.5 secs
                      $('#deleteFileModal').modal('toggle');
                      $("#deleteFileModal").load(" #deleteFileModal > *");
                      $("#admin_settings_preview").load(" #admin_settings_preview > *");
                  }, 500);
              } else {
                  $("#delete_alert_div").addClass('alert alert-danger text-danger') ;
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