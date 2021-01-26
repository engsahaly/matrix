@extends('default.adminMaster')

@section('seoTitle','Social Links')
@section('s_aboutInfo','active')
@section('s_aboutInfo_social','active')
@section('s_aboutInfo_showCollapsed','show')

@section('mainContents')

    <div class="content">
        <div class="page-inner">            

            <!-- main page Content -->
            @if (isset($about) > 0)
            <div class="row">                
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
                                        <button type="button" class="btn btn-danger" id="update_admin_about_social" aria-label="Update">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            @else 
            <div class="alert alert-danger text-danger">
                No Social Links found ...
            </div>
            @endif

        </div>
    </div>










<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    

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

});
</script>



@endsection