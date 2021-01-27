@extends('default.doctorMaster')

@section('seoTitle','my clinics')
@section('s_clinics','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">My Clinics</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">              
                      <a href="#" data-toggle="modal" data-target="#doctor_clinic_add_modal" id="add_clinic_btn" class="btn btn-primary btn-xs">
                          <i class="fas fa-plus"></i>
                      </a>
                    </div>
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
                            <tr>', '', '', 'doctor_id',
                                <th style="width: 10px">#</th>
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
                            <div class="btn-group">
                                <a href="#" data-id="{{ $clinic->id }}" class="btn btn-primary btn-sm doctor_clinic_edit_class"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('doctor.clinic.delete') }}" class="btn btn-danger btn-sm doctor_clinic_delete_class" data-id="{{ $clinic->id }}" data-toggle="modal" data-target="#doctor_clinic_delete_modal"><i class="fas fa-trash-alt"></i></a>
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
<!-- THIS IS FOR ADD clinic MODAL -->      
<div class="modal fade" id="doctor_clinic_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="doctor_clinic_add_modal_header">Add clinic</h5>        
      </div>

      <div class="modal-body">
        <div id="doctor_clinic_add_alert_div"></div>

        <form action="{{ route('doctor.clinic.add') }}" method="post" id="doctor_clinic_add_form">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="doctor_clinic_add_name">Organization</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="doctor_clinic_add_name" name="doctor_clinic_add_name" placeholder="Organization">
                </div>

                <div class="col-6 form-group">
                    <label for="doctor_clinic_add_degree">Degree</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="doctor_clinic_add_degree" name="doctor_clinic_add_degree" placeholder="Degree">
                </div>

                <div class="col-5 form-group">
                    <label for="doctor_clinic_add_start">Start Date</label>
                    <span class="text-danger">*</span>
                    <input type="month" class="form-control" id="doctor_clinic_add_start" name="doctor_clinic_add_start">
                </div>

                <div class="col-5 form-group">
                    <label for="doctor_clinic_add_end">End Date</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="month" class="form-control" id="doctor_clinic_add_end" name="doctor_clinic_add_end">
                    <input type="checkbox" class="mr-1" id="doctor_clinic_add_checkbox_current" name="doctor_clinic_add_checkbox_current">
                    <label class="form-check-label" for="doctor_clinic_add_checkbox_current">Current</label>
                </div>

                <div class="col-2 form-group">
                    <label for="doctor_clinic_add_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="doctor_clinic_add_ordering" name="doctor_clinic_add_ordering" min="1" placeholder="Order">
                </div>

                <div class="col-12 form-group">
                    <label for="doctor_clinic_add_description">Description</label>                                            
                    <textarea name="doctor_clinic_add_description" id="doctor_clinic_add_description" class="w-100 p-2" rows="1" style="border:1px solid #D3D3D3; border-radius:7px;" placeholder="Description"></textarea>
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="doctor_clinic_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="doctor_clinic_add_save_btn">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR ADD clinic MODAL -->  

<!-- THIS IS FOR DELETE clinic MODAL -->      
<div class="modal fade" id="doctor_clinic_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="doctor_clinic_delete_modal_header">Delete clinic</h5>
            </div>

            <div id="doctor_clinic_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this clinic ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="doctor_clinic_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE clinic MODAL -->  

<!-- THIS IS FOR EDIT clinic MODAL -->      
<div class="modal fade" id="doctor_clinic_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="doctor_clinic_edit_modal_header">Edit clinic</h5>        
      </div>

      <div class="modal-body">
        <div id="doctor_clinic_edit_alert_div"></div>

        <form action="{{ route('doctor.clinic.update') }}" method="post" id="doctor_clinic_edit_form">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="doctor_clinic_edit_name">Organization</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="doctor_clinic_edit_name" name="doctor_clinic_edit_name" placeholder="Organization">
                </div>

                <div class="col-6 form-group">
                    <label for="doctor_clinic_edit_degree">Degreee</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="doctor_clinic_edit_degree" name="doctor_clinic_edit_degree" placeholder="Degree">
                </div>

                <div class="col-5 form-group">
                    <label for="doctor_clinic_edit_start">Start Date</label>
                    <span class="text-danger">*</span>
                    <input type="month" class="form-control" id="doctor_clinic_edit_start" name="doctor_clinic_edit_start">
                </div>

                <div class="col-5 form-group">
                    <label for="doctor_clinic_edit_end">End Date</label>
                    <span class="text-danger">*</span>
                    <input type="month" class="form-control" id="doctor_clinic_edit_end" name="doctor_clinic_edit_end">
                    <input type="checkbox" class="mr-1" id="doctor_clinic_edit_checkbox_current" name="doctor_clinic_edit_checkbox_current">
                    <label class="form-check-label" for="doctor_clinic_edit_checkbox_current">Current</label>
                </div>

                <div class="col-2 form-group">
                    <label for="doctor_clinic_edit_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="doctor_clinic_edit_ordering" name="doctor_clinic_edit_ordering" min="1">
                </div>

                <div class="col-12 form-group">
                    <label for="doctor_clinic_edit_description">Description</label>                                            
                    <textarea name="doctor_clinic_edit_description" id="doctor_clinic_edit_description" class="w-100 p-2" rows="1" style="border:1px solid #D3D3D3; border-radius:7px;" placeholder="description"></textarea>
                </div>

                <input type="hidden" name="doctor_clinic_edit_id" id="doctor_clinic_edit_id" value="">

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="doctor_clinic_edit_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="doctor_clinic_edit_save_btn">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR EDIT clinic MODAL -->  






<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
    
    //SCRIPT FOR RESET ALL FIELD VALUES WHEN DISMISS MODAL (ADD clinic)    
    $('#doctor_clinic_add_modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#doctor_clinic_add_alert_div").empty() ;
        $("#doctor_clinic_add_alert_div").removeClass() ;
    })

    //SCRIPT FOR DISABLE INPUT END DATE WHEN CHECK CURRENT CHECKBOX (ADD clinic)
    $(document).on('change', "#doctor_clinic_add_checkbox_current", function () {
      if(this.checked) {        
        $("#doctor_clinic_add_end").prop('disabled', true);        
      } else {
        $("#doctor_clinic_add_end").prop('disabled', false);
      }
    }) ;

    // AJAX REQUEST FOR ADDING NEW clinic
    $(document).on('click', "#doctor_clinic_add_save_btn", function () {
      var empty = 0;  
      // get form and its dependences 
      var theForm = $("#doctor_clinic_add_form");
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
        $("#doctor_clinic_add_alert_div").empty() ;
        $("#doctor_clinic_add_alert_div").removeClass() ;
        $("#doctor_clinic_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#doctor_clinic_add_alert_div").append("Empty Form!") ;
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
                $("#doctor_clinic_add_alert_div").empty() ;
                $("#doctor_clinic_add_alert_div").removeClass() ;
                        
                if (data['doctor_clinic_add_errors']) {
                  $("#doctor_clinic_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['doctor_clinic_add_errors'] , function( key, value ) {
                      $("#doctor_clinic_add_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['doctor_clinic_add_errors_single']) {
                  $("#doctor_clinic_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#doctor_clinic_add_alert_div").append("<li>" + data['doctor_clinic_add_errors_single'] + "</li>") ;
                } 
                if (data['doctor_clinic_add_success']) {
                  $("#doctor_clinic_add_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#doctor_clinic_add_alert_div").append("<li>" + data['doctor_clinic_add_success'] + "</li>") ;
                  theForm.each(function(){
                      this.reset();
                  }); ;
                  setTimeout(function(){
                      $("#doctor_clinic_add_modal").load(" #doctor_clinic_add_modal > *");
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

    //SCRIPT FOR ACCESS DELETE clinic IN MODAL
    $(document).on('click', ".doctor_clinic_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#doctor_clinic_delete_btn").attr("href" , currentHrefForDelete );
        $("#doctor_clinic_delete_btn").attr("data-id" , currentIdForDelete );
        $("#doctor_clinic_delete_alert_div").empty() ;
        $("#doctor_clinic_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING clinic
    $(document).on('click', "#doctor_clinic_delete_btn", function (e) {  
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
            $("#doctor_clinic_delete_alert_div").empty() ;
            $("#doctor_clinic_delete_alert_div").removeClass() ;

            if (data['doctor_clinic_delete_success']) {
                $("#doctor_clinic_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#doctor_clinic_delete_alert_div").append("<p>" + data['doctor_clinic_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#doctor_clinic_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#doctor_clinic_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#doctor_clinic_delete_alert_div").append("<p>" + data['doctor_clinic_delete_error'] + "</p>") ;
            }
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ; 

    }) ;

    // SCRIPT FOR SHOWING EDITING clinic MODAL  
    $(document).on('click', ".doctor_clinic_edit_class", function (e) {
      e.preventDefault();
      var currentExperienceID = $(this).attr("data-id");            
      
      $.ajax({
          url: "{{ route('doctor.clinic.showEditForm') }}",
          method: "get",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: { id : currentExperienceID } ,
          dataType: "json",
          success: function(data){             
              $('#doctor_clinic_edit_modal').modal('show').scrollTop(-1);
              $("#doctor_clinic_edit_name").val(data['name']) ;
              $("#doctor_clinic_edit_degree").val(data['degree']) ;
              $("#doctor_clinic_edit_start").val(data['start']) ;
              $("#doctor_clinic_edit_description").val(data['description']) ;              
              if (data['ordering'] < 999) {
                $("#doctor_clinic_edit_ordering").val(data['ordering']) ;
              } else {
                $("#doctor_clinic_edit_ordering").val('') ;
              }
              $("#doctor_clinic_edit_id").val(data['id']) ;

              if (data['end'] === null) {
                $('#doctor_clinic_edit_checkbox_current').prop('checked', true) ;              
                $("#doctor_clinic_edit_end").prop('disabled', true);
                $('#doctor_clinic_edit_end').val('');
              } else {
                $('#doctor_clinic_edit_checkbox_current').prop('checked', false) ;
                $("#doctor_clinic_edit_end").prop('disabled', false);
                $("#doctor_clinic_edit_end").val(data['end']) ;
              }
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    //SCRIPT FOR DISABLE INPUT END DATE WHEN CHECK CURRENT CHECKBOX (EDIT clinic)
    $(document).on('change', "#doctor_clinic_edit_checkbox_current", function () {
      if(this.checked) {        
        $("#doctor_clinic_edit_end").prop('disabled', true);
      } else {
        $("#doctor_clinic_edit_end").prop('disabled', false);
      }
    }) ;

    // AJAX REQUEST FOR EDITING clinic
    $(document).on('click', "#doctor_clinic_edit_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#doctor_clinic_edit_form");
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
        $("#doctor_clinic_edit_alert_div").empty() ;
        $("#doctor_clinic_edit_alert_div").removeClass() ;
        $("#doctor_clinic_edit_alert_div").addClass('m-2 alert alert-danger') ;
        $("#doctor_clinic_edit_alert_div").append("Empty Form!") ;
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
                $("#doctor_clinic_edit_alert_div").empty() ;
                $("#doctor_clinic_edit_alert_div").removeClass() ;
                        
                if (data['doctor_clinic_edit_errors']) {
                  $("#doctor_clinic_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['doctor_clinic_edit_errors'] , function( key, value ) {
                      $("#doctor_clinic_edit_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['doctor_clinic_edit_errors_single']) {
                  $("#doctor_clinic_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#doctor_clinic_edit_alert_div").append("<li>" + data['doctor_clinic_edit_errors_single'] + "</li>") ;
                } 
                if (data['doctor_clinic_edit_success']) {
                  $("#doctor_clinic_edit_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#doctor_clinic_edit_alert_div").append("<li>" + data['doctor_clinic_edit_success'] + "</li>") ;
                  setTimeout(function(){
                      $("#doctor_clinic_edit_alert_div").empty() ;
                      $("#doctor_clinic_edit_alert_div").removeClass() ;
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

    //SCRIPT FOR RESET ALERT FIELD WHEN DISMISS MODAL (EDIT clinic)    
    $('#doctor_clinic_edit_modal').on('hidden.bs.modal', function () {        
        $("#doctor_clinic_edit_alert_div").empty() ;
        $("#doctor_clinic_edit_alert_div").removeClass() ;
    })

});
</script>








@endsection