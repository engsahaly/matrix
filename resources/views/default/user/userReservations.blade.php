@extends('default.master')

@section('seoTitle','my reservations')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-12">
                    <h2 class="m-0 text-dark">My Reservations</h2>
                </div><!-- /.col -->                
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont"> 
                @if (count($reservations) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >                                                                    

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>user</th>
                                <th>fees</th>
                                <th>location</th>
                                <th>speciality</th>
                                <th>status</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($reservations as $key => $reservation)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $reservation->clinic->doctor->name }}</td>
                            <td>{{ $reservation->clinic->fees }} $</td>
                            <td>{{ $reservation->clinic->location }}</td>
                            <td>{{ $reservation->clinic->speciality }}</td>
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
                                <a href="{{ route('user.reservation.delete') }}" class="btn btn-danger btn-sm reservation_delete_class" data-id="{{ $reservation->id }}" data-toggle="modal" data-target="#reservation_delete_modal"><i class="fas fa-trash-alt"></i></a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

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
<!-- THIS IS FOR DELETE RESERVATION MODAL -->      
<div class="modal fade" id="reservation_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="reservation_delete_modal_header">Delete Reservation</h5>
            </div>

            <div id="reservation_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this reservation ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="reservation_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE RESERVATION MODAL -->  






<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
    
    //SCRIPT FOR ACCESS DELETE RESERVATION IN MODAL
    $(document).on('click', ".reservation_delete_class", function () {    
        // get attribute value of name (reservation id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#reservation_delete_btn").attr("href" , currentHrefForDelete );
        $("#reservation_delete_btn").attr("data-id" , currentIdForDelete );
        $("#reservation_delete_alert_div").empty() ;
        $("#reservation_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING RESERVATION
    $(document).on('click', "#reservation_delete_btn", function (e) {  
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
            $("#reservation_delete_alert_div").empty() ;
            $("#reservation_delete_alert_div").removeClass() ;

            if (data['reservation_delete_success']) {
                $("#reservation_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#reservation_delete_alert_div").append("<p>" + data['reservation_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#reservation_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#reservation_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#reservation_delete_alert_div").append("<p>" + data['reservation_delete_error'] + "</p>") ;
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