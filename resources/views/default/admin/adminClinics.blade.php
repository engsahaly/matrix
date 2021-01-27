@extends('default.adminMaster')

@section('seoTitle','Clinics')
@section('s_doctors','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-12">
                    <h2 class="m-0 text-dark">Clinics</h2>
                </div><!-- /.col -->                
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($clinics) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                            <th style="width: 10px">#</th>
                                <th>doctor</th>
                                <th>fees</th>
                                <th>speciality</th>
                                <th>location</th>
                                <th style="width: 250px">description</th>
                                <th>status</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($clinics as $key => $clinic)
                        <tr>
                        <td>{{ $key+1 }}</td>
                            <td>{{ $clinic->doctor->name }}</td>
                            <td>{{ $clinic->fees }}</td>
                            <td>{{ $clinic->speciality }}</td>
                            <td>{{ $clinic->location }}</td>
                            <td>{{ $clinic->description }}</td>
                            <td>
                            @if ($clinic->status == 0) 
                              <span class="text-danger">
                                  <i class="fas fa-times-circle"></i>
                              </span>
                            @else 
                              <span class="text-success">
                                  <i class="fas fa-check-circle"></i>
                              </span>
                            @endif
                            </td>                            
                            <td>
                              <div class="btn-group">
                                  @if ($clinic->status == 0) 
                                    <a href="{{ route('admin.clinic.approve') }}" data-id="{{ $clinic->id }}" class="btn btn-sm  btn-success admin_clinic_approve_class" data-toggle="modal" data-target="#admin_clinic_approve_modal"><i class="fas fa-check"></i></a>
                                  @else 
                                    <a href="{{ route('admin.clinic.decline') }}" data-id="{{ $clinic->id }}" class="btn btn-sm  btn-warning admin_clinic_decline_class" data-toggle="modal" data-target="#admin_clinic_decline_modal"><i class="fas fa-times"></i></a>
                                  @endif                                  
                              </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
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
<!-- THIS IS FOR APPROVE CLINIC MODAL -->
<div class="modal fade" id="admin_clinic_approve_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="admin_clinic_approve_modal_header"> Approve clinic</h5>
            </div>

            <div id="admin_clinic_approve_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to approve this clinic?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-success" id="admin_clinic_approve_btn">Confirm</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR APPROVE CLINIC MODAL -->

<!-- THIS IS FOR DECLINE CLINIC MODAL -->
<div class="modal fade" id="admin_clinic_decline_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">

            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="admin_clinic_decline_modal_header"> Decline Clinic</h5>
            </div>

            <div id="admin_clinic_decline_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to decline this clinic?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-warning" id="admin_clinic_decline_btn">Confirm</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DECLINE CLINIC MODAL -->








<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
        
    //SCRIPT FOR ACCESS APPROVE CLINIC IN MODAL
    $(document).on('click', ".admin_clinic_approve_class", function () {    
        // get attribute value of name (clinic id)
        var currentHrefForapprove = $(this).attr("href");
        var currentIdForapprove = $(this).attr("data-id");
        $("#admin_clinic_approve_btn").attr("href" , currentHrefForapprove );
        $("#admin_clinic_approve_btn").attr("data-id" , currentIdForapprove );
    }) ;

    // AJAX REQUEST FOR APPROVING CLINIC
    $(document).on('click', "#admin_clinic_approve_btn", function (e) {  
      e.preventDefault();

      // get form and its dependences
      var formAction = $(this).attr("href");
      var id = $(this).attr("data-id");
      // console.log(formAction);
      // console.log(id);
        
      // send ajax request
      $.ajax({
          url: formAction ,
          method: 'POST' ,
          data: { 
            id : id ,
          } ,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: "json",
          success: function(data){
            $("#admin_clinic_approve_alert_div").empty() ;
            $("#admin_clinic_approve_alert_div").removeClass() ;

            if (data['admin_clinic_approve_success']) {                
                    $('#admin_clinic_approve_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#admin_clinic_approve_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_clinic_approve_alert_div").append("<p>" + data['admin_clinic_approve_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    //SCRIPT FOR ACCESS decline CLINIC IN MODAL
    $(document).on('click', ".admin_clinic_decline_class", function () {    
        // get attribute value of name (clinic id)
        var currentHrefForapprove = $(this).attr("href");
        var currentIdForapprove = $(this).attr("data-id");
        $("#admin_clinic_decline_btn").attr("href" , currentHrefForapprove );
        $("#admin_clinic_decline_btn").attr("data-id" , currentIdForapprove );
    }) ;

    // AJAX REQUEST FOR HIDING CLINIC
    $(document).on('click', "#admin_clinic_decline_btn", function (e) {  
      e.preventDefault();

      // get form and its dependences
      var formAction = $(this).attr("href");
      var id = $(this).attr("data-id");
      // console.log(formAction);
      // console.log(id);
        
      // send ajax request
      $.ajax({
          url: formAction ,
          method: 'POST' ,
          data: { 
            id : id ,
          } ,
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          dataType: "json",
          success: function(data){
            $("#admin_clinic_decline_alert_div").empty() ;
            $("#admin_clinic_decline_alert_div").removeClass() ;

            if (data['admin_clinic_decline_success']) {                
                    $('#admin_clinic_decline_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#admin_clinic_decline_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_clinic_decline_alert_div").append("<p>" + data['admin_clinic_decline_error'] + "</p>") ;
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