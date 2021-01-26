@extends('default.adminMaster')

@section('seoTitle','Subscribers')
@section('s_subscribers','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-12">
                      <h2 class="m-0 text-dark">Subscribers</h2>
                  </div><!-- /.col -->                
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($subscribers) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >                                                                    

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Email</th>                                
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($subscribers as $key => $subscriber)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $subscriber->email }}</td>                            
                            <td>
                              <div class="btn-group">                                  
                                  <a href="{{ route('admin.subscriber.delete') }}" class="btn btn-danger btn-sm admin_subscribe_delete_class" data-id="{{ $subscriber->id }}" data-toggle="modal" data-target="#admin_subscribe_delete_modal"><i class="fas fa-trash-alt"></i></a>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No subscribers found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR DELETE SUBSCRIBER MODAL -->
<div class="modal fade" id="admin_subscribe_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_subscribe_delete_modal_header">Delete Subscriber</h5>
            </div>

            <div id="admin_subscribe_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this subscriber ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_subscribe_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE SUBSCRIBER MODAL -->






<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    

    //SCRIPT FOR ACCESS DELETE SUBSCRIBER IN MODAL
    $(document).on('click', ".admin_subscribe_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_subscribe_delete_btn").attr("href" , currentHrefForDelete );
        $("#admin_subscribe_delete_btn").attr("data-id" , currentIdForDelete );
        $("#admin_subscribe_delete_alert_div").empty() ;
        $("#admin_subscribe_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING SUBSCRIBER
    $(document).on('click', "#admin_subscribe_delete_btn", function (e) {  
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
            $("#admin_subscribe_delete_alert_div").empty() ;
            $("#admin_subscribe_delete_alert_div").removeClass() ;

            if (data['admin_subscribe_delete_success']) {
                $("#admin_subscribe_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_subscribe_delete_alert_div").append("<p>" + data['admin_subscribe_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_subscribe_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_subscribe_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_subscribe_delete_alert_div").append("<p>" + data['admin_subscribe_delete_error'] + "</p>") ;
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