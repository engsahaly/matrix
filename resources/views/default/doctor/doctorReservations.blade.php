@extends('default.doctorMaster')

@section('seoTitle','Reservations')
@section('s_reservations','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-4">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-12">
                    <h2 class="m-0 text-dark">Reservations</h2>
                </div><!-- /.col -->                
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($clinics) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >
                    @foreach ($clinics as $clinic)                    
                        <div class="badge badge-primary"><strong>Clinic : </strong>{{ $clinic->location }}</div>                                                

                        @if ( count($clinic->reservations) > 0 )
                            <table class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">#</th>
                                        <th>user</th>                                            
                                        <th>email</th>                                            
                                        <th>status</th>
                                        <th style="width: 40px">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($clinic->reservations as $key=>$reservation)                                   
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $reservation->user->name }}</td>
                                    <td>{{ $reservation->user->email }}</td>                                   
                                    <td>
                                        @if ($reservation->status == 0) 
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
                                            @if ($reservation->status == 0) 
                                                <a href="{{ route('doctor.reservation.approve') }}" data-id="{{ $reservation->id }}" class="btn btn-sm  btn-success doctor_reservation_approve_class" data-toggle="modal" data-target="#doctor_reservation_approve_modal"><i class="fas fa-check"></i></a>
                                            @else 
                                                <a href="{{ route('doctor.reservation.decline') }}" data-id="{{ $reservation->id }}" class="btn btn-sm  btn-warning doctor_reservation_decline_class" data-toggle="modal" data-target="#doctor_reservation_decline_modal"><i class="fas fa-times"></i></a>
                                            @endif                                  
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                                </tbody>
                            </table>                            
                        @else 
                            <div class="col-12 alert alert-danger text-danger">
                                No Reservations in this clinic ...
                            </div>
                        @endif
                    @endforeach
                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No reservations found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR APPROVE reservation MODAL -->
<div class="modal fade" id="doctor_reservation_approve_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="doctor_reservation_approve_modal_header"> Approve Reservation</h5>
            </div>

            <div id="doctor_reservation_approve_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to approve this reservation?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-success" id="doctor_reservation_approve_btn">Confirm</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR APPROVE reservation MODAL -->

<!-- THIS IS FOR DECLINE reservation MODAL -->
<div class="modal fade" id="doctor_reservation_decline_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">

            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="doctor_reservation_decline_modal_header"> Decline reservation</h5>
            </div>

            <div id="doctor_reservation_decline_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to decline this reservation?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-warning" id="doctor_reservation_decline_btn">Confirm</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DECLINE reservation MODAL -->








<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
        
    //SCRIPT FOR ACCESS APPROVE RESERVATION IN MODAL
    $(document).on('click', ".doctor_reservation_approve_class", function () {    
        // get attribute value of name (reservation id)
        var currentHrefForapprove = $(this).attr("href");
        var currentIdForapprove = $(this).attr("data-id");
        $("#doctor_reservation_approve_btn").attr("href" , currentHrefForapprove );
        $("#doctor_reservation_approve_btn").attr("data-id" , currentIdForapprove );
    }) ;

    // AJAX REQUEST FOR APPROVING RESERVATION
    $(document).on('click', "#doctor_reservation_approve_btn", function (e) {  
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
            $("#doctor_reservation_approve_alert_div").empty() ;
            $("#doctor_reservation_approve_alert_div").removeClass() ;

            if (data['doctor_reservation_approve_success']) {                
                    $('#doctor_reservation_approve_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#doctor_reservation_approve_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#doctor_reservation_approve_alert_div").append("<p>" + data['doctor_reservation_approve_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    //SCRIPT FOR ACCESS decline RESERVATION IN MODAL
    $(document).on('click', ".doctor_reservation_decline_class", function () {    
        // get attribute value of name (reservation id)
        var currentHrefForapprove = $(this).attr("href");
        var currentIdForapprove = $(this).attr("data-id");
        $("#doctor_reservation_decline_btn").attr("href" , currentHrefForapprove );
        $("#doctor_reservation_decline_btn").attr("data-id" , currentIdForapprove );
    }) ;

    // AJAX REQUEST FOR HIDING RESERVATION
    $(document).on('click', "#doctor_reservation_decline_btn", function (e) {  
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
            $("#doctor_reservation_decline_alert_div").empty() ;
            $("#doctor_reservation_decline_alert_div").removeClass() ;

            if (data['doctor_reservation_decline_success']) {                
                    $('#doctor_reservation_decline_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#doctor_reservation_decline_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#doctor_reservation_decline_alert_div").append("<p>" + data['doctor_reservation_decline_error'] + "</p>") ;
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