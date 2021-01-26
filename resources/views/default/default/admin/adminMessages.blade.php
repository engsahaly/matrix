@extends('default.adminMaster')

@section('seoTitle','Messgaes')
@section('s_messages','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                  <div class="col-sm-6">
                      <h2 class="m-0 text-dark">Messages</h2>
                  </div><!-- /.col -->
                  <div class="col-sm-6">
                    <div class="float-sm-right">
                      <a href="#" data-toggle="modal" data-target="#front_message_add_modal" id="add_message_btn" class="btn btn-primary btn-xs">
                          <i class="fas fa-plus"></i>
                      </a>
                    </div>
                </div><!-- /.col -->                
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($messages) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >                                                                    

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Subject</th>
                                <th>Status</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($messages as $key => $message)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->email }}</td>
                            <td>
                              @if ($message->phone != null)
                                {{ $message->phone }}
                              @else 
                                Not Defined
                              @endif
                            </td>
                            <td>{{ $message->subject }}</td>                            
                            <td>
                              @if ( $message->status == 0 )
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
                                  <!-- download button to download attachment here-->
                                  @if (count($message->attachments) > 0 )
                                    @foreach ($message->attachments as $attachment)
                                      <a href="{{ route('admin.message.download', ['id' => $attachment->id]) }}" class="btn btn-sm btn-success showMessageBTN"><i class="fas fa-download"></i></a>
                                    @endforeach
                                  @endif

                                  <!-- view button to view message here-->
                                  <a href="#" data-id="{{ $message->id }}" class="btn btn-sm btn-primary admin_message_show_class"><i class="fas fa-eye"></i></a>
                                  
                                  <!-- delete message button -->
                                  <a href="{{ route('admin.message.delete') }}" class="btn btn-danger btn-sm admin_message_delete_class" data-id="{{ $message->id }}" data-toggle="modal" data-target="#admin_message_delete_modal"><i class="fas fa-trash-alt"></i></a>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No messages found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR ADD MESSAGE MODAL (will be in front) -->
<div class="modal fade" id="front_message_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="front_message_add_modal_header">Add Message</h5>        
      </div>

      <div class="modal-body">
        <div id="front_message_add_alert_div"></div>

        <form action="{{ route('front.message.add') }}" method="post" id="front_message_add_form" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="front_message_add_name">Name</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="front_message_add_name" name="front_message_add_name" placeholder="Name">
                </div>

                <div class="col-6 form-group">
                    <label for="front_message_add_email">Email</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="email" class="form-control" id="front_message_add_email" name="front_message_add_email" placeholder="Email">
                </div>

                <div class="col-6 form-group">
                    <label for="front_message_add_phone">Phone</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="front_message_add_phone" name="front_message_add_phone" placeholder="Phone">
                </div>

                <div class="col-6 form-group">
                    <label for="front_message_add_subject">Subject</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="front_message_add_subject" name="front_message_add_subject" placeholder="Subject">
                </div>

                <div class="col-6 form-group">
                    <label for="front_message_add_attachments">Attachments</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="file" class="form-control" id="front_message_add_attachments" name="front_message_add_attachments[]">
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-12 form-group">
                    <label for="front_message_add_message">Message</label>
                    <!-- <span class="text-danger">*</span> -->
                    <textarea class="form-control" id="front_message_add_message" name="front_message_add_message" placeholder="Message" rows="3"></textarea>
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="front_message_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="front_message_add_save_btn">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR ADD MESSAGE MODAL -->

<!-- THIS IS FOR DELETE MESSAGE MODAL -->
<div class="modal fade" id="admin_message_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_message_delete_modal_header">Delete Message</h5>
            </div>

            <div id="admin_message_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this message ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_message_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE MESSAGE MODAL -->

<!-- THIS IS FOR SHOW MESSAGE MODAL -->
<div class="modal fade" id="admin_message_show_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_message_show_modal_header">Show Message</h5>
      </div>

      <div class="modal-body">
        <div id="admin_message_show_alert_div"></div>
       
            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label>Name</label>                  
                    <span class="form-control" id="admin_message_show_name"></span>
                </div>

                <div class="col-6 form-group">
                    <label>Email</label>                  
                    <span class="form-control" id="admin_message_show_email"></span>
                </div>

                <div class="col-6 form-group">
                    <label>Phone</label>                  
                    <span class="form-control" id="admin_message_show_phone"></span>
                </div>

                <div class="col-6 form-group">
                    <label>Subject</label>                  
                    <span class="form-control" id="admin_message_show_subject"></span>
                </div>                

                <div class="col-12 form-group">
                    <label>Message</label>
                    <span class="form-control" id="admin_message_show_message"></span>
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_message_show_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>                
            </div>

      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR SHOW MESSAGE MODAL -->




<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
        
    // AJAX REQUEST FOR ADDING NEW MESSAGE (will be in front)
    $(document).on('click', "#front_message_add_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#front_message_add_form");
      var formAction = theForm[0].action;      
      var formMethod = theForm[0].method;   
      var formData = new FormData($('#front_message_add_form')[0]);
      //var formData = theForm.serialize();
          // console.log(formData);
          // console.log(formAction);
          // console.log(formMethod);
      
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
        $("#front_message_add_alert_div").empty() ;
        $("#front_message_add_alert_div").removeClass() ;
        $("#front_message_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#front_message_add_alert_div").append("Empty Form!") ;
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
                $("#front_message_add_alert_div").empty() ;
                $("#front_message_add_alert_div").removeClass() ;
                        
                if (data['front_message_add_errors']) {
                  $("#front_message_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['front_message_add_errors'] , function( key, value ) {
                      $("#front_message_add_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['front_message_add_errors_single']) {
                  $("#front_message_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#front_message_add_alert_div").append("<li>" + data['front_message_add_errors_single'] + "</li>") ;
                } 
                if (data['front_message_add_success']) {
                  $("#front_message_add_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#front_message_add_alert_div").append("<li>" + data['front_message_add_success'] + "</li>") ;
                  theForm.each(function(){
                      this.reset();
                  }); ;
                  setTimeout(function(){
                      $("#front_message_add_modal").load(" #front_message_add_modal > *");
                      $("#mainCont").load(" #mainCont > *");
                  }, 1000);
                }
            },
            error: function(){
                alert("failed .. Please try again !");
            }
        }) ; 
      }

    }) ;

    //SCRIPT FOR ACCESS DELETE MESSAGE IN MODAL
    $(document).on('click', ".admin_message_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_message_delete_btn").attr("href" , currentHrefForDelete );
        $("#admin_message_delete_btn").attr("data-id" , currentIdForDelete );
        $("#admin_message_delete_alert_div").empty() ;
        $("#admin_message_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING MESSAGE
    $(document).on('click', "#admin_message_delete_btn", function (e) {  
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
            $("#admin_message_delete_alert_div").empty() ;
            $("#admin_message_delete_alert_div").removeClass() ;

            if (data['admin_message_delete_success']) {
                $("#admin_message_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_message_delete_alert_div").append("<p>" + data['admin_message_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_message_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_message_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_message_delete_alert_div").append("<p>" + data['admin_message_delete_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    // SCRIPT FOR SHOWING MESSAGE MODAL  
    $(document).on('click', ".admin_message_show_class", function (e) {
      e.preventDefault();
      var currentMessageID = $(this).attr("data-id");
      
      $.ajax({
          url: "{{ route('admin.message.show') }}",
          method: "get",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: { id : currentMessageID } ,
          dataType: "json",
          success: function(data){             
              $('#admin_message_show_modal').modal('show').scrollTop(-1);
              $("#admin_message_show_name").text(data['name']) ;
              $("#admin_message_show_email").text(data['email']) ;
              $("#admin_message_show_phone").text(data['phone']) ;
              $("#admin_message_show_subject").text(data['subject']) ;
              $("#admin_message_show_message").text(data['message']) ;

              $("#mainCont").load(" #mainCont > *");
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;
  
});
</script>








@endsection