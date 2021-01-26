@extends('default.adminMaster')

@section('seoTitle','Services')
@section('s_services','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Services</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                      <a href="#" data-toggle="modal" data-target="#admin_service_add_modal" id="add_service_btn" class="btn btn-primary btn-xs">
                          <i class="fas fa-plus"></i>
                      </a>
                    </div>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($services) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >                                                                    

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Service</th>
                                <th>Icon</th>
                                <th>Image</th>
                                <th>Price</th>                                
                                <th>Order</th>                                
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($services as $key => $service)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $service->name }}</td>
                            <td>
                              <i class="fa-2x {{ $service->icon }}"></i>
                            </td>                            
                            <td>
                              @if ($service->image != null)
                                <img class="card-img-top" src="{{ asset('storage') }}/{{ $service->image }}" alt="service image" style="height:60px; width:60px; border-radius:10px;">
                              @else 
                                ------------
                              @endif
                            </td>
                            <td>{{ $service->price }}</td>
                            <td>
                              @if ($service->ordering < 999)
                                <span class="badge badge-success">{{ $service->ordering }}</span>
                              @endif
                            </td>
                            <td>
                              <div class="btn-group">
                                  <a href="#" data-id="{{ $service->id }}" class="btn btn-primary btn-sm admin_service_edit_class"><i class="fas fa-edit"></i></a>
                                  <a href="{{ route('admin.service.delete') }}" class="btn btn-danger btn-sm admin_service_delete_class" data-id="{{ $service->id }}" data-toggle="modal" data-target="#admin_service_delete_modal"><i class="fas fa-trash-alt"></i></a>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No services found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR ADD SERVICE MODAL -->      
<div class="modal fade" id="admin_service_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_service_add_modal_header">Add Service</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_service_add_alert_div"></div>

        <form action="{{ route('admin.service.add') }}" method="post" id="admin_service_add_form" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="admin_service_add_name">Service</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_service_add_name" name="admin_service_add_name" placeholder="Service">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_service_add_icon">Icon</label>
                    <i class="far fa-question-circle" data-toggle="tooltip" title="Please provide font awesome icon name only like this fas fa-ad !"></i>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_service_add_icon" name="admin_service_add_icon" placeholder="Icon">
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-6 form-group">
                    <label for="admin_service_add_image">Image</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="admin_service_add_image" name="admin_service_add_image">
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-3 form-group">
                    <label for="admin_service_add_price">Price</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_service_add_price" name="admin_service_add_price" min="1" placeholder="Price">                    
                </div>

                <div class="col-3 form-group">
                    <label for="admin_service_add_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_service_add_ordering" name="admin_service_add_ordering" min="1" placeholder="Order">
                </div>

                <div class="col-12 form-group">
                    <label for="admin_service_add_description">Description</label>
                    <!-- <span class="text-danger">*</span> -->
                    <textarea class="form-control" id="admin_service_add_description" name="admin_service_add_description" placeholder="Description" rows="3"></textarea>
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_service_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_service_add_save_btn">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR ADD SERVICE MODAL -->  

<!-- THIS IS FOR DELETE SERVICE MODAL -->      
<div class="modal fade" id="admin_service_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_service_delete_modal_header">Delete Skill</h5>
            </div>

            <div id="admin_service_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this skill ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_service_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE SERVICE MODAL -->  

<!-- THIS IS FOR EDIT SERVICE MODAL -->      
<div class="modal fade" id="admin_service_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_service_edit_modal_header">Edit Skill</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_service_edit_alert_div"></div>

        <form action="{{ route('admin.service.update') }}" method="post" id="admin_service_edit_form" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="admin_service_edit_name">Service</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_service_edit_name" name="admin_service_edit_name">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_service_edit_icon">Icon</label>
                    <i class="far fa-question-circle" data-toggle="tooltip" title="Please provide font awesome icon name only like this fas fa-ad !"></i>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_service_edit_icon" name="admin_service_edit_icon">
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-6 form-group">
                    <label for="admin_service_edit_image">Image</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="admin_service_edit_image" name="admin_service_edit_image">
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-3 form-group">
                    <label for="admin_service_edit_price">Price</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_service_edit_price" name="admin_service_edit_price" min="1">
                </div>

                <div class="col-3 form-group">
                    <label for="admin_service_edit_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_service_edit_ordering" name="admin_service_edit_ordering" min="1">
                </div>

                <div class="col-12 form-group">
                    <label for="admin_service_edit_description">Description</label>
                    <!-- <span class="text-danger">*</span> -->
                    <textarea class="form-control" id="admin_service_edit_description" name="admin_service_edit_description" rows="3"></textarea>
                </div>

                <input type="hidden" name="admin_service_edit_id" id="admin_service_edit_id" value="">

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_service_edit_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_service_edit_save_btn">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR EDIT SERVICE MODAL -->






<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
    
    //SCRIPT FOR RESET ALL FIELD VALUES WHEN DISMISS MODAL (ADD SERVICE)    
    $('#admin_service_add_modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#admin_service_add_alert_div").empty() ;
        $("#admin_service_add_alert_div").removeClass() ;
    })   

    // AJAX REQUEST FOR ADDING NEW SERVICE
    $(document).on('click', "#admin_service_add_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_service_add_form");
      var formAction = theForm[0].action;      
      var formMethod = theForm[0].method;   
      var formData = new FormData($('#admin_service_add_form')[0]);         
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
        $("#admin_service_add_alert_div").empty() ;
        $("#admin_service_add_alert_div").removeClass() ;
        $("#admin_service_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#admin_service_add_alert_div").append("Empty Form!") ;
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
                $("#admin_service_add_alert_div").empty() ;
                $("#admin_service_add_alert_div").removeClass() ;
                        
                if (data['admin_service_add_errors']) {
                  $("#admin_service_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_service_add_errors'] , function( key, value ) {
                      $("#admin_service_add_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_service_add_errors_single']) {
                  $("#admin_service_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_service_add_alert_div").append("<li>" + data['admin_service_add_errors_single'] + "</li>") ;
                } 
                if (data['admin_service_add_success']) {
                  $("#admin_service_add_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_service_add_alert_div").append("<li>" + data['admin_service_add_success'] + "</li>") ;
                  theForm.each(function(){
                      this.reset();
                  }); ;
                  setTimeout(function(){
                      $("#admin_service_add_modal").load(" #admin_service_add_modal > *");
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

    //SCRIPT FOR ACCESS DELETE SERVICE IN MODAL
    $(document).on('click', ".admin_service_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_service_delete_btn").attr("href" , currentHrefForDelete );
        $("#admin_service_delete_btn").attr("data-id" , currentIdForDelete );
        $("#admin_service_delete_alert_div").empty() ;
        $("#admin_service_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING SERVICE
    $(document).on('click', "#admin_service_delete_btn", function (e) {  
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
            $("#admin_service_delete_alert_div").empty() ;
            $("#admin_service_delete_alert_div").removeClass() ;

            if (data['admin_service_delete_success']) {
                $("#admin_service_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_service_delete_alert_div").append("<p>" + data['admin_service_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_service_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_service_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_service_delete_alert_div").append("<p>" + data['admin_service_delete_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    // SCRIPT FOR SHOWING EDITING SERVICE MODAL  
    $(document).on('click', ".admin_service_edit_class", function (e) {
      e.preventDefault();
      var currentExperienceID = $(this).attr("data-id");
      
      $.ajax({
          url: "{{ route('admin.service.showEditForm') }}",
          method: "get",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: { id : currentExperienceID } ,
          dataType: "json",
          success: function(data){             
              $('#admin_service_edit_modal').modal('show').scrollTop(-1);
              $("#admin_service_edit_name").val(data['name']) ;
              $("#admin_service_edit_icon").val(data['icon']) ;
              $("#admin_service_edit_price").val(data['price']) ;
              $("#admin_service_edit_description").val(data['description']) ;              
              if (data['ordering'] < 999) {
                $("#admin_service_edit_ordering").val(data['ordering']) ;
              } else {
                $("#admin_service_edit_ordering").val('') ;
              }
              $("#admin_service_edit_id").val(data['id']) ;              
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    // AJAX REQUEST FOR EDITING SERVICE    
    $(document).on('click', "#admin_service_edit_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_service_edit_form");
      var formAction = theForm[0].action;
      var formMethod = theForm[0].method;
      //var formData = theForm.serialize();
      var formData = new FormData($('#admin_service_edit_form')[0]);
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
        $("#admin_service_edit_alert_div").empty() ;
        $("#admin_service_edit_alert_div").removeClass() ;
        $("#admin_service_edit_alert_div").addClass('m-2 alert alert-danger') ;
        $("#admin_service_edit_alert_div").append("Empty Form!") ;
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
                $("#admin_service_edit_alert_div").empty() ;
                $("#admin_service_edit_alert_div").removeClass() ;
                        
                if (data['admin_service_edit_errors']) {
                  $("#admin_service_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_service_edit_errors'] , function( key, value ) {
                      $("#admin_service_edit_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_service_edit_errors_single']) {
                  $("#admin_service_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_service_edit_alert_div").append("<li>" + data['admin_service_edit_errors_single'] + "</li>") ;
                } 
                if (data['admin_service_edit_success']) {
                  $("#admin_service_edit_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_service_edit_alert_div").append("<li>" + data['admin_service_edit_success'] + "</li>") ;
                  setTimeout(function(){
                      $("#admin_service_edit_alert_div").empty() ;
                      $("#admin_service_edit_alert_div").removeClass() ;
                      $("#admin_service_edit_image").val(null) ;
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

    //SCRIPT FOR RESET ALERT FIELD WHEN DISMISS MODAL (EDIT SERVICE)    
    $('#admin_service_edit_modal').on('hidden.bs.modal', function () {        
        $("#admin_service_edit_alert_div").empty() ;
        $("#admin_service_edit_alert_div").removeClass() ;
        $("#admin_service_edit_image").val(null) ;
    })

});
</script>








@endsection