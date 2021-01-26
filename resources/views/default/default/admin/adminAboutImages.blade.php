@extends('default.adminMaster')

@section('seoTitle','Images')
@section('s_aboutInfo','active')
@section('s_aboutInfo_images','active')
@section('s_aboutInfo_showCollapsed','show')

@section('mainContents')

    <div class="content">
        <div class="page-inner">           

            <!-- main page Content -->
            @if (isset($about) > 0)
            <div class="row">               
                <!-- Images card Update-->
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Images</h4>
                            
                        </div>
                        <div class="card-body">

                            <form action="{{ route('admin.about.updateImages') }}" method="post" id="admin_about_images_form" enctype="multipart/form-data">
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
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_about_image">About Image</label>
                                        <br>
                                        <input type="file" id="admin_about_images_about_image" name="admin_about_images_about_image">
                                        <!-- <small class="text-muted" for="admin_about_images_about_image">Recommended formats pdf/doc/image</small> -->                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_cv">Resume</label>
                                        <br>
                                        <input type="file" id="admin_about_images_cv" name="admin_about_images_cv">
                                        <!-- <small class="text-muted" for="admin_about_images_cv">Recommended formats pdf/doc/image</small> -->                                                                         
                                    </div>  

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_video">Video</label>
                                        <br>
                                        <input type="file" id="admin_about_images_video" name="admin_about_images_video">
                                        <!-- <small class="text-muted" for="admin_about_images_video">Recommended formats pdf/doc/image</small> -->                                       
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_image_01">Image 1</label>
                                        <br>
                                        <input type="file" id="admin_about_images_image_01" name="admin_about_images_image_01">
                                        <!-- <small class="text-muted" for="admin_about_images_image_01">Recommended formats pdf/doc/image</small> -->                                                                              
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_image_02">Image 2</label>
                                        <br>
                                        <input type="file" id="admin_about_images_image_02" name="admin_about_images_image_02">
                                        <!-- <small class="text-muted" for="admin_about_images_image_02">Recommended formats pdf/doc/image</small> -->                                                                               
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_images_image_03">Image 3</label>
                                        <br>
                                        <input type="file" id="admin_about_images_image_03" name="admin_about_images_image_03">
                                        <!-- <small class="text-muted" for="admin_about_images_image_03">Recommended formats pdf/doc/image</small> -->                                        
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

                 <!-- Images card preview-->
                @if ($about->background_image != null || $about->about_image != null || $about->cv != null || $about->image_01 != null || $about->image_02 != null || $about->image_03 != null)
                    <div class="col-md-12" id="admin_about_images_preview">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Images Preview</h4>
                                
                            </div>
                            <div class="card-body">

                                <div class="row">

                                    @if ($about->background_image != null || $about->background_image != '')
                                    <div class="card col-4">
                                        <p class="text-primary">Background Image</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $about->background_image }}" alt="background_image" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($about->background_image, 11) }}</span>
                                            <a href="{{ route('admin.about.downloadFile', ['field' => 'background_image']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.about.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="background_image" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($about->about_image != null || $about->about_image != '')
                                    <div class="card col-4">
                                        <p class="text-primary">About Image</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $about->about_image }}" alt="about_image" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($about->about_image, 11) }}</span>
                                            <a href="{{ route('admin.about.downloadFile', ['field' => 'about_image']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.about.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="about_image" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($about->cv != null || $about->cv != '')
                                    <div class="card col-4">
                                        <p class="text-primary">CV</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/default.jpg" alt="cv" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($about->cv, 11) }}</span>
                                            <a href="{{ route('admin.about.downloadFile', ['field' => 'cv']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.about.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="cv" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($about->image_01 != null || $about->image_01 != '')
                                    <div class="card col-4">
                                        <p class="text-primary">Image 1</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $about->image_01 }}" alt="image_01" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($about->image_01, 11) }}</span>
                                            <a href="{{ route('admin.about.downloadFile', ['field' => 'image_01']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.about.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="image_01" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($about->image_02 != null || $about->image_02 != '')
                                    <div class="card col-4">
                                        <p class="text-primary">Image 2</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $about->image_02 }}" alt="image_02" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($about->image_02, 11) }}</span>
                                            <a href="{{ route('admin.about.downloadFile', ['field' => 'image_02']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.about.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="image_02" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
                                        </div>
                                    </div>
                                    @endif

                                    @if ($about->image_03 != null || $about->image_03 != '')
                                    <div class="card col-4">
                                        <p class="text-primary">Image 3</p>
                                        <img class="card-img-top" src="{{ asset('storage') }}/{{ $about->image_03 }}" alt="image_03" style="height:150px;">
                                        <div class="card-body">
                                            <span>{{ substr($about->image_03, 11) }}</span>
                                            <a href="{{ route('admin.about.downloadFile', ['field' => 'image_03']) }}" class="btn btn-primary btn-xs ml-1" style="float:right;"><i class="fas fa-download"></i></a>
                                            <a href="{{ route('admin.about.deleteFile') }}" class="btn btn-danger btn-xs ml-1 deleteFileClass" data-field="image_03" data-toggle="modal" data-target="#deleteFileModal" style="float:right;"><i class="fas fa-trash-alt"></i></a>
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
                No Images Details found ...
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
       
    // AJAX REQUEST FOR EDITING ABOUT IMAGES INFO    
    $(document).on('click', "#update_admin_about_images", function () {  
            var empty = 0;  
            // get form and its dependences 
            var theForm = $("#admin_about_images_form");
            var formAction = theForm[0].action;
            var formMethod = theForm[0].method;            
            var formData = new FormData($('#admin_about_images_form')[0]);
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
                $("#admin_about_images_alert_div").empty() ;
                $("#admin_about_images_alert_div").removeClass() ;
                $("#admin_about_images_alert_div").addClass('col-12 alert alert-danger text-danger') ;
                $("#admin_about_images_alert_div").append("<li>" + "Empty Fields !" + "</li>") ;              
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
                        $("#admin_about_images_alert_div").empty() ;
                        $("#admin_about_images_alert_div").removeClass() ;
                        
                        if (data['admin_about_images_errors']) {

                            $("#admin_about_images_alert_div").addClass('col-12 alert alert-danger text-danger') ;                  
                            $.each( data['admin_about_images_errors'] , function( key, value ) {
                                $("#admin_about_images_alert_div").append("<li>" + value + "</li>") ;
                            });

                        }
                        if (data['admin_about_images_success']) {

                            $("#admin_about_images_alert_div").addClass('col-12 alert alert-success text-success') ;
                            $("#admin_about_images_alert_div").append("<li>" + data['admin_about_images_success'] + "</li>") ;
                            setTimeout(function(){// wait for 5 secs(2)                                
                                $("#admin_about_images_form").load(" #admin_about_images_form > *");
                                $("#admin_about_images_preview").load(" #admin_about_images_preview > *");
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
                      $("#admin_about_images_preview").load(" #admin_about_images_preview > *");
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