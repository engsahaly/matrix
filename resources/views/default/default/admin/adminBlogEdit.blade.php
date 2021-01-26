@extends('default.adminMaster')

@section('seoTitle','Blog Edit')
@section('s_blog','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Edit Blog</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                      <a href="{{ route('admin.blog') }}" id="back_blog_btn" class="btn btn-primary btn-xs">
                        <i class="fas fa-arrow-left"></i>
                      </a>
                    </div>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                <form action="{{ route('admin.blog.update') }}" method="post" id="admin_blog_edit_form" enctype="multipart/form-data">
                    @csrf
                    <div id="admin_blog_edit_alert_div"></div>

                    <div class="card-body">
                        <div class="row">

                        <div class="col-6 form-group">
                            <label for="admin_blog_edit_name">Name</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="admin_blog_edit_name" name="admin_blog_edit_name" value="{{ $blog->name }}">
                        </div>                       

                        <div class="col-6 form-group">
                            <label for="admin_blog_edit_image">Cover Image</label>
                            <span class="text-danger">*</span>
                            <input type="file" class="form-control" id="admin_blog_edit_image" name="admin_blog_edit_image">
                            <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                        </div>

                        <div class="col-6 form-group">
                            <label for="admin_blog_edit_created_by">Created By</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="admin_blog_edit_created_by" name="admin_blog_edit_created_by" value="{{ $blog->created_by }}">
                        </div>

                        <div class="col-6 form-group">
                            <label for="admin_blog_edit_seo_keywords">Seo Keywords</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="admin_blog_edit_seo_keywords" name="admin_blog_edit_seo_keywords" value="{{ $blog->seo_keywords }}">
                        </div>

                        <div class="col-6 form-group">
                            <label for="admin_blog_edit_seo_description">Seo Description</label>
                            <span class="text-danger">*</span>
                            <input type="text" class="form-control" id="admin_blog_edit_seo_description" name="admin_blog_edit_seo_description" value="{{ $blog->seo_description }}">
                        </div>

                        <div class="col-12 form-group">
                            <label for="admin_blog_edit_text">text</label>
                            <!-- <span class="text-danger">*</span> -->
                            <textarea class="form-control" id="admin_blog_edit_text" name="admin_blog_edit_text" placeholder="text" rows="10">{!! $blog->text !!}</textarea>
                        </div>

                        <input type="hidden" name="admin_blog_edit_id" id="admin_blog_edit_id" value="{{ $blog->id }}">
                        </div>
                    </div>
                                    
                    <div class="modal-footer">                        
                        <button type="button" class="btn btn-primary" id="admin_blog_edit_save_btn">Update</button>
                    </div>
                </form>
            </div>

        </div>
    </div>










<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
    
    // ENABLE CKEDITOR FOR THE TEXTAREA
    CKEDITOR.replace('admin_blog_edit_text');

    // AJAX REQUEST FOR ADDING NEW BLOG
    $(document).on('click', "#admin_blog_edit_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_blog_edit_form");
      var formAction = theForm[0].action;      
      var formMethod = theForm[0].method;   
      var formData = new FormData($('#admin_blog_edit_form')[0]);
      //   append ckeditor data to fornData
      formData.append('admin_blog_edit_text', CKEDITOR.instances['admin_blog_edit_text'].getData());
      //var formData = theForm.serialize();
        //   console.log(formData);
        //   console.log(formAction);
        //   console.log(formMethod);
        //   console.log(text);
      
      //check if all inputs are empty
      $(theForm).find('input').each(function(index, elem){
        if($(elem).val().length == 0){
            empty += 1 ;            
        }
      });
      //check if all textareas are empty
      $(theForm).find('textarea').each(function(index, elem){
        if($(elem).val().length == 0){
            empty += 1 ;            
        }
      });

      if (empty == 6) {
        $("#admin_blog_edit_alert_div").empty() ;
        $("#admin_blog_edit_alert_div").removeClass() ;
        $("#admin_blog_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#admin_blog_edit_alert_div").append("Empty Form!") ;
      } else {        
        //send ajax request
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
                $("#admin_blog_edit_alert_div").empty() ;
                $("#admin_blog_edit_alert_div").removeClass() ;
                        
                if (data['admin_blog_edit_errors']) {
                  $("#admin_blog_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_blog_edit_errors'] , function( key, value ) {
                      $("#admin_blog_edit_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_blog_edit_errors_single']) {
                  $("#admin_blog_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_blog_edit_alert_div").append("<li>" + data['admin_blog_edit_errors_single'] + "</li>") ;
                } 
                if (data['admin_blog_edit_success']) {
                  $("#admin_blog_edit_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_blog_edit_alert_div").append("<li>" + data['admin_blog_edit_success'] + "</li>") ;
                  $("#mainCont").load(" #mainCont > *");
                  setTimeout(function(){
                    $("#admin_blog_edit_alert_div").empty() ;
                    $("#admin_blog_edit_alert_div").removeClass() ;
                  }, 3000);
                }
            },
            error: function(){
                alert("failed .. Please try again !");
            }
        }) ; 
      }

    }) ;

});
</script>








@endsection