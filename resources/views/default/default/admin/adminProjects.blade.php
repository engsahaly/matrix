@extends('default.adminMaster')

@section('seoTitle','Projects')
@section('s_projects','active')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-2">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">Projects</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                      <a href="#" data-toggle="modal" data-target="#admin_project_add_modal" id="add_project_btn" class="btn btn-primary btn-xs">
                          <i class="fas fa-plus"></i>
                      </a>
                    </div>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if (count($projects) > 0)
                <!-- Experience card -->
                <div class="col-md-12" >                                                                    

                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width:10px">#</th>
                                <th>Name</th>
                                <th>Created By</th>
                                <th>Client</th>
                                <th>Skills</th>
                                <th>Link</th>
                                <th>Service</th>
                                <th>Order</th>
                                <th style="width:40px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach ($projects as $key => $project)
                        <tr>
                          <td>{{ $key+1 }}</td>
                          <td>{{ $project->name }}</td>
                          <td>{{ $project->created_by }}</td>
                          <td>{{ $project->client }}</td>
                          <td>{{ $project->skills }}</td>
                          <td>{{ $project->link }}</td>
                          <td>{{ $project->service->name }}</td>
                          <td>
                            @if ($project->ordering < 999)
                              <span class="badge badge-success">{{ $project->ordering }}</span>
                            @endif
                          </td>
                          <td>
                            <div class="btn-group">
                                <!-- @if (count($project->images) > 0)
                                  <a class="btn btn-success btn-sm admin_project_show_images_class" data-toggle="collapse" href="#imagesCollapse{{ $project->id }}" role="button" aria-expanded="false"   aria-controls="imagesCollapse{{ $project->id }}"><i class="far fa-images"></i></a>
                                @endif -->

                                <a href="#" data-id="{{ $project->id }}" class="btn btn-primary btn-sm admin_project_edit_class"><i class="fas fa-edit"></i></a>
                                <a href="{{ route('admin.project.delete') }}" class="btn btn-danger btn-sm admin_project_delete_class" data-id="{{ $project->id }}" data-toggle="modal" data-target="#admin_project_delete_modal"><i class="fas fa-trash-alt"></i></a>
                            </div>
                          </td>
                        </tr>
                        @if (count($project->images) > 0)
                          <!-- <tr class="collapse" id="imagesCollapse{{ $project->id }}"> -->
                          <tr>
                            <td colspan="9">
                              @foreach ($project->images as $projectImage)
                                <img class="card-img-top" src="{{ asset('storage/projects') }}/{{ $projectImage->image }}" alt="project image"  style="height:50px; width:50px; border-radius:10px;">
                                <!-- @if (count($project->images) > 0) -->
                                <a href="{{ route('admin.project.deleteImage') }}" data-id="{{ $projectImage->id }}" class='admin_project_delete_image_class text-danger mr-3' data-toggle="modal" data-target="#admin_project_delete_image_modal"><i class='fas fa-times'></i></a>
                                <!-- @endif -->
                              @endforeach
                            </td>
                          </tr>
                        @endif

                        @endforeach
                        </tbody>
                    </table>

                </div>
                @else 
                <div class="col-12 alert alert-danger text-danger">
                    No projects found ...
                </div>
                @endif
            </div>

        </div>
    </div>









<!-- ######################################################################### -->
<!-- ######################################################################### -->
<!-- THIS IS FOR ADD PROJECT MODAL -->      
<div class="modal fade" id="admin_project_add_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_project_add_modal_header">Add Project</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_project_add_alert_div"></div>

        <form action="{{ route('admin.project.add') }}" method="post" id="admin_project_add_form" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-4 form-group">
                    <label for="admin_project_add_name">Name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_project_add_name" name="admin_project_add_name" placeholder="Name">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_created_by">Created By</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_add_created_by" name="admin_project_add_created_by" placeholder="Created By">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_client">Client</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_add_client" name="admin_project_add_client" placeholder="Client">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_leader">Leader</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_add_leader" name="admin_project_add_leader" placeholder="Leader">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_developer">Developer</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_add_developer" name="admin_project_add_developer" placeholder="Developer">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_designer">Designer</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_add_designer" name="admin_project_add_designer" placeholder="Designer">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_skills">Skills</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_add_skills" name="admin_project_add_skills" placeholder="Skills">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_link">Link</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_project_add_link" name="admin_project_add_link" placeholder="Link">
                </div>                

                <div class="col-4 form-group">
                    <label for="admin_project_add_date">Date</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="month" class="form-control" id="admin_project_add_date" name="admin_project_add_date">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_service">Service</label>
                    <span class="text-danger">*</span>
                    <select class="form-control" id="admin_project_add_service" name="admin_project_add_service">   
                      <option disabled selected>------</option>
                      @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_images">Images</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="admin_project_add_images" name="admin_project_add_images[]" multiple>
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_add_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_project_add_ordering" name="admin_project_add_ordering" min="1" placeholder="Order">
                </div>

                <div class="col-12 form-group">
                    <label for="admin_project_add_description">Description</label>
                    <!-- <span class="text-danger">*</span> -->
                    <textarea class="form-control" id="admin_project_add_description" name="admin_project_add_description" placeholder="Description" rows="3"></textarea>
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_project_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_project_add_save_btn">Add</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR ADD PROJECT MODAL -->  

<!-- THIS IS FOR DELETE PROJECT MODAL -->
<div class="modal fade" id="admin_project_delete_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_project_delete_modal_header">Delete Project</h5>
            </div>

            <div id="admin_project_delete_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this project ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_project_delete_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE PROJECT MODAL -->  

<!-- THIS IS FOR DELETE PROJECT IMAGE MODAL -->
<div class="modal fade" id="admin_project_delete_image_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">

            <div class="modal-header bg-danger text-white">
                <h5 class="modal-title" id="admin_project_delete_image_modal_header">Delete Image</h5>
            </div>

            <div id="admin_project_delete_image_alert_div"></div>

            <div class="modal-body">
                Are you sure you want to delete this image ?
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal" style="margin-left:10px">Close</button>
                <a href="#" data-id="#" class="btn btn-primary" id="admin_project_delete_image_btn">Delete</a>
            </div>

      </div>
  </div>
</div>
<!-- THIS IS FOR DELETE PROJECT IMAGE MODAL -->  

<!-- THIS IS FOR EDIT PROJECT MODAL -->      
<div class="modal fade" id="admin_project_edit_modal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="admin_project_edit_modal_header">Edit Skill</h5>        
      </div>

      <div class="modal-body">
        <div id="admin_project_edit_alert_div"></div>

        <form action="{{ route('admin.project.update') }}" method="post" id="admin_project_edit_form" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">

                <div class="col-4 form-group">
                    <label for="admin_project_edit_name">Name</label>
                    <span class="text-danger">*</span>
                    <input type="text" class="form-control" id="admin_project_edit_name" name="admin_project_edit_name" value="">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_created_by">Created By</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_edit_created_by" name="admin_project_edit_created_by" value="">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_client">Client</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_edit_client" name="admin_project_edit_client" value="">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_leader">Leader</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_edit_leader" name="admin_project_edit_leader" value="">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_developer">Developer</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_edit_developer" name="admin_project_edit_developer" value="">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_designer">Designer</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_edit_designer" name="admin_project_edit_designer" value="">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_skills">Skills</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="text" class="form-control" id="admin_project_edit_skills" name="admin_project_edit_skills" value="">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_link">Link</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="url" class="form-control" id="admin_project_edit_link" name="admin_project_edit_link" value="">
                </div>                

                <div class="col-4 form-group">
                    <label for="admin_project_edit_date">Date</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="month" class="form-control" id="admin_project_edit_date" name="admin_project_edit_date" value="">
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_service">Service</label>
                    <span class="text-danger">*</span>
                    <select class="form-control" id="admin_project_edit_service" name="admin_project_edit_service">   
                      <option disabled selected>------</option>
                      @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                      @endforeach
                    </select>
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_images">Images</label>
                    <span class="text-danger">*</span>
                    <input type="file" class="form-control" id="admin_project_edit_images" name="admin_project_edit_images[]" multiple>
                    <!-- <small class="text-muted">Please provide font awesome icon name only like this <small class="text-danger">fas fa-ad</small></small> -->
                </div>

                <div class="col-4 form-group">
                    <label for="admin_project_edit_ordering">Order</label>
                    <!-- <span class="text-danger">*</span> -->
                    <input type="number" class="form-control" id="admin_project_edit_ordering" name="admin_project_edit_ordering" min="1">
                </div>

                <div class="col-12 form-group">
                    <label for="admin_project_edit_description">Description</label>
                    <!-- <span class="text-danger">*</span> -->
                    <textarea class="form-control" id="admin_project_edit_description" name="admin_project_edit_description" placeholder="Description" rows="3"></textarea>
                </div>

                <input type="hidden" name="admin_project_edit_id" id="admin_project_edit_id" value="">

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="admin_project_edit_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="admin_project_edit_save_btn">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- THIS IS FOR EDIT PROJECT MODAL -->






<!-- ######################################################################### -->
<!-- ######################################################################### -->
<script>
$("document").ready(function(){    
    
    //SCRIPT FOR RESET ALL FIELD VALUES WHEN DISMISS MODAL (ADD PROJECT)    
    $('#admin_project_add_modal').on('hidden.bs.modal', function () {
        $(this).find('form').trigger('reset');
        $("#admin_project_add_alert_div").empty() ;
        $("#admin_project_add_alert_div").removeClass() ;
    })   

    // AJAX REQUEST FOR ADDING NEW PROJECT
    $(document).on('click', "#admin_project_add_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_project_add_form");
      var formAction = theForm[0].action;      
      var formMethod = theForm[0].method;   
      var formData = new FormData($('#admin_project_add_form')[0]);         
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

      if (empty == 11) {
        $("#admin_project_add_alert_div").empty() ;
        $("#admin_project_add_alert_div").removeClass() ;
        $("#admin_project_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
        $("#admin_project_add_alert_div").append("Empty Form!") ;
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
                $("#admin_project_add_alert_div").empty() ;
                $("#admin_project_add_alert_div").removeClass() ;
                        
                if (data['admin_project_add_errors']) {
                  $("#admin_project_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_project_add_errors'] , function( key, value ) {
                      $("#admin_project_add_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_project_add_errors_single']) {
                  $("#admin_project_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_project_add_alert_div").append("<li>" + data['admin_project_add_errors_single'] + "</li>") ;
                } 
                if (data['admin_project_add_success']) {
                  $("#admin_project_add_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_project_add_alert_div").append("<li>" + data['admin_project_add_success'] + "</li>") ;
                  theForm.each(function(){
                      this.reset();
                  }); ;
                  setTimeout(function(){
                      $("#admin_project_add_modal").load(" #admin_project_add_modal > *");
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

    //SCRIPT FOR ACCESS DELETE PROJECT IN MODAL
    $(document).on('click', ".admin_project_delete_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_project_delete_btn").attr("href" , currentHrefForDelete );
        $("#admin_project_delete_btn").attr("data-id" , currentIdForDelete );
        $("#admin_project_delete_alert_div").empty() ;
        $("#admin_project_delete_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING PROJECT
    $(document).on('click', "#admin_project_delete_btn", function (e) {  
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
            $("#admin_project_delete_alert_div").empty() ;
            $("#admin_project_delete_alert_div").removeClass() ;

            if (data['admin_project_delete_success']) {
                $("#admin_project_delete_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_project_delete_alert_div").append("<p>" + data['admin_project_delete_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_project_delete_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_project_delete_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_project_delete_alert_div").append("<p>" + data['admin_project_delete_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    //SCRIPT FOR ACCESS DELETE PROJECT IMAGE IN MODAL
    $(document).on('click', ".admin_project_delete_image_class", function () {    
        // get attribute value of name (project id)
        var currentHrefForDelete = $(this).attr("href");
        var currentIdForDelete = $(this).attr("data-id");
        $("#admin_project_delete_image_btn").attr("href" , currentHrefForDelete );
        $("#admin_project_delete_image_btn").attr("data-id" , currentIdForDelete );
        $("#admin_project_delete_image_alert_div").empty() ;
        $("#admin_project_delete_image_alert_div").removeClass() ;
    }) ;

    // AJAX REQUEST FOR DELETING PROJECT IMAGE
    $(document).on('click', "#admin_project_delete_image_btn", function (e) {  
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
            $("#admin_project_delete_image_alert_div").empty() ;
            $("#admin_project_delete_image_alert_div").removeClass() ;

            if (data['admin_project_delete_image_success']) {
                $("#admin_project_delete_image_alert_div").addClass('alert alert-success text-success m-2 p-2') ;
                $("#admin_project_delete_image_alert_div").append("<p>" + data['admin_project_delete_image_success'] + "</p>") ;
                setTimeout(function(){// wait for 2 secs(2)
                    $('#admin_project_delete_image_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
                }, 500);
            } else {
                $("#admin_project_delete_image_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#admin_project_delete_image_alert_div").append("<p>" + data['admin_project_delete_image_error'] + "</p>") ;
            }
          },
          error: function() {
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    // SCRIPT FOR SHOWING EDITING PROJECT MODAL  
    $(document).on('click', ".admin_project_edit_class", function (e) {
      e.preventDefault();
      var currentProjectID = $(this).attr("data-id");
      
      $.ajax({
          url: "{{ route('admin.project.showEditForm') }}",
          method: "get",
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          data: { id : currentProjectID } ,
          dataType: "json",
          success: function(data){             
              $('#admin_project_edit_modal').modal('show').scrollTop(-1);
              $("#admin_project_edit_name").val(data['name']) ;
              $("#admin_project_edit_created_by").val(data['created_by']) ;
              $("#admin_project_edit_client").val(data['client']) ;
              $("#admin_project_edit_leader").val(data['leader']) ;
              $("#admin_project_edit_developer").val(data['developer']) ;
              $("#admin_project_edit_designer").val(data['designer']) ;
              $("#admin_project_edit_skills").val(data['skills']) ;
              $("#admin_project_edit_link").val(data['link']) ;
              $("#admin_project_edit_date").val(data['date']) ;
              $("#admin_project_edit_service").val(data['service_id']) ;
              if (data['ordering'] < 999) {
                $("#admin_project_edit_ordering").val(data['ordering']) ;
              } else {
                $("#admin_project_edit_ordering").val('') ;
              }
              $("#admin_project_edit_description").val(data['description']) ;
              $("#admin_project_edit_id").val(data['id']) ;
          },
          error: function(){
              alert("failed .. Please try again !");
          }
      }) ;

    }) ;

    // AJAX REQUEST FOR EDITING PROJECT    
    $(document).on('click', "#admin_project_edit_save_btn", function () {
      var empty = 0;
      // get form and its dependences 
      var theForm = $("#admin_project_edit_form");
      var formAction = theForm[0].action;
      var formMethod = theForm[0].method;
      //var formData = theForm.serialize();
      var formData = new FormData($('#admin_project_edit_form')[0]);
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

      if (empty == 11) {
        $("#admin_project_edit_alert_div").empty() ;
        $("#admin_project_edit_alert_div").removeClass() ;
        $("#admin_project_edit_alert_div").addClass('m-2 alert alert-danger') ;
        $("#admin_project_edit_alert_div").append("Empty Form!") ;
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
                $("#admin_project_edit_alert_div").empty() ;
                $("#admin_project_edit_alert_div").removeClass() ;
                        
                if (data['admin_project_edit_errors']) {
                  $("#admin_project_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
                  $.each( data['admin_project_edit_errors'] , function( key, value ) {
                      $("#admin_project_edit_alert_div").append("<li>" + value + "</li>") ;
                  });
                }
                if (data['admin_project_edit_errors_single']) {
                  $("#admin_project_edit_alert_div").addClass('m-2 alert alert-danger text-danger') ;
                  $("#admin_project_edit_alert_div").append("<li>" + data['admin_project_edit_errors_single'] + "</li>") ;
                } 
                if (data['admin_project_edit_success']) {
                  $("#admin_project_edit_alert_div").addClass('m-2 alert alert-success text-success') ;
                  $("#admin_project_edit_alert_div").append("<li>" + data['admin_project_edit_success'] + "</li>") ;
                  setTimeout(function(){
                      $("#admin_project_edit_alert_div").empty() ;
                      $("#admin_project_edit_alert_div").removeClass() ;
                      $("#admin_project_edit_images").val(null) ;
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

    //SCRIPT FOR RESET ALERT FIELD WHEN DISMISS MODAL (EDIT PROJECT)    
    $('#admin_project_edit_modal').on('hidden.bs.modal', function () {        
        $("#admin_project_edit_alert_div").empty() ;
        $("#admin_project_edit_alert_div").removeClass() ;
        $("#admin_project_edit_image").val(null) ;
    })

});
</script>








@endsection