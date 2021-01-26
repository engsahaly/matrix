@extends('default.adminMaster')

@section('seoTitle','My Team')
@section('s_team','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Team</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                      <a href="#" data-toggle="modal" data-target="#admin_team_add_modal" id="add_team_btn" class="btn btn-primary btn-xs">
                          <i class="fas fa-plus"></i>
                      </a>
                    </div>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($team) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >

                    <table class="display table table-striped table-hover" id="basic-datatables">
                        <thead>
                            <tr>
                                <th style="width: 10px">#</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Image</th>
                                <th>Social</th>
                                <th>Order</th>
                                <th style="width: 40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($team as $key => $teamMember)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $teamMember->name }}</td>
                            <td>{{ $teamMember->position }}</td>              
                            <td>
                              @if ($teamMember->image != null)
                                <img class="card-img-top" src="{{ asset('storage') }}/{{ $teamMember->image }}" alt="Team member image" style="height:60px; width:60px; border-radius:10px;">
                              @else 
                                ------------
                              @endif
                            </td>
                            <td>
                              @if ( $teamMember->facebook != null && $teamMember->facebook != '')
                                <a href="{{ $teamMember->facebook }}" target="_blank"><i class="mr-1 fab fa-facebook-f"></i></a>
                              @endif
                              @if ( $teamMember->twitter != null && $teamMember->twitter != '')
                                <a href="{{ $teamMember->twitter }}" target="_blank"><i class="mr-1 fab fa-twitter"></i></a>
                              @endif
                              @if ( $teamMember->linkedin != null && $teamMember->linkedin != '')
                                <a href="{{ $teamMember->linkedin }}" target="_blank"><i class="mr-1 fab fa-linkedin-in"></i></a>
                              @endif
                              @if ( $teamMember->instagram != null && $teamMember->instagram != '')
                                <a href="{{ $teamMember->instagram }}" target="_blank"><i class="mr-1 fab fa-instagram"></i></a>
                              @endif
                              @if ( $teamMember->pinterest != null && $teamMember->pinterest != '')
                                <a href="{{ $teamMember->pinterest }}" target="_blank"><i class="mr-1 fab fa-pinterest-p"></i></a>
                              @endif
                            </td>
                            <td>
                            @if ($teamMember->ordering < 999)
                              <span class="badge badge-success">{{ $teamMember->ordering }}</span>
                            @endif
                            </td>
                            <td>
                              <div class="btn-group">
                                  <a href="#" data-id="{{ $teamMember->id }}" class="btn btn-primary btn-sm admin_team_edit_class"><i class="fas fa-edit"></i></a>
                                  <a href="{{ route('admin.team.delete') }}" class="btn btn-danger btn-sm admin_team_delete_class" data-id="{{ $teamMember->id }}" data-toggle="modal" data-target="#admin_team_delete_modal"><i class="fas fa-trash-alt"></i></a>
                              </div>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>

                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No team members found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR ADD SERVICE MODAL -->      
<div class="modal fade" id="admin_team_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_team_add_modal_header">Add Member</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_team_add_alert_div"></div>

        <form action="{{ route('admin.team.add') }}" method="post" id="admin_team_add_form" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="admin_team_add_name">Name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_team_add_name" name="admin_team_add_name" placeholder="Name">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_add_position">Position</label>                    
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_team_add_position" name="admin_team_add_position" placeholder="Position">                    
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_add_image">Image</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="admin_team_add_image" name="admin_team_add_image">
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_add_facebook">facebook</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_add_facebook" name="admin_team_add_facebook" placeholder="Facebook">                                        
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_add_twitter">twitter</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_add_twitter" name="admin_team_add_twitter" placeholder="Twitter">                                        
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_add_linkedin">linkedin</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_add_linkedin" name="admin_team_add_linkedin" placeholder="Linkedin">                                        
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_add_instagram">instagram</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_add_instagram" name="admin_team_add_instagram" placeholder="Instagram">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_add_pinterest">pinterest</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_add_pinterest" name="admin_team_add_pinterest" placeholder="Pinterest">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_add_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_team_add_ordering" name="admin_team_add_ordering" min="1" placeholder="Order">
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_team_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_team_add_save_btn">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR ADD SERVICE MODAL -->  

<!-- THIS IS FOR DELETE SERVICE MODAL -->      
<div class="modal fade" id="admin_team_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_team_delete_modal_header">Delete Member</h5>
            </div>

            <div id="admin_team_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this member ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_team_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE SERVICE MODAL -->  

<!-- THIS IS FOR EDIT SERVICE MODAL -->      
<div class="modal fade" id="admin_team_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_team_edit_modal_header">Edit Member</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_team_edit_alert_div"></div>

        <form action="{{ route('admin.team.update') }}" method="post" id="admin_team_edit_form" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-6 form-group">
                    <label for="admin_team_edit_name">Name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_team_edit_name" name="admin_team_edit_name" placeholder="Name">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_edit_position">Position</label>                    
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_team_edit_position" name="admin_team_edit_position" placeholder="Position">                    
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_edit_image">Image</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="admin_team_edit_image" name="admin_team_edit_image">
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_edit_facebook">facebook</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_edit_facebook" name="admin_team_edit_facebook" placeholder="Facebook">                                        
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_edit_twitter">twitter</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_edit_twitter" name="admin_team_edit_twitter" placeholder="Twitter">                                        
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_edit_linkedin">linkedin</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_edit_linkedin" name="admin_team_edit_linkedin" placeholder="Linkedin">                                        
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_edit_instagram">instagram</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_edit_instagram" name="admin_team_edit_instagram" placeholder="Instagram">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_edit_pinterest">pinterest</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_team_edit_pinterest" name="admin_team_edit_pinterest" placeholder="Pinterest">
                </div>

                <div class="col-6 form-group">
                    <label for="admin_team_edit_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_team_edit_ordering" name="admin_team_edit_ordering" min="1">
                </div>

                <input type="hidden" name="admin_team_edit_id" id="admin_team_edit_id" value="">

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_team_edit_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_team_edit_save_btn">Update</button>
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
    
    //SCRIPT FOR RESET ALL FIELD VALUES WHEN DISMISS MODAL (ADD TEAM MEMBER)    
    $('#admin_team_add_modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#admin_team_add_alert_div").empty() ;
        $("#admin_team_add_alert_div").removeClass() ;
    })   

    // AJAX REQUEST FOR ADDING NEW TEAM MEMBER
    $(document).on('click', "#admin_team_add_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_team_add_form");
      var formAction = theForm[0].action;      
      var formMethod = theForm[0].method;   
      var formData = new FormData($('#admin_team_add_form')[0]);
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

      if (empty == 8) {
        $("#admin_team_add_alert_div").empty() ;
        $("#admin_team_add_alert_div").removeClass() ;
        $("#admin_team_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#admin_team_add_alert_div").append("Empty Form!") ;
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
                $("#admin_team_add_alert_div").empty() ;
                $("#admin_team_add_alert_div").removeClass() ;
                        
                if (data['admin_team_add_errors']) {
                  $("#admin_team_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_team_add_errors'] , function( key, value ) {
                      $("#admin_team_add_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_team_add_errors_single']) {
                  $("#admin_team_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_team_add_alert_div").append("<li>" + data['admin_team_add_errors_single'] + "</li>") ;
                } 
                if (data['admin_team_add_success']) {
                  $("#admin_team_add_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_team_add_alert_div").append("<li>" + data['admin_team_add_success'] + "</li>") ;
                  theForm.each(function(){
                      this.reset();
                  }); ;
                  setTimeout(function(){
                      $("#admin_team_add_modal").load(" #admin_team_add_modal > *");
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

    //SCRIPT FOR ACCESS DELETE TEAM MEMBER IN MODAL
    $(document).on('click', ".admin_team_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_team_delete_btn").attr("href" , currentHrefForDelete );
        $("#admin_team_delete_btn").attr("data-id" , currentIdForDelete );
        $("#admin_team_delete_alert_div").empty() ;
        $("#admin_team_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING TEAM MEMBER
    $(document).on('click', "#admin_team_delete_btn", function (e) {  
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
            $("#admin_team_delete_alert_div").empty() ;
            $("#admin_team_delete_alert_div").removeClass() ;

            if (data['admin_team_delete_success']) {
                $("#admin_team_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_team_delete_alert_div").append("<p>" + data['admin_team_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_team_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_team_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_team_delete_alert_div").append("<p>" + data['admin_team_delete_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    // SCRIPT FOR SHOWING EDITING TEAM MEMBER MODAL  
    $(document).on('click', ".admin_team_edit_class", function (e) {
      e.preventDefault();
      var currentID = $(this).attr("data-id");
      
      $.ajax({
          url: "{{ route('admin.team.showEditForm') }}",
          method: "get",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: { id : currentID } ,
          dataType: "json",
          success: function(data){             
              $('#admin_team_edit_modal').modal('show').scrollTop(-1);
              $("#admin_team_edit_name").val(data['name']) ;
              $("#admin_team_edit_position").val(data['position']) ;
              $("#admin_team_edit_facebook").val(data['facebook']) ;
              $("#admin_team_edit_twitter").val(data['twitter']) ;
              $("#admin_team_edit_linkedin").val(data['linkedin']) ;
              $("#admin_team_edit_instagram").val(data['instagram']) ;
              $("#admin_team_edit_pinterest").val(data['pinterest']) ;
              if (data['ordering'] < 999) {
                $("#admin_team_edit_ordering").val(data['ordering']) ;
              } else {
                $("#admin_team_edit_ordering").val('') ;
              }
              $("#admin_team_edit_id").val(data['id']) ;
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    // AJAX REQUEST FOR EDITING TEAM MEMBER    
    $(document).on('click', "#admin_team_edit_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_team_edit_form");
      var formAction = theForm[0].action;
      var formMethod = theForm[0].method;
      //var formData = theForm.serialize();
      var formData = new FormData($('#admin_team_edit_form')[0]);
      // console.log(formData);
      // console.log(formAction);
      // console.log(formMethod);
      
      //check if all inputs are empty
      $(theForm).find('input').each(function(index, elem){
        if($(elem).val().length == 0){
            empty += 1 ;            
        }
      });         

      if (empty == 8) {
        $("#admin_team_edit_alert_div").empty() ;
        $("#admin_team_edit_alert_div").removeClass() ;
        $("#admin_team_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#admin_team_edit_alert_div").append("Empty Form!") ;
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
                $("#admin_team_edit_alert_div").empty() ;
                $("#admin_team_edit_alert_div").removeClass() ;
                        
                if (data['admin_team_edit_errors']) {
                  $("#admin_team_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_team_edit_errors'] , function( key, value ) {
                      $("#admin_team_edit_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_team_edit_errors_single']) {
                  $("#admin_team_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_team_edit_alert_div").append("<li>" + data['admin_team_edit_errors_single'] + "</li>") ;
                } 
                if (data['admin_team_edit_success']) {
                  $("#admin_team_edit_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_team_edit_alert_div").append("<li>" + data['admin_team_edit_success'] + "</li>") ;
                  setTimeout(function(){
                      $("#admin_team_edit_alert_div").empty() ;
                      $("#admin_team_edit_alert_div").removeClass() ;
                      $("#admin_team_edit_image").val(null) ;
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

    //SCRIPT FOR RESET ALERT FIELD WHEN DISMISS MODAL (EDIT TEAM MEMBER)    
    $('#admin_team_edit_modal').on('hidden.bs.modal', function () {        
        $("#admin_team_edit_alert_div").empty() ;
        $("#admin_team_edit_alert_div").removeClass() ;
        $("#admin_team_edit_image").val(null) ;
    })

});
</script>








@endsection