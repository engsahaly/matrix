@extends('default.adminMaster')

@section('seoTitle','Contact Info')
@section('s_aboutInfo','active')
@section('s_aboutInfo_contact','active')
@section('s_aboutInfo_showCollapsed','show')

@section('mainContents')

    <div class="content">
        <div class="page-inner">           

            <!-- main page Content -->
            @if (isset($about) > 0)
            <div class="row">                
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
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="admin_about_contact_address_01" id="admin_about_contact_address_01" value="{{ $about->address_01 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_contact_phone_01">Phone 1</label>
                                        <span class="text-danger">*</span>
                                        <input type="text" class="form-control" name="admin_about_contact_phone_01" id="admin_about_contact_phone_01" value="{{ $about->phone_01 }}">                                        
                                    </div>

                                    <div class="form-group col-sm-12 col-md-4">
                                        <label for="admin_about_contact_email_01">Email 1</label>
                                        <span class="text-danger">*</span>
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

                                    <div class="form-group col-sm-12 col-md-12">
                                        <label for="admin_about_contact_map">Map</label>
                                        <!-- <span class="text-danger">*</span> -->
                                        <textarea class="form-control" name="admin_about_contact_map" id="admin_about_contact_map" rows="5">{{ $about->map }}</textarea>
                                    </div>
                                    

                                    <div class="form-group col-12 text-right">
                                        <button type="button" class="btn btn-danger" id="update_admin_about_contact" aria-label="Update">Update</button>
                                    </div>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>                
            </div>
            @else 
            <div class="alert alert-danger text-danger">
                No Contact Details found ...
            </div>
            @endif

        </div>
    </div>










<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    

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

});
</script>



@endsection