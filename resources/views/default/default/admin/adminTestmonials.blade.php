@extends('default.adminMaster')

@section('seoTitle','Testmonials')
@section('s_testmonials','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Testmonials</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                      <a href="#" data-toggle="modal" data-target="#front_testmonial_add_modal" id="add_testmonial_btn" class="btn btn-primary btn-xs">
                          <i class="fas fa-plus"></i>
                      </a>
                    </div>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($testmonials) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >                                                                    

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th style="width: 150px">Rate</th>
                                <th>Image</th>
                                <th style="width: 250px">review</th> 
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($testmonials as $key => $testmonial)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $testmonial->name }}</td>
                            <td>{{ $testmonial->position }}</td>
                            <td>
                              @for ($i = 0; $i < $testmonial->rate; $i++)
                                <i class="fas fa-star text-success"></i>
                              @endfor
                            </td>                                                      
                            <td>
                              @if ($testmonial->image != null)
                                <img class="card-img-top" src="{{ asset('storage') }}/{{ $testmonial->image }}" alt="testmonial image" style="height:60px; width:60px; border-radius:10px;">
                              @else 
                                ------------
                              @endif
                            </td>
                            <td>{{ $testmonial->review }}</td>                            
                            <td>
                              <div class="btn-group">
                                  @if ($testmonial->status == 0) 
                                    <a href="{{ route('admin.testmonial.show') }}" data-id="{{ $testmonial->id }}" class="btn btn-sm  btn-success admin_testmonial_show_class" data-toggle="modal" data-target="#admin_testmonial_show_modal"><i class="fas fa-check"></i></a>
                                  @else 
                                    <a href="{{ route('admin.testmonial.hide') }}" data-id="{{ $testmonial->id }}" class="btn btn-sm  btn-warning admin_testmonial_hide_class" data-toggle="modal" data-target="#admin_testmonial_hide_modal"><i class="fas fa-times"></i></a>
                                  @endif
                                  <a href="{{ route('admin.testmonial.delete') }}" class="btn btn-danger btn-sm admin_testmonial_delete_class" data-id="{{ $testmonial->id }}" data-toggle="modal" data-target="#admin_testmonial_delete_modal"><i class="fas fa-trash-alt"></i></a>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No testmonials found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR ADD TESTMONIAL MODAL -->      
<div class="modal fade" id="front_testmonial_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="front_testmonial_add_modal_header">Add Testmonial</h5>        
      </div>

      <div class="modal-body">
        <div id="front_testmonial_add_alert_div"></div>

        <form action="{{ route('front.testmonial.add') }}" method="post" id="front_testmonial_add_form" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="front_testmonial_add_name">Name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="front_testmonial_add_name" name="front_testmonial_add_name" placeholder="Name">
                </div>

                <div class="col-6 form-group">
                    <label for="front_testmonial_add_position">Position</label>                    
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="front_testmonial_add_position" name="front_testmonial_add_position" placeholder="Position">                   
                </div>

                <div class="col-6 form-group">
                    <label for="front_testmonial_add_rate">Rate</label>                    
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="front_testmonial_add_rate" name="front_testmonial_add_rate" min="1" max="5">
                    <small class="text-muted" style="font-size:11px;">Please provide rate from 1 to 5 </small>
                </div>

                <div class="col-6 form-group">
                    <label for="front_testmonial_add_image">Image</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="front_testmonial_add_image" name="front_testmonial_add_image">
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>
                
                <div class="col-12 form-group">
                    <label for="front_testmonial_add_review">Review</label>
                    <span class="text-danger">*</span>
                    <textarea class="form-control" id="front_testmonial_add_review" name="front_testmonial_add_review" placeholder="Review" rows="3"></textarea>
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="front_testmonial_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="front_testmonial_add_save_btn">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR ADD TESTMONIAL MODAL -->  

<!-- THIS IS FOR DELETE TESTMONIAL MODAL -->      
<div class="modal fade" id="admin_testmonial_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_testmonial_delete_modal_header">Delete Testmonial</h5>
            </div>

            <div id="admin_testmonial_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this testmonial ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_testmonial_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE TESTMONIAL MODAL -->  

<!-- THIS IS FOR SHOW TESTMONIAL MODAL -->
<div class="modal fade" id="admin_testmonial_show_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">

            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="admin_testmonial_show_modal_header"> ٍShow Testmonial</h5>
            </div>

            <div id="admin_testmonial_show_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to show this testmonial in the website?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-success" id="admin_testmonial_show_btn">Confirm</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR SHOW TESTMONIAL MODAL -->

<!-- THIS IS FOR HIDE TESTMONIAL MODAL -->
<div class="modal fade" id="admin_testmonial_hide_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
      <div class="modal-content">

            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="admin_testmonial_hide_modal_header"> Hide Testmonial</h5>
            </div>

            <div id="admin_testmonial_hide_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to hide this testmonial from website?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-warning" id="admin_testmonial_hide_btn">Confirm</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR HIDE TESTMONIAL MODAL -->








<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
    
    //SCRIPT FOR RESET ALL FIELD VALUES WHEN DISMISS MODAL (ADD TESTMONIAL)    
    $('#front_testmonial_add_modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#front_testmonial_add_alert_div").empty() ;
        $("#front_testmonial_add_alert_div").removeClass() ;
    })   

    // AJAX REQUEST FOR ADDING NEW TESTMONIAL
    $(document).on('click', "#front_testmonial_add_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#front_testmonial_add_form");
      var formAction = theForm[0].action;
      var formMethod = theForm[0].method;
      var formData = new FormData($('#front_testmonial_add_form')[0]);
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

      if (empty == 5) {
        $("#front_testmonial_add_alert_div").empty() ;
        $("#front_testmonial_add_alert_div").removeClass() ;
        $("#front_testmonial_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#front_testmonial_add_alert_div").append("Empty Form!") ;
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
                $("#front_testmonial_add_alert_div").empty() ;
                $("#front_testmonial_add_alert_div").removeClass() ;
                        
                if (data['front_testmonial_add_errors']) {
                  $("#front_testmonial_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['front_testmonial_add_errors'] , function( key, value ) {
                      $("#front_testmonial_add_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['front_testmonial_add_errors_single']) {
                  $("#front_testmonial_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#front_testmonial_add_alert_div").append("<li>" + data['front_testmonial_add_errors_single'] + "</li>") ;
                } 
                if (data['front_testmonial_add_success']) {
                  $("#front_testmonial_add_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#front_testmonial_add_alert_div").append("<li>" + data['front_testmonial_add_success'] + "</li>") ;
                  theForm.each(function(){
                      this.reset();
                  }); ;
                  setTimeout(function(){
                      $("#front_testmonial_add_modal").load(" #front_testmonial_add_modal > *");
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

    //SCRIPT FOR ACCESS DELETE TESTMONIAL IN MODAL
    $(document).on('click', ".admin_testmonial_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_testmonial_delete_btn").attr("href" , currentHrefForDelete );
        $("#admin_testmonial_delete_btn").attr("data-id" , currentIdForDelete );
        $("#admin_testmonial_delete_alert_div").empty() ;
        $("#admin_testmonial_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING TESTMONIAL
    $(document).on('click', "#admin_testmonial_delete_btn", function (e) {  
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
            $("#admin_testmonial_delete_alert_div").empty() ;
            $("#admin_testmonial_delete_alert_div").removeClass() ;

            if (data['admin_testmonial_delete_success']) {
                $("#admin_testmonial_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_testmonial_delete_alert_div").append("<p>" + data['admin_testmonial_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_testmonial_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_testmonial_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_testmonial_delete_alert_div").append("<p>" + data['admin_testmonial_delete_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    //SCRIPT FOR ACCESS SHOW TESTMONIAL IN MODAL
    $(document).on('click', ".admin_testmonial_show_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForShow = $(this).attr("href");
        var currentIdForShow = $(this).attr("data-id");
        $("#admin_testmonial_show_btn").attr("href" , currentHrefForShow );
        $("#admin_testmonial_show_btn").attr("data-id" , currentIdForShow );
    }) ;

    // AJAX REQUEST FOR SHOWING TESTMONIAL
    $(document).on('click', "#admin_testmonial_show_btn", function (e) {  
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
            $("#admin_testmonial_show_alert_div").empty() ;
            $("#admin_testmonial_show_alert_div").removeClass() ;

            if (data['admin_testmonial_show_success']) {                
                    $('#admin_testmonial_show_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#admin_testmonial_show_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_testmonial_show_alert_div").append("<p>" + data['admin_testmonial_show_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    //SCRIPT FOR ACCESS HIDE TESTMONIAL IN MODAL
    $(document).on('click', ".admin_testmonial_hide_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForShow = $(this).attr("href");
        var currentIdForShow = $(this).attr("data-id");
        $("#admin_testmonial_hide_btn").attr("href" , currentHrefForShow );
        $("#admin_testmonial_hide_btn").attr("data-id" , currentIdForShow );
    }) ;

    // AJAX REQUEST FOR HIDING TESTMONIAL
    $(document).on('click', "#admin_testmonial_hide_btn", function (e) {  
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
            $("#admin_testmonial_hide_alert_div").empty() ;
            $("#admin_testmonial_hide_alert_div").removeClass() ;

            if (data['admin_testmonial_hide_success']) {                
                    $('#admin_testmonial_hide_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#admin_testmonial_hide_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_testmonial_hide_alert_div").append("<p>" + data['admin_testmonial_hide_error'] + "</p>") ;
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