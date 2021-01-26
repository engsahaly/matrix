@php
	
	<!-- START - about data -->
	<!-- ======================= -->
		<!-- get all about details -->
		use \App\Http\Controllers\AboutController;
		$about = AboutController::aboutData();	

		<!-- get about details with its format - respect line breaks-->
		{!! nl2br(e($about->about)) !!}

		<!-- display images from about table or default image -->
		@if ($about->about_image != null) 
			<img src="{{ asset('storage') }}/{{ $about->about_image }}" alt="profile photo">
		@else
			<img src="{{ asset('storage') }}/default.jpg" alt="default image">
		@endif

		<!-- link to download cv -->
		@if ($about->cv != null)
			<a href="{{ route('admin.about.downloadcv') }}">Download Resume</a>
		@endif

		<!-- display main about data -->
		{{ $about->name }}
		{{ $about->position }}
		{{ $about->birth_date }}
		{{ $about->experience_years }}
		{{ $about->projects_count }}
		{{ $about->address_01 }}
		{{ $about->phone_01 }}
		{{ $about->email_01 }}
		{{ $about->address_02 }}
		{{ $about->phone_02 }}
		{{ $about->email_02 }}
		{!! $about->map !!}
		{{ $about->facebook }}
		{{ $about->twitter }}
		{{ $about->linkedin }}
		{{ $about->youtube }}
		{{ $about->pinterest }}
		{{ $about->instagram }}
		{{ $about->behance }}
		{{ $about->dribble }}
		{{ $about->skype }}
		{{ $about->soundcloud }}
		{{ $about->vimeo }}
		{{ $about->tumblr }}
		{{ $about->snapchat }}
		{{ $about->reddit }}
		{{ $about->flickr }}		
	<!-- ======================= -->
	<!-- START - about data -->
	

	<!-- START - experience data -->
	<!-- ======================= -->
		<!-- get all experiences -->
		use \App\Http\Controllers\ExperienceController;
		$experiences = ExperienceController::allExperiences();

		<!-- condition -->
		@if (count($experiences) > 0) 
		@endif
		
		<!-- loop through experiences -->
		@foreach ($experiences as $key => $experience)
		@endforeach
		
		<!-- display start date -->
		{{ substr( date('F', strtotime($experience->start)), 0, 3 ) }} {{ date('Y', strtotime($experience->start)) }} -   
		
		<!-- display end date -->
		@if ($experience->end == null) 
			Current
		@else                                                 
			{{ substr( date('F', strtotime($experience->end)), 0, 3 ) }} {{ date('Y', strtotime($experience->end)) }}
		@endif

		<!-- display main experience data -->
		{{ $experience->name }}
		{{ $experience->position }}
		@if ($experience->description != null || $experience->description != '') 
			{{ $experience->description }}                                                
		@endif
	<!-- ======================= -->
	<!-- END - experience data -->


	<!-- START - education data -->
	<!-- ======================= -->
		<!-- get all education -->
		use \App\Http\Controllers\EducationController;
		$education = EducationController::allEducation();

		<!-- condition -->
		@if (count($education) > 0) 
		@endif
		
		<!-- loop through educations -->
		@foreach ($education as $key => $singleEducation)
		@endforeach
		
		<!-- display start date -->
		{{ substr( date('F', strtotime($singleEducation->start)), 0, 3 ) }} {{ date('Y', strtotime($singleEducation->start)) }} -   
		
		<!-- display end date -->
		@if ($singleEducation->end == null) 
			Current
		@else                                                 
			{{ substr( date('F', strtotime($singleEducation->end)), 0, 3 ) }} {{ date('Y', strtotime($singleEducation->end)) }}
		@endif

		<!-- display main singleEducation data -->
		{{ $singleEducation->name }}
		{{ $singleEducation->degree }}
		@if ($singleEducation->description != null || $singleEducation->description != '') 
			{{ $singleEducation->description }}                                                
		@endif
	<!-- ======================= -->
	<!-- END - education data -->


	<!-- START - skills data -->
	<!-- ======================= -->
		<!-- get all skills -->
		use \App\Http\Controllers\SkillController;
		$skills = SkillController::allSkills();

		<!-- condition -->
		@if (count($skills) > 0) 
		@endif
		
		<!-- loop through skills -->
		@foreach ($skills as $key => $skill)
		@endforeach
		
		<!-- display main skill data -->
		{{ $skill->name }}
		{{ $skill->range }}		
	<!-- ======================= -->
	<!-- END - skills data -->


	<!-- START - services data -->
	<!-- ======================= -->
		<!-- get all services -->
		use \App\Http\Controllers\ServiceController;
		$services = ServiceController::allServices();

		<!-- condition -->
		@if (count($services) > 0) 
		@endif
		
		<!-- loop through services -->
		@foreach ($services as $key => $service)
		@endforeach
		
		<!-- display image of the service if exists -->
		@if ($service->image != null) 
			<img src="{{ asset('storage') }}/{{ $service->image }}" alt="service photo">
		@else
			<img src="{{ asset('storage') }}/default.jpg" alt="default image">
		@endif

		<!-- display main service data -->
		{{ $service->name }}
		{{ $service->icon }}	
		{{ $service->image }}		
		{{ $service->price }}		
		{{ $service->description }}		
	<!-- ======================= -->
	<!-- END - services data -->


	<!-- START - success stories data -->
	<!-- ======================= -->
		<!-- get all success stories -->
		use \App\Http\Controllers\SuccessController;
		$success = SuccessController::allSuccess();

		<!-- condition -->
		@if (count($success) > 0) 
		@endif
		
		<!-- condition ti determone columns based on stories number -->
		@if (count($success) % 2 == 0) 
			<div class="col-xs-6 col-md-3">
		@else 
			<div class="col-xs-6 col-md-4">
		@endif

		<!-- loop through success -->
		@foreach ($allSuccess as $key => $singleSuccess)
		@endforeach	
		
		<!-- display main singleSuccess data -->
		{{ $singleSuccess->name }}
		{{ $singleSuccess->count }}	
		{{ $singleSuccess->icon }}			
	<!-- ======================= -->
	<!-- END - success stories data -->


	<!-- START - clients data -->
	<!-- ======================= -->
		<!-- get all clients -->
		use \App\Http\Controllers\ClientController;
		$clients = ClientController::allClients();

		<!-- condition -->
		@if (count($clients) > 0)
		@endif
		
		<!-- loop through clients -->
		@foreach ($clients as $key => $client)
		@endforeach
		
		<!-- display image of the client if exists -->
		@if ($client->image != null) 
			<img src="{{ asset('storage') }}/{{ $client->image }}" alt="client photo">
		@else
			<img src="{{ asset('storage') }}/default.jpg" alt="default image">
		@endif

		<!-- display main client data -->
		{{ $client->name }}
		{{ $client->image }}
	<!-- ======================= -->
	<!-- END - clients data -->


	<!-- START - team data -->
	<!-- ======================= -->
		<!-- get all team -->
		use \App\Http\Controllers\TeamController;
		$team = TeamController::allTeam();

		<!-- condition -->
		@if (count($team) > 0)
		@endif
		
		<!-- loop through team members -->
		@foreach ($team as $key => $teamMember)
		@endforeach
		
		<!-- display image of the team member if exists -->
		@if ($teamMember->image != null) 
			<img src="{{ asset('storage') }}/{{ $teamMember->image }}" alt="Team member photo">
		@else
			<img src="{{ asset('storage') }}/default.jpg" alt="default image">
		@endif

		<!-- display main team member data -->
		{{ $teamMember->name }}
		{{ $teamMember->position }}
		{{ $teamMember->facebook }}
		{{ $teamMember->twitter }}
		{{ $teamMember->linkedin }}
		{{ $teamMember->instagram }}
		{{ $teamMember->pinterest }}
	<!-- ======================= -->
	<!-- END - team data -->


	<!-- START - subscribe data -->
	<!-- ======================= -->
		<!-- form data to copy IDs and names and paste them in the main form		 -->
		<form action="{{ route('front.subscribe.add') }}" method="post" id="front_subscribe_add_form">
            @csrf
            <div id="front_subscribe_add_alert_div"></div>
            <input type="email" class="form-control" id="front_subscribe_add_email" name="front_subscribe_add_email" placeholder="Email"><br>
            <button type="button" class="btn btn-primary" id="front_subscribe_add_save_btn">Subscribe</button>
        </form>

		<!-- ajax request to add a new subscriber with ajax -->
		<script>
			$("document").ready(function(){    

				// AJAX REQUEST FOR ADDING NEW SUBSCRIBER
				$(document).on('click', "#front_subscribe_add_save_btn", function () {
					var empty = 0;  
					// get form and its dependences 
					var theForm = $("#front_subscribe_add_form");
					var formAction = theForm[0].action;      
					var formMethod = theForm[0].method;   
					var formData = theForm.serialize();         
						console.log(formData);
						console.log(formAction);
						console.log(formMethod);
					
					//check if all inputs are empty
					$(theForm).find('input').each(function(index, elem){
						if($(elem).val().length == 0){
							empty += 1 ;            
						}
					});

					if (empty == 1) {
						$("#front_subscribe_add_alert_div").empty() ;
						$("#front_subscribe_add_alert_div").removeClass() ;
						$("#front_subscribe_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
						$("#front_subscribe_add_alert_div").append("Empty Form!") ;
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
								$("#front_subscribe_add_alert_div").empty() ;
								$("#front_subscribe_add_alert_div").removeClass() ;
										
								if (data['front_subscribe_add_errors']) {
								$("#front_subscribe_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;                  
								$.each( data['front_subscribe_add_errors'] , function( key, value ) {
									$("#front_subscribe_add_alert_div").append("<li>" + value + "</li>") ;
								});
								}
								if (data['front_subscribe_add_errors_single']) {
								$("#front_subscribe_add_alert_div").addClass('m-2 alert alert-danger text-danger') ;
								$("#front_subscribe_add_alert_div").append("<li>" + data['front_subscribe_add_errors_single'] + "</li>") ;
								}
								if (data['front_subscribe_add_success']) {
								$("#front_subscribe_add_alert_div").addClass('m-2 alert alert-success text-success') ;
								$("#front_subscribe_add_alert_div").append("<li>" + data['front_subscribe_add_success'] + "</li>") ;
								theForm.each(function(){
									this.reset();
								}); ;
								setTimeout(function(){
									$("#front_subscribe_add_form").load(" #front_subscribe_add_form > *");                      
								}, 1000);
								}
							},
							error: function(){
								alert("failed .. Please try again !");
							}
						}) ; 
					}

				}) ;

			});
		</script>
	<!-- ======================= -->
	<!-- END - subscribe data -->


	<!-- START - success projects data -->
	<!-- ======================= -->
		<!-- get all projects -->
		use \App\Http\Controllers\ProjectController;
		$projects = ProjectController::allProjects();

		<!-- condition -->
		@if (count($projects) > 0) 
		@endif			

		<!-- loop through projects -->
		@foreach ($projects as $key => $project)
		@endforeach

		<!-- loop through images of projects -->
		@if (count($project->images) > 0)
			@foreach ($project->images as $key => $image)
			@endforeach
		@endif
		
		<!-- display main single project data -->
		{{ $project->name }}
		{{ $project->created_by }}	
		{{ $project->client }}
		{{ $project->leader }}
		{{ $project->developer }}
		{{ $project->designer }}
		{{ $project->skills }}
		{{ $project->link }}
		{{ $project->date }}
		{{ $project->description }}
		{{ $project->service->name }}
		{{ $project->service->id }}		
	<!-- ======================= -->
	<!-- END - success projects data -->


	<!-- START - contact (message) data -->
	<!-- ======================= -->
		<!-- form data to copy IDs and names and paste them in the main form		 -->				
		<form action="{{ route('front.message.add') }}" method="post" id="front_message_add_form" enctype="multipart/form-data">
            @csrf
			
			<div id="front_message_add_alert_div"></div> <!-- alert div -->

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

		<!-- ajax request to add a new message with ajax -->
		<script>
			$("document").ready(function(){    

				// AJAX REQUEST FOR ADDING NEW MESSAGE
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

			});
		</script>
	<!-- ======================= -->
	<!-- END - contact (message) data -->
	
	
	<!-- START - testmonials data -->
	<!-- ======================= -->
		<!-- get all testmonials -->
		use \App\Http\Controllers\TestmonialController;
		$testmonials = TestmonialController::allTestmonials();

		<!-- condition -->
		@if (count($testmonials) > 0) 
		@endif			

		<!-- loop through testmonials -->
		@foreach ($testmonials as $key => $testmonial)
		@endforeach	
		
		<!-- display main single testmonial data -->
		{{ $testmonial->name }}
		{{ $testmonial->position }}			
		{{ $testmonial->rate }}
		@for ($i = 0; $i < $testmonial->rate; $i++)
			<i class="far fa-star text-success"></i>
		@endfor
		{{ $testmonial->image }}
		<img src="{{ asset('storage') }}/{{ $testmonial->image }}" alt="testmonial image">
		{{ $testmonial->review }}

		<!-- form data to copy IDs and names and paste them in the main form	-->
        <form action="{{ route('front.testmonial.add') }}" method="post" id="front_testmonial_add_form" enctype="multipart/form-data">
            @csrf
			
			<div id="front_testmonial_add_alert_div"></div>

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
                    <!-- <span class="text-danger">*</span> -->
                    <textarea class="form-control" id="front_testmonial_add_review" name="front_testmonial_add_review" placeholder="Review" rows="3"></textarea>
                </div>

                </div>
            </div>
                            
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" id="front_testmonial_add_close_btn" data-dismiss="modal" style="margin-left:10px">Close</button>
                <button type="button" class="btn btn-primary" id="front_testmonial_add_save_btn">Add</button>
            </div>
        </form>

		<!-- ajax request to add a new testmonial with ajax -->
		<script>
			$("document").ready(function(){    

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

			});
		</script>
	<!-- ======================= -->
	<!-- END - testmonials data -->

	
	<!-- START - blogs data -->
	<!-- ======================= -->
		<!-- get all blogs -->
		use \App\Http\Controllers\blogController;
		$blogs = blogController::allBlogs();

		<!-- condition -->
		@if (count($blogs) > 0) 
		@endif			

		<!-- loop through blogs -->
		@foreach ($blogs as $key => $blog)
		@endforeach
		
		
		<!-- display main single blog data -->
		{{ $blog->name }}
		{{ $blog->created_by }}	
		{{ $blog->image }}
		{{ $blog->seo_keywords }}
		{{ $blog->seo_description }}
		{!! $blog->text !!}	
	<!-- ======================= -->
	<!-- END - blogs data -->

	
	<!-- START - settings data -->
	<!-- ======================= -->
		<!-- get all settings -->
		use \App\Http\Controllers\SettingController;
		$settings = SettingController::allSettings();

		<!-- condition -->
		@if (isset($settings)) 
		@endif		
			
		<!-- display main settings data -->
		{{ $settings->name }}

		@if ($settings->fav_icon != null) 
			<img src="{{ asset('storage') }}/{{ $settings->fav_icon }}" alt="Fav Icon Photo">
		@else
			<img src="{{ asset('storage') }}/default.jpg" alt="default image">
		@endif

		@if ($settings->front_logo != null) 
			<img src="{{ asset('storage') }}/{{ $settings->front_logo }}" alt="Fav Icon Photo">
		@else
			<img src="{{ asset('storage') }}/default.jpg" alt="default image">
		@endif

		@if ($settings->back_logo != null) 
			<img src="{{ asset('storage') }}/{{ $settings->back_logo }}" alt="Fav Icon Photo">
		@else
			<img src="{{ asset('storage') }}/default.jpg" alt="default image">
		@endif

		@if ($settings->seo_cover_image != null) 
			<img src="{{ asset('storage') }}/{{ $settings->seo_cover_image }}" alt="Fav Icon Photo">
		@else
			<img src="{{ asset('storage') }}/default.jpg" alt="default image">
		@endif


		{{ $settings->copyright }}
		{{ $settings->seo_site_name }}
		{{ $settings->seo_keywords }}
		{{ $settings->seo_description }}
		{{ $settings->seo_site_url }}		
	<!-- ======================= -->
	<!-- END - settings data -->
	

@endphp
