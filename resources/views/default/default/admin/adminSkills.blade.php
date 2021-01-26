@extends('default.adminMaster')

@section('seoTitle','Skills')
@section('s_skills','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Skills</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                      <a href="#" data-toggle="modal" data-target="#admin_skill_add_modal" id="add_skill_btn" class="btn btn-primary btn-xs">
                          <i class="fas fa-plus"></i>
                      </a>
                    </div>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($skills) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >                                                                    

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Skill</th>
                                <th>Range</th>                               
                                <th>Order</th>                               
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($skills as $key => $skill)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $skill->name }}</td>
                            <td>{{ $skill->range }}</td>
                            <td>
                            @if ($skill->ordering < 999)
                              <span class="badge badge-success">{{ $skill->ordering }}</span></td>                            
                            @endif
                            <td>
                              <div class="btn-group">
                                  <a href="#" data-id="{{ $skill->id }}" class="btn btn-primary btn-sm admin_skill_edit_class"><i class="fas fa-edit"></i></a>
                                  <a href="{{ route('admin.skill.delete') }}" class="btn btn-danger btn-sm admin_skill_delete_class" data-id="{{ $skill->id }}" data-toggle="modal" data-target="#admin_skill_delete_modal"><i class="fas fa-trash-alt"></i></a>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No skills found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR ADD SKILL MODAL -->      
<div class="modal fade" id="admin_skill_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_skill_add_modal_header">Add Skill</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_skill_add_alert_div"></div>

        <form action="{{ route('admin.skill.add') }}" method="post" id="admin_skill_add_form">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="admin_skill_add_name">Skill</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_skill_add_name" name="admin_skill_add_name" placeholder="Skill">
                </div>

                <div class="col-3 form-group">
                    <label for="admin_skill_add_range">Range</label>
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="admin_skill_add_range" name="admin_skill_add_range" placeholder="Range" min="1" max="100">
                </div>

                <div class="col-3 form-group">
                    <label for="admin_skill_add_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_skill_add_ordering" name="admin_skill_add_ordering" min="1" placeholder="Order">
                </div>
                
                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_skill_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_skill_add_save_btn">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR ADD SKILL MODAL -->  

<!-- THIS IS FOR DELETE SKILL MODAL -->      
<div class="modal fade" id="admin_skill_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_skill_delete_modal_header">Delete Skill</h5>
            </div>

            <div id="admin_skill_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this skill ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_skill_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE SKILL MODAL -->  

<!-- THIS IS FOR EDIT SKILL MODAL -->      
<div class="modal fade" id="admin_skill_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_skill_edit_modal_header">Edit Skill</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_skill_edit_alert_div"></div>

        <form action="{{ route('admin.skill.update') }}" method="post" id="admin_skill_edit_form">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="admin_skill_edit_name">Skill</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_skill_edit_name" name="admin_skill_edit_name" placeholder="Skill">
                </div>

                <div class="col-3 form-group">
                    <label for="admin_skill_edit_range">Range</label>
                    <span class="text-danger">*</span>
                    <input type="number" class="form-control" id="admin_skill_edit_range" name="admin_skill_edit_range" placeholder="Range" min="1" max="100">
                </div>

                <div class="col-3 form-group">
                    <label for="admin_skill_edit_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_skill_edit_ordering" name="admin_skill_edit_ordering" min="1">
                </div>

                <input type="hidden" name="admin_skill_edit_id" id="admin_skill_edit_id" value="">

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_skill_edit_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_skill_edit_save_btn">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR EDIT SKILL MODAL -->  






<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
    
    //SCRIPT FOR RESET ALL FIELD VALUES WHEN DISMISS MODAL (ADD SKILL)    
    $('#admin_skill_add_modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#admin_skill_add_alert_div").empty() ;
        $("#admin_skill_add_alert_div").removeClass() ;
    })   

    // AJAX REQUEST FOR ADDING NEW SKILL
    $(document).on('click', "#admin_skill_add_save_btn", function () {
      var empty = 0;  
      // get form and its dependences 
      var theForm = $("#admin_skill_add_form");
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

      if (empty == 2) {
        $("#admin_skill_add_alert_div").empty() ;
        $("#admin_skill_add_alert_div").removeClass() ;
        $("#admin_skill_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#admin_skill_add_alert_div").append("Empty Form!") ;
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
                $("#admin_skill_add_alert_div").empty() ;
                $("#admin_skill_add_alert_div").removeClass() ;
                        
                if (data['admin_skill_add_errors']) {
                  $("#admin_skill_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_skill_add_errors'] , function( key, value ) {
                      $("#admin_skill_add_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_skill_add_errors_single']) {
                  $("#admin_skill_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_skill_add_alert_div").append("<li>" + data['admin_skill_add_errors_single'] + "</li>") ;
                } 
                if (data['admin_skill_add_success']) {
                  $("#admin_skill_add_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_skill_add_alert_div").append("<li>" + data['admin_skill_add_success'] + "</li>") ;
                  theForm.each(function(){
                      this.reset();
                  }); ;
                  setTimeout(function(){
                      $("#admin_skill_add_modal").load(" #admin_skill_add_modal > *");
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

    //SCRIPT FOR ACCESS DELETE SKILL IN MODAL
    $(document).on('click', ".admin_skill_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_skill_delete_btn").attr("href" , currentHrefForDelete );
        $("#admin_skill_delete_btn").attr("data-id" , currentIdForDelete );
        $("#admin_skill_delete_alert_div").empty() ;
        $("#admin_skill_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING SKILL
    $(document).on('click', "#admin_skill_delete_btn", function (e) {  
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
            $("#admin_skill_delete_alert_div").empty() ;
            $("#admin_skill_delete_alert_div").removeClass() ;

            if (data['admin_skill_delete_success']) {
                $("#admin_skill_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_skill_delete_alert_div").append("<p>" + data['admin_skill_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_skill_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_skill_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_skill_delete_alert_div").append("<p>" + data['admin_skill_delete_error'] + "</p>") ;
            }
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ; 

    }) ;

    // SCRIPT FOR SHOWING EDITING SKILL MODAL  
    $(document).on('click', ".admin_skill_edit_class", function (e) {
      e.preventDefault();
      var currentExperienceID = $(this).attr("data-id");
      
      $.ajax({
          url: "{{ route('admin.skill.showEditForm') }}",
          method: "get",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: { id : currentExperienceID } ,
          dataType: "json",
          success: function(data){             
              $('#admin_skill_edit_modal').modal('show').scrollTop(-1);
              $("#admin_skill_edit_name").val(data['name']) ;
              $("#admin_skill_edit_range").val(data['range']) ;
              if (data['ordering'] < 999) {
                $("#admin_skill_edit_ordering").val(data['ordering']) ;
              } else {
                $("#admin_skill_edit_ordering").val('') ;
              }
              $("#admin_skill_edit_id").val(data['id']) ;
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    // AJAX REQUEST FOR EDITING SKILL    
    $(document).on('click', "#admin_skill_edit_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_skill_edit_form");
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

      if (empty == 2) {
        $("#admin_skill_edit_alert_div").empty() ;
        $("#admin_skill_edit_alert_div").removeClass() ;
        $("#admin_skill_edit_alert_div").addClass('m-2 alert alert-danger') ;
        $("#admin_skill_edit_alert_div").append("Empty Form!") ;
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
                $("#admin_skill_edit_alert_div").empty() ;
                $("#admin_skill_edit_alert_div").removeClass() ;
                        
                if (data['admin_skill_edit_errors']) {
                  $("#admin_skill_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_skill_edit_errors'] , function( key, value ) {
                      $("#admin_skill_edit_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_skill_edit_errors_single']) {
                  $("#admin_skill_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_skill_edit_alert_div").append("<li>" + data['admin_skill_edit_errors_single'] + "</li>") ;
                } 
                if (data['admin_skill_edit_success']) {
                  $("#admin_skill_edit_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_skill_edit_alert_div").append("<li>" + data['admin_skill_edit_success'] + "</li>") ;
                  setTimeout(function(){
                      $("#admin_skill_edit_alert_div").empty() ;
                      $("#admin_skill_edit_alert_div").removeClass() ;
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

    //SCRIPT FOR RESET ALERT FIELD WHEN DISMISS MODAL (EDIT SKILL)    
    $('#admin_skill_edit_modal').on('hidden.bs.modal', function () {        
        $("#admin_skill_edit_alert_div").empty() ;
        $("#admin_skill_edit_alert_div").removeClass() ;
    })

});
</script>








@endsection