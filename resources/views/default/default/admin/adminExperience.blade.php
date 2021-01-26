@extends('default.adminMaster')

@section('seoTitle','Experience')
@section('s_experience','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Experience</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">              
                      <a href="#" data-toggle="modal" data-target="#admin_experience_add_modal" id="add_experience_btn" class="btn btn-primary btn-xs">
                          <i class="fas fa-plus"></i>
                      </a>
                    </div>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($experiences) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >                                                                    

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Organization</th>
                                <th>Position</th>
                                <th>Start</th>
                                <th>End</th>            
                                <th>Order</th>            
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($experiences as $key => $experience)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $experience->name }}</td>
                            <td>{{ $experience->position }}</td>
                            <td>{{ substr( date('F', strtotime($experience->start)), 0, 3 ) }} {{ date('Y', strtotime($experience->start)) }}</td>
                            <td>
                            @if ($experience->end == null) 
                                current
                            @else 
                                {{ substr( date('F', strtotime($experience->end)), 0, 3 ) }} {{ date('Y', strtotime($experience->end)) }}
                            @endif
                            </td>
                            <td>
                            @if ($experience->ordering < 999)
                              <span class="badge badge-success">{{ $experience->ordering }}</span>
                            @endif
                            </td>
                            <td>
                            <div class="btn-group">
                                <a href="#" data-id="{{ $experience->id }}" class="btn btn-primary btn-sm admin_experience_edit_class"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.experience.delete') }}" class="btn btn-danger btn-sm admin_experience_delete_class" data-id="{{ $experience->id }}" data-toggle="modal" data-target="#admin_experience_delete_modal"><i class="fas fa-trash-alt"></i></a>
                            </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No Experience found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR ADD EXPERIENCE MODAL -->      
<div class="modal fade" id="admin_experience_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_experience_add_modal_header">Add Experience</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_experience_add_alert_div"></div>

        <form action="{{ route('admin.experience.add') }}" method="post" id="admin_experience_add_form">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="admin_experience_add_name">Organization</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_experience_add_name" name="admin_experience_add_name" placeholder="Organization">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_experience_add_position">Position</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_experience_add_position" name="admin_experience_add_position" placeholder="Position">
                </div>

                <div class="col-5 form-group">
                    <label for="admin_experience_add_start">Start Date</label>
                    <span class="text-danger">*</span>
                    <input type="month" class="form-control" id="admin_experience_add_start" name="admin_experience_add_start">
                </div>

                <div class="col-5 form-group">
                    <label for="admin_experience_add_end">End Date</label>
                    <span class="text-danger">*</span>
                    <input type="month" class="form-control" id="admin_experience_add_end" name="admin_experience_add_end">
                    <input type="checkbox" class="mr-1" id="admin_experience_add_checkbox_current" name="admin_experience_add_checkbox_current">
                    <label class="form-check-label" for="admin_experience_add_checkbox_current">Current</label>
                </div>

                <div class="col-2 form-group">
                    <label for="admin_experience_add_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_experience_add_ordering" name="admin_experience_add_ordering" min="1" placeholder="Order">
                </div>

                <div class="col-12 form-group">
                    <label for="admin_experience_add_description">Description</label>                                            
                    <textarea name="admin_experience_add_description" id="admin_experience_add_description" class="w-100 p-2" rows="1" style="border:1px solid #D3D3D3; border-radius:7px;" placeholder="description"></textarea>
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_experience_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_experience_add_save_btn">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR ADD EXPERIENCE MODAL -->  

<!-- THIS IS FOR DELETE EXPERIENCE MODAL -->      
<div class="modal fade" id="admin_experience_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_experience_delete_modal_header">Delete Experience</h5>
            </div>

            <div id="admin_experience_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this experience ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_experience_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE EXPERIENCE MODAL -->  

<!-- THIS IS FOR EDIT EXPERIENCE MODAL -->      
<div class="modal fade" id="admin_experience_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_experience_edit_modal_header">Edit Experience</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_experience_edit_alert_div"></div>

        <form action="{{ route('admin.experience.update') }}" method="post" id="admin_experience_edit_form">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="admin_experience_edit_name">Organization</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_experience_edit_name" name="admin_experience_edit_name" placeholder="Organization">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_experience_edit_position">Position</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_experience_edit_position" name="admin_experience_edit_position" placeholder="Position">
                </div>

                <div class="col-5 form-group">
                    <label for="admin_experience_edit_start">Start Date</label>
                    <span class="text-danger">*</span>
                    <input type="month" class="form-control" id="admin_experience_edit_start" name="admin_experience_edit_start">
                </div>

                <div class="col-5 form-group">
                    <label for="admin_experience_edit_end">End Date</label>
                    <span class="text-danger">*</span>
                    <input type="month" class="form-control" id="admin_experience_edit_end" name="admin_experience_edit_end">
                    <input type="checkbox" class="mr-1" id="admin_experience_edit_checkbox_current" name="admin_experience_edit_checkbox_current">
                    <label class="form-check-label" for="admin_experience_edit_checkbox_current">Current</label>
                </div>

                <div class="col-2 form-group">
                    <label for="admin_experience_edit_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_experience_edit_ordering" name="admin_experience_edit_ordering" min="1">
                </div>
                
                <div class="col-12 form-group">
                    <label for="admin_experience_edit_description">Description</label>                                            
                    <textarea name="admin_experience_edit_description" id="admin_experience_edit_description" class="w-100 p-2" rows="1" style="border:1px solid #D3D3D3; border-radius:7px;" placeholder="description"></textarea>
                </div>

                <input type="hidden" name="admin_experience_edit_id" id="admin_experience_edit_id" value="">

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_experience_edit_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_experience_edit_save_btn">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR EDIT EXPERIENCE MODAL -->  






<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
    
    // INITIALIZE DATATABLES
    // $('#basic-datatables').DataTable({});    
      
    //SCRIPT FOR RESET ALL FIELD VALUES WHEN DISMISS MODAL (ADD EXPERIENCE)    
    $('#admin_experience_add_modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#admin_experience_add_alert_div").empty() ;
        $("#admin_experience_add_alert_div").removeClass() ;
    })

    //SCRIPT FOR DISABLE INPUT END DATE WHEN CHECK CURRENT CHECKBOX (ADD EXPERIENCE)
    $(document).on('change', "#admin_experience_add_checkbox_current", function () {
      if(this.checked) {        
        $("#admin_experience_add_end").prop('disabled', true);        
      } else {
        $("#admin_experience_add_end").prop('disabled', false);
      }
    }) ;

    // AJAX REQUEST FOR ADDING NEW EXPERIENCE
    $(document).on('click', "#admin_experience_add_save_btn", function () {
      var empty = 0;  
      // get form and its dependences 
      var theForm = $("#admin_experience_add_form");
      var formAction = theForm[0].action;      
      var formMethod = theForm[0].method;   
      var formData = theForm.serialize();         
        //   console.log(formData);
        //   console.log(formAction);
        //   console.log(formMethod);
      
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
        $("#admin_experience_add_alert_div").empty() ;
        $("#admin_experience_add_alert_div").removeClass() ;
        $("#admin_experience_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#admin_experience_add_alert_div").append("Empty Form!") ;
      } else {
        //send ajax request
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
                $("#admin_experience_add_alert_div").empty() ;
                $("#admin_experience_add_alert_div").removeClass() ;
                        
                if (data['admin_experience_add_errors']) {
                  $("#admin_experience_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_experience_add_errors'] , function( key, value ) {
                      $("#admin_experience_add_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_experience_add_errors_single']) {
                  $("#admin_experience_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_experience_add_alert_div").append("<li>" + data['admin_experience_add_errors_single'] + "</li>") ;
                } 
                if (data['admin_experience_add_success']) {
                  $("#admin_experience_add_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_experience_add_alert_div").append("<li>" + data['admin_experience_add_success'] + "</li>") ;
                  theForm.each(function(){
                      this.reset();
                  });                  
                  setTimeout(function(){
                      $("#admin_experience_add_modal").load(" #admin_experience_add_modal > *");                      
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

    //SCRIPT FOR ACCESS DELETE EXPERIENCE IN MODAL
    $(document).on('click', ".admin_experience_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_experience_delete_btn").attr("href" , currentHrefForDelete );
        $("#admin_experience_delete_btn").attr("data-id" , currentIdForDelete );
        $("#admin_experience_delete_alert_div").empty() ;
        $("#admin_experience_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING EXPERIENCE
    $(document).on('click', "#admin_experience_delete_btn", function (e) {  
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
            $("#admin_experience_delete_alert_div").empty() ;
            $("#admin_experience_delete_alert_div").removeClass() ;

            if (data['admin_experience_delete_success']) {
                $("#admin_experience_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_experience_delete_alert_div").append("<p>" + data['admin_experience_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_experience_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_experience_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_experience_delete_alert_div").append("<p>" + data['admin_experience_delete_error'] + "</p>") ;
            }
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ; 

    }) ;

    // SCRIPT FOR SHOWING EDITING EXPERIENCE MODAL  
    $(document).on('click', ".admin_experience_edit_class", function (e) {
      e.preventDefault();
      var currentExperienceID = $(this).attr("data-id");            
      
      $.ajax({
          url: "{{ route('admin.experience.showEditForm') }}",
          method: "get",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: { id : currentExperienceID } ,
          dataType: "json",
          success: function(data){             
              $('#admin_experience_edit_modal').modal('show').scrollTop(-1);
              $("#admin_experience_edit_name").val(data['name']) ;
              $("#admin_experience_edit_position").val(data['position']) ;
              $("#admin_experience_edit_start").val(data['start']) ;
              $("#admin_experience_edit_description").val(data['description']) ;              
              if (data['ordering'] < 999) {
                $("#admin_experience_edit_ordering").val(data['ordering']) ;
              } else {
                $("#admin_experience_edit_ordering").val('') ;
              }
              $("#admin_experience_edit_id").val(data['id']) ;

              if (data['end'] === null) {
                $('#admin_experience_edit_checkbox_current').prop('checked', true) ;              
                $("#admin_experience_edit_end").prop('disabled', true);
                $('#admin_experience_edit_end').val('');
              } else {
                $('#admin_experience_edit_checkbox_current').prop('checked', false) ;
                $("#admin_experience_edit_end").prop('disabled', false);
                $("#admin_experience_edit_end").val(data['end']) ;
              }
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    //SCRIPT FOR DISABLE INPUT END DATE WHEN CHECK CURRENT CHECKBOX (EDIT EXPERIENCE)
    $(document).on('change', "#admin_experience_edit_checkbox_current", function () {
      if(this.checked) {        
        $("#admin_experience_edit_end").prop('disabled', true);        
      } else {
        $("#admin_experience_edit_end").prop('disabled', false);
      }
    }) ;

    // AJAX REQUEST FOR EDITING EXPERIENCE
    $(document).on('click', "#admin_experience_edit_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_experience_edit_form");
      var formAction = theForm[0].action;
      var formMethod = theForm[0].method;
      var formData = theForm.serialize();
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
        $("#admin_experience_edit_alert_div").empty() ;
        $("#admin_experience_edit_alert_div").removeClass() ;
        $("#admin_experience_edit_alert_div").addClass('m-2 alert alert-danger') ;
        $("#admin_experience_edit_alert_div").append("Empty Form!") ;
      } else {
        //send ajax request
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
                $("#admin_experience_edit_alert_div").empty() ;
                $("#admin_experience_edit_alert_div").removeClass() ;
                        
                if (data['admin_experience_edit_errors']) {
                  $("#admin_experience_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_experience_edit_errors'] , function( key, value ) {
                      $("#admin_experience_edit_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_experience_edit_errors_single']) {
                  $("#admin_experience_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_experience_edit_alert_div").append("<li>" + data['admin_experience_edit_errors_single'] + "</li>") ;
                } 
                if (data['admin_experience_edit_success']) {
                  $("#admin_experience_edit_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_experience_edit_alert_div").append("<li>" + data['admin_experience_edit_success'] + "</li>") ;
                  setTimeout(function(){
                      $("#admin_experience_edit_alert_div").empty() ;
                      $("#admin_experience_edit_alert_div").removeClass() ;
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

    //SCRIPT FOR RESET ALERT FIELD WHEN DISMISS MODAL (EDIT EXPERIENCE)    
    $('#admin_experience_edit_modal').on('hidden.bs.modal', function () {        
        $("#admin_experience_edit_alert_div").empty() ;
        $("#admin_experience_edit_alert_div").removeClass() ;
    })

});
</script>








@endsection