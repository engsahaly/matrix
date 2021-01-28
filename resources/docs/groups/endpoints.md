# Endpoints


## Show user login form




> Example request:

```bash
curl -X GET \
    -G "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>User Login</title>
	<!-- Include favicon -->
	<link rel="icon" type="image/png" sizes="192x192"  href="http://localhost/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://localhost/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/icon/favicon-16x16.png">
	<!-- Microsoft Tiles -->
	<link rel="manifest" href="http://localhost/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="http://localhost/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="http://localhost/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://localhost/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://localhost/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://localhost/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://localhost/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://localhost/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://localhost/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://localhost/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/icon/apple-icon-180x180.png">
	<!-- To run web application in full-screen -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Fonts and icons -->
	<script src="http://localhost/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["http://localhost/css/fonts.min.css"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="http://localhost/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/css/atlantis.min.css">
</head>
<body>
		
	<div class="container">
		<div class="wrapper row justify-content-center align-items-center">
			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>

			<!-- main login div -->
			<div class="card mb-0 col-sm-12 col-md-4 p-0">
				<div class="card-header text-center text-uppercase">
					<h3 class="text-primary">User Login</h3>
				</div>
				<div class="card-body">
				
					
					<form action="http://localhost/login" method="post" class="user_login_form">
						<input type="hidden" name="_token" value="FPeC2UEwjkuQPRG8UNPFQjq8Fax5maTIstRDa4Tr">
						<div class="form-group">
							<label class="form-label" for="user_login_email">Email address</label>
							<input type="email" class="form-control" id="user_login_email" name="user_login_email" placeholder="email@example.com" required>
						</div>

						<div class="form-group">
							<label class="form-label" for="user_login_password">Password</label>
							<input type="password" class="form-control" id="user_login_password" name="user_login_password" placeholder="Password" required>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="user_login_remember" name="user_login_remember">
								<label class="custom-control-label" for="user_login_remember">Remember me</label>
							</div>
						</div>
						
						<button type="submit" class="btn btn-block btn-primary">Sign in</button>
					</form>
				</div>
			</div>

			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="http://localhost/js/core/jquery-3.5.1.min.js"></script>
	<script src="http://localhost/js/core/popper.min.js"></script>
	<script src="http://localhost/js/core/bootstrap.min.js"></script>

</body>
</html>
```
<div id="execution-results-GETlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETlogin"></code></pre>
</div>
<div id="execution-error-GETlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogin"></code></pre>
</div>
<form id="form-GETlogin" data-method="GET" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>login</code></b>
</p>
</form>


## User login




> Example request:

```bash
curl -X POST \
    "http://localhost/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTlogin" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTlogin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTlogin"></code></pre>
</div>
<div id="execution-error-POSTlogin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTlogin"></code></pre>
</div>
<form id="form-POSTlogin" data-method="POST" data-path="login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTlogin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>login</code></b>
</p>
</form>


## Get all doctors - API




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/doctors" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/doctors"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "data": [
        {
            "name": "doctor",
            "email": "doctor@doctor.com"
        }
    ]
}
```
<div id="execution-results-GETapi-doctors" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-doctors"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-doctors"></code></pre>
</div>
<div id="execution-error-GETapi-doctors" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-doctors"></code></pre>
</div>
<form id="form-GETapi-doctors" data-method="GET" data-path="api/doctors" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-doctors', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/doctors</code></b>
</p>
</form>


## Get all clinics with doctor - API




> Example request:

```bash
curl -X GET \
    -G "http://localhost/api/clinics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/api/clinics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{
    "data": [
        {
            "doctor": "doctor",
            "fees": 9366,
            "speciality": "Quae quis rerum mole22",
            "location": "Est id vel sunt et",
            "description": "Molestias beatae dui"
        }
    ]
}
```
<div id="execution-results-GETapi-clinics" hidden>
    <blockquote>Received response<span id="execution-response-status-GETapi-clinics"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-clinics"></code></pre>
</div>
<div id="execution-error-GETapi-clinics" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-clinics"></code></pre>
</div>
<form id="form-GETapi-clinics" data-method="GET" data-path="api/clinics" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETapi-clinics', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>api/clinics</code></b>
</p>
</form>


## /




> Example request:

```bash
curl -X GET \
    -G "http://localhost/" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>Matrix doctors | Home</title>
	<!-- Meta Description -->
	<meta name="description" content="matrix clouds task">
	<!-- Meta csrf -->
	<meta name="csrf-token" content="FPeC2UEwjkuQPRG8UNPFQjq8Fax5maTIstRDa4Tr">
	<!-- Include favicon -->
	<link rel="icon" type="image/png" sizes="192x192"  href="http://localhost/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://localhost/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/icon/favicon-16x16.png">
	<!-- Microsoft Tiles -->
	<link rel="manifest" href="http://localhost/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="http://localhost/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="http://localhost/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://localhost/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://localhost/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://localhost/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://localhost/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://localhost/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://localhost/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://localhost/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/icon/apple-icon-180x180.png">
	<!-- To run web application in full-screen -->
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<!-- CSS Files -->	
	<link rel="stylesheet" href="http://localhost/css/engsahaly.css">
	<link rel="stylesheet" href="http://localhost/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/css/atlantis.min.css">
	<!-- jquery file -->
	<script src="http://localhost/js/core/jquery-3.5.1.min.js"></script>

</head>
<body data-background-color="dark2">
	
	<div class="wrapper">
		
		<!-- include doctor header -->
		<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark2">
        
        <!-- Dashboard Logo -->
        <a href="http://localhost">
            <h4 class="text-white text-uppercase">Matrix Doctors</h4>
        </a>      
        
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">
        
        <div class="container-fluid">            
            
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">                
                <!-- doctor profile -->                
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="http://localhost/img/profile_default.jpg" alt="profile image" class="avatar-img rounded">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                                                    <li>
                                <a href="http://localhost/login" class="dropdown-item">Login / Register</a>
                            </li>   
                                            </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>			
		
		<div class="main-panel" style="width:100%;">			
			<!-- include main contents -->
			
    
    <div class="content">
        <div class="page-inner">            
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                                                            <div class="card col-md-4">
                            <div class="card-body">
                                <h5 class="card-title text-primary">doctor</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Quae quis rerum mole22</h6>
                                <h6 class="card-subtitle mb-2 text-danger">9366 $</h6>
                                <p class="card-text">Molestias beatae dui</p>                                   
                                                                    <a href="http://localhost/login" class="btn btn-sm  btn-success">Reserve</a>
                                                            </div>
                        </div>
                                                </div>

        </div>
    </div>








    <!-- ######################################################################### -->
    <!-- ######################################################################### -->
    <!-- THIS IS FOR RESERVE CLINIC MODAL -->
    <div class="modal fade" id="user_reserve_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="user_reserve_modal_header"> Reserve clinic</h5>
                </div>

                <div id="user_reserve_alert_div"></div>

                <div class="modal-body">
                    Are you sure you want to reserve this clinic?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                    <a href="#" data-id="#" data-user="#" class="btn btn-success" id="user_reserve_btn">Confirm</a>
                </div>

            </div>
        </div>
    </div>
    <!-- THIS IS FOR RESERVE CLINIC MODAL -->








    <!-- ######################################################################### -->
    <!-- ######################################################################### -->
    <script>
    $("document").ready(function(){    
        
    //SCRIPT FOR ACCESS RESERVE CLINIC IN MODAL
    $(document).on('click', ".user_reserve_class", function () {    
        // get attribute value of name (clinic id)
        var currentHrefForreserve = $(this).attr("href");
        var currentIdForreserve = $(this).attr("data-id");
        var currentUser = $(this).attr("data-user");
        $("#user_reserve_btn").attr("href" , currentHrefForreserve );
        $("#user_reserve_btn").attr("data-id" , currentIdForreserve );
        $("#user_reserve_btn").attr("data-user" , currentUser );
    }) ;

    // AJAX REQUEST FOR RESERVING CLINIC
    $(document).on('click', "#user_reserve_btn", function (e) {  
        e.preventDefault();

        // get form and its dependences
        var formAction = $(this).attr("href");
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        // console.log(formAction);
        // console.log(id);
        
        // send ajax request
        $.ajax({
            url: formAction ,
            method: 'POST' ,
            data: { 
                id : id ,
                user : user ,
            } ,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function(data){
            $("#user_reserve_alert_div").empty() ;
            $("#user_reserve_alert_div").removeClass() ;

            if (data['user_reserve_success']) {                
                    $('#user_reserve_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#user_reserve_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#user_reserve_alert_div").append("<p>" + data['user_reserve_error'] + "</p>") ;
            }
            },
            error: function() {
                alert("failed .. Please try again !");
            }
        }) ;

    }) ;

    });
    </script>






			<!-- include doctor footer -->
			<footer>
    <div class="container-fluid">       

        <!-- footer copyright -->        
        <div class="text-center">
            <div>
                This is the footer
            </div>			
        </div>	        
    </div>
</footer> 
		</div>
				
	</div>	

	<!--   Core JS Files   -->
	<script src="http://localhost/js/core/popper.min.js"></script>
	<script src="http://localhost/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="http://localhost/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="http://localhost/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="http://localhost/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Atlantis JS -->
	<script src="http://localhost/js/atlantis.min.js"></script>

	<!-- fontawesome cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	
</body>
</html>

```
<div id="execution-results-GET-" hidden>
    <blockquote>Received response<span id="execution-response-status-GET-"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GET-"></code></pre>
</div>
<div id="execution-error-GET-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GET-"></code></pre>
</div>
<form id="form-GET-" data-method="GET" data-path="/" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GET-', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>/</code></b>
</p>
</form>


## User logout




> Example request:

```bash
curl -X GET \
    -G "http://localhost/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>Matrix doctors | Home</title>
	<!-- Meta Description -->
	<meta name="description" content="matrix clouds task">
	<!-- Meta csrf -->
	<meta name="csrf-token" content="FPeC2UEwjkuQPRG8UNPFQjq8Fax5maTIstRDa4Tr">
	<!-- Include favicon -->
	<link rel="icon" type="image/png" sizes="192x192"  href="http://localhost/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://localhost/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/icon/favicon-16x16.png">
	<!-- Microsoft Tiles -->
	<link rel="manifest" href="http://localhost/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="http://localhost/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="http://localhost/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://localhost/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://localhost/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://localhost/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://localhost/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://localhost/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://localhost/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://localhost/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/icon/apple-icon-180x180.png">
	<!-- To run web application in full-screen -->
	<meta name="apple-mobile-web-app-capable" content="yes">	
	<!-- CSS Files -->	
	<link rel="stylesheet" href="http://localhost/css/engsahaly.css">
	<link rel="stylesheet" href="http://localhost/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/css/atlantis.min.css">
	<!-- jquery file -->
	<script src="http://localhost/js/core/jquery-3.5.1.min.js"></script>

</head>
<body data-background-color="dark2">
	
	<div class="wrapper">
		
		<!-- include doctor header -->
		<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark2">
        
        <!-- Dashboard Logo -->
        <a href="http://localhost">
            <h4 class="text-white text-uppercase">Matrix Doctors</h4>
        </a>      
        
    </div>
    <!-- End Logo Header -->

    <!-- Navbar Header -->
    <nav class="navbar navbar-header navbar-expand-lg" data-background-color="dark2">
        
        <div class="container-fluid">            
            
            <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">                
                <!-- doctor profile -->                
                <li class="nav-item dropdown hidden-caret">
                    <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                        <div class="avatar-sm">
                            <img src="http://localhost/img/profile_default.jpg" alt="profile image" class="avatar-img rounded">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                                                    <li>
                                <a href="http://localhost/login" class="dropdown-item">Login / Register</a>
                            </li>   
                                            </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>			
		
		<div class="main-panel" style="width:100%;">			
			<!-- include main contents -->
			
    
    <div class="content">
        <div class="page-inner">            
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                                                            <div class="card col-md-4">
                            <div class="card-body">
                                <h5 class="card-title text-primary">doctor</h5>
                                <h6 class="card-subtitle mb-2 text-muted">Quae quis rerum mole22</h6>
                                <h6 class="card-subtitle mb-2 text-danger">9366 $</h6>
                                <p class="card-text">Molestias beatae dui</p>                                   
                                                                    <a href="http://localhost/login" class="btn btn-sm  btn-success">Reserve</a>
                                                            </div>
                        </div>
                                                </div>

        </div>
    </div>








    <!-- ######################################################################### -->
    <!-- ######################################################################### -->
    <!-- THIS IS FOR RESERVE CLINIC MODAL -->
    <div class="modal fade" id="user_reserve_modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">

                <div class="modal-header bg-success text-white">
                    <h5 class="modal-title" id="user_reserve_modal_header"> Reserve clinic</h5>
                </div>

                <div id="user_reserve_alert_div"></div>

                <div class="modal-body">
                    Are you sure you want to reserve this clinic?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-gray" data-dismiss="modal" style="margin-left:10px">Close</button>
                    <a href="#" data-id="#" data-user="#" class="btn btn-success" id="user_reserve_btn">Confirm</a>
                </div>

            </div>
        </div>
    </div>
    <!-- THIS IS FOR RESERVE CLINIC MODAL -->








    <!-- ######################################################################### -->
    <!-- ######################################################################### -->
    <script>
    $("document").ready(function(){    
        
    //SCRIPT FOR ACCESS RESERVE CLINIC IN MODAL
    $(document).on('click', ".user_reserve_class", function () {    
        // get attribute value of name (clinic id)
        var currentHrefForreserve = $(this).attr("href");
        var currentIdForreserve = $(this).attr("data-id");
        var currentUser = $(this).attr("data-user");
        $("#user_reserve_btn").attr("href" , currentHrefForreserve );
        $("#user_reserve_btn").attr("data-id" , currentIdForreserve );
        $("#user_reserve_btn").attr("data-user" , currentUser );
    }) ;

    // AJAX REQUEST FOR RESERVING CLINIC
    $(document).on('click', "#user_reserve_btn", function (e) {  
        e.preventDefault();

        // get form and its dependences
        var formAction = $(this).attr("href");
        var id = $(this).attr("data-id");
        var user = $(this).attr("data-user");
        // console.log(formAction);
        // console.log(id);
        
        // send ajax request
        $.ajax({
            url: formAction ,
            method: 'POST' ,
            data: { 
                id : id ,
                user : user ,
            } ,
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            dataType: "json",
            success: function(data){
            $("#user_reserve_alert_div").empty() ;
            $("#user_reserve_alert_div").removeClass() ;

            if (data['user_reserve_success']) {                
                    $('#user_reserve_modal').modal('toggle');
                    $("#mainCont").load(" #mainCont > *");
            } else {
                $("#user_reserve_alert_div").addClass('alert alert-danger text-danger m-2 p-2') ;
                $("#user_reserve_alert_div").append("<p>" + data['user_reserve_error'] + "</p>") ;
            }
            },
            error: function() {
                alert("failed .. Please try again !");
            }
        }) ;

    }) ;

    });
    </script>






			<!-- include doctor footer -->
			<footer>
    <div class="container-fluid">       

        <!-- footer copyright -->        
        <div class="text-center">
            <div>
                This is the footer
            </div>			
        </div>	        
    </div>
</footer> 
		</div>
				
	</div>	

	<!--   Core JS Files   -->
	<script src="http://localhost/js/core/popper.min.js"></script>
	<script src="http://localhost/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="http://localhost/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="http://localhost/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="http://localhost/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>

	<!-- Atlantis JS -->
	<script src="http://localhost/js/atlantis.min.js"></script>

	<!-- fontawesome cdn -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	
</body>
</html>

```
<div id="execution-results-GETlogout" hidden>
    <blockquote>Received response<span id="execution-response-status-GETlogout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETlogout"></code></pre>
</div>
<div id="execution-error-GETlogout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETlogout"></code></pre>
</div>
<form id="form-GETlogout" data-method="GET" data-path="logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETlogout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>logout</code></b>
</p>
</form>


## Create clinic reservation




> Example request:

```bash
curl -X POST \
    "http://localhost/user/reserve" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/reserve"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTuser-reserve" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTuser-reserve"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-reserve"></code></pre>
</div>
<div id="execution-error-POSTuser-reserve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-reserve"></code></pre>
</div>
<form id="form-POSTuser-reserve" data-method="POST" data-path="user/reserve" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTuser-reserve', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>user/reserve</code></b>
</p>
</form>


## get all user reservations




> Example request:

```bash
curl -X GET \
    -G "http://localhost/user/reservations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/reservations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (500):

```json
{
    "message": "Trying to get property 'id' of non-object",
    "exception": "ErrorException",
    "file": "D:\\xampp80\\htdocs\\matrixtest\\app\\Http\\Controllers\\ReservationController.php",
    "line": 46,
    "trace": [
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\app\\Http\\Controllers\\ReservationController.php",
            "line": 46,
            "function": "handleError",
            "class": "Illuminate\\Foundation\\Bootstrap\\HandleExceptions",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Controller.php",
            "line": 54,
            "function": "userReservations",
            "class": "App\\Http\\Controllers\\ReservationController",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\ControllerDispatcher.php",
            "line": 45,
            "function": "callAction",
            "class": "Illuminate\\Routing\\Controller",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 254,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\ControllerDispatcher",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Route.php",
            "line": 197,
            "function": "runController",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 692,
            "function": "run",
            "class": "Illuminate\\Routing\\Route",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Routing\\{closure}",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Middleware\\SubstituteBindings.php",
            "line": 41,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Routing\\Middleware\\SubstituteBindings",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken.php",
            "line": 78,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\VerifyCsrfToken",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\View\\Middleware\\ShareErrorsFromSession.php",
            "line": 49,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\View\\Middleware\\ShareErrorsFromSession",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\AuthenticateSession.php",
            "line": 39,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\AuthenticateSession",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 121,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Session\\Middleware\\StartSession.php",
            "line": 63,
            "function": "handleStatefulRequest",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Session\\Middleware\\StartSession",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\AddQueuedCookiesToResponse",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Cookie\\Middleware\\EncryptCookies.php",
            "line": 67,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Cookie\\Middleware\\EncryptCookies",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 694,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 669,
            "function": "runRouteWithinStack",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 635,
            "function": "runRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Routing\\Router.php",
            "line": 624,
            "function": "dispatchToRoute",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 166,
            "function": "dispatch",
            "class": "Illuminate\\Routing\\Router",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 128,
            "function": "Illuminate\\Foundation\\Http\\{closure}",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest.php",
            "line": 21,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\TransformsRequest",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize.php",
            "line": 27,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\ValidatePostSize",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance.php",
            "line": 86,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Middleware\\PreventRequestsDuringMaintenance",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\fruitcake\\laravel-cors\\src\\HandleCors.php",
            "line": 37,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fruitcake\\Cors\\HandleCors",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\fideloper\\proxy\\src\\TrustProxies.php",
            "line": 57,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 167,
            "function": "handle",
            "class": "Fideloper\\Proxy\\TrustProxies",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Pipeline\\Pipeline.php",
            "line": 103,
            "function": "Illuminate\\Pipeline\\{closure}",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 141,
            "function": "then",
            "class": "Illuminate\\Pipeline\\Pipeline",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Http\\Kernel.php",
            "line": 110,
            "function": "sendRequestThroughRouter",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 324,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Http\\Kernel",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 305,
            "function": "callLaravelOrLumenRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 76,
            "function": "makeApiCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 51,
            "function": "makeResponseCall",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Strategies\\Responses\\ResponseCalls.php",
            "line": 41,
            "function": "makeResponseCallIfEnabledAndNoSuccessResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 236,
            "function": "__invoke",
            "class": "Knuckles\\Scribe\\Extracting\\Strategies\\Responses\\ResponseCalls",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 172,
            "function": "iterateThroughStrategies",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Extracting\\Generator.php",
            "line": 127,
            "function": "fetchResponses",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 119,
            "function": "processRoute",
            "class": "Knuckles\\Scribe\\Extracting\\Generator",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\knuckleswtf\\scribe\\src\\Commands\\GenerateDocumentation.php",
            "line": 73,
            "function": "processRoutes",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 36,
            "function": "handle",
            "class": "Knuckles\\Scribe\\Commands\\GenerateDocumentation",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Util.php",
            "line": 40,
            "function": "Illuminate\\Container\\{closure}",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 93,
            "function": "unwrapIfClosure",
            "class": "Illuminate\\Container\\Util",
            "type": "::"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\BoundMethod.php",
            "line": 37,
            "function": "callBoundMethod",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Container\\Container.php",
            "line": 610,
            "function": "call",
            "class": "Illuminate\\Container\\BoundMethod",
            "type": "::"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 136,
            "function": "call",
            "class": "Illuminate\\Container\\Container",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\symfony\\console\\Command\\Command.php",
            "line": 255,
            "function": "execute",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Command.php",
            "line": 121,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Command\\Command",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\symfony\\console\\Application.php",
            "line": 971,
            "function": "run",
            "class": "Illuminate\\Console\\Command",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\symfony\\console\\Application.php",
            "line": 290,
            "function": "doRunCommand",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\symfony\\console\\Application.php",
            "line": 166,
            "function": "doRun",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Console\\Application.php",
            "line": 93,
            "function": "run",
            "class": "Symfony\\Component\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\vendor\\laravel\\framework\\src\\Illuminate\\Foundation\\Console\\Kernel.php",
            "line": 129,
            "function": "run",
            "class": "Illuminate\\Console\\Application",
            "type": "->"
        },
        {
            "file": "D:\\xampp80\\htdocs\\matrixtest\\artisan",
            "line": 37,
            "function": "handle",
            "class": "Illuminate\\Foundation\\Console\\Kernel",
            "type": "->"
        }
    ]
}
```
<div id="execution-results-GETuser-reservations" hidden>
    <blockquote>Received response<span id="execution-response-status-GETuser-reservations"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETuser-reservations"></code></pre>
</div>
<div id="execution-error-GETuser-reservations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETuser-reservations"></code></pre>
</div>
<form id="form-GETuser-reservations" data-method="GET" data-path="user/reservations" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETuser-reservations', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>user/reservations</code></b>
</p>
<h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
<p>
<b><code>id</code></b>&nbsp;&nbsp;<small>integer</small>  &nbsp;
<input type="number" name="id" data-endpoint="GETuser-reservations" data-component="url" required  hidden>
<br>
</p>
</form>


## Delete reservation by the the user




> Example request:

```bash
curl -X POST \
    "http://localhost/user/reservation/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/user/reservation/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTuser-reservation-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTuser-reservation-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTuser-reservation-delete"></code></pre>
</div>
<div id="execution-error-POSTuser-reservation-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTuser-reservation-delete"></code></pre>
</div>
<form id="form-POSTuser-reservation-delete" data-method="POST" data-path="user/reservation/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTuser-reservation-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>user/reservation/delete</code></b>
</p>
</form>


## doctor




> Example request:

```bash
curl -X GET \
    -G "http://localhost/doctor" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<script>window.location.href= "http://localhost/doctor/login";</script>

```
<div id="execution-results-GETdoctor" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdoctor"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdoctor"></code></pre>
</div>
<div id="execution-error-GETdoctor" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdoctor"></code></pre>
</div>
<form id="form-GETdoctor" data-method="GET" data-path="doctor" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdoctor', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>doctor</code></b>
</p>
</form>


## Show doctor login form




> Example request:

```bash
curl -X GET \
    -G "http://localhost/doctor/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>Doctor Login</title>	
	<!-- Include favicon -->
	<link rel="icon" type="image/png" sizes="192x192"  href="http://localhost/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://localhost/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/icon/favicon-16x16.png">
	<!-- Microsoft Tiles -->
	<link rel="manifest" href="http://localhost/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="http://localhost/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="http://localhost/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://localhost/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://localhost/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://localhost/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://localhost/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://localhost/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://localhost/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://localhost/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/icon/apple-icon-180x180.png">
	<!-- To run web application in full-screen -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Fonts and icons -->
	<script src="http://localhost/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["http://localhost/css/fonts.min.css"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="http://localhost/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/css/atlantis.min.css">
</head>
<body>
		
	<div class="container">
		<div class="wrapper row justify-content-center align-items-center">
			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>

			<!-- main login div -->
			<div class="card mb-0 col-sm-12 col-md-4 p-0">
				<div class="card-header text-center text-uppercase">
					<h3 class="text-primary">Doctor Login</h3>
				</div>
				<div class="card-body">
				
					
					<form action="http://localhost/doctor/login" method="post" class="doctor_login_form">
						<input type="hidden" name="_token" value="FPeC2UEwjkuQPRG8UNPFQjq8Fax5maTIstRDa4Tr">
						<div class="form-group">
							<label class="form-label" for="doctor_login_email">Email address</label>
							<input type="email" class="form-control" id="doctor_login_email" name="doctor_login_email" placeholder="email@example.com" required>
						</div>

						<div class="form-group">
							<label class="form-label" for="doctor_login_password">Password</label>
							<input type="password" class="form-control" id="doctor_login_password" name="doctor_login_password" placeholder="Password" required>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="doctor_login_remember" name="doctor_login_remember">
								<label class="custom-control-label" for="doctor_login_remember">Remember me</label>
							</div>
						</div>
						
						<button type="submit" class="btn btn-block btn-primary">Sign in</button>
					</form>
				</div>
			</div>

			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="http://localhost/js/core/jquery-3.5.1.min.js"></script>
	<script src="http://localhost/js/core/popper.min.js"></script>
	<script src="http://localhost/js/core/bootstrap.min.js"></script>

</body>
</html>
```
<div id="execution-results-GETdoctor-login" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdoctor-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdoctor-login"></code></pre>
</div>
<div id="execution-error-GETdoctor-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdoctor-login"></code></pre>
</div>
<form id="form-GETdoctor-login" data-method="GET" data-path="doctor/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdoctor-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>doctor/login</code></b>
</p>
</form>


## Doctor login




> Example request:

```bash
curl -X POST \
    "http://localhost/doctor/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTdoctor-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTdoctor-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTdoctor-login"></code></pre>
</div>
<div id="execution-error-POSTdoctor-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTdoctor-login"></code></pre>
</div>
<form id="form-POSTdoctor-login" data-method="POST" data-path="doctor/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTdoctor-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>doctor/login</code></b>
</p>
</form>


## Doctor logout




> Example request:

```bash
curl -X GET \
    -G "http://localhost/doctor/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>Doctor Login</title>	
	<!-- Include favicon -->
	<link rel="icon" type="image/png" sizes="192x192"  href="http://localhost/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://localhost/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/icon/favicon-16x16.png">
	<!-- Microsoft Tiles -->
	<link rel="manifest" href="http://localhost/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="http://localhost/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="http://localhost/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://localhost/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://localhost/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://localhost/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://localhost/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://localhost/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://localhost/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://localhost/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/icon/apple-icon-180x180.png">
	<!-- To run web application in full-screen -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Fonts and icons -->
	<script src="http://localhost/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["http://localhost/css/fonts.min.css"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="http://localhost/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/css/atlantis.min.css">
</head>
<body>
		
	<div class="container">
		<div class="wrapper row justify-content-center align-items-center">
			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>

			<!-- main login div -->
			<div class="card mb-0 col-sm-12 col-md-4 p-0">
				<div class="card-header text-center text-uppercase">
					<h3 class="text-primary">Doctor Login</h3>
				</div>
				<div class="card-body">
				
					
					<form action="http://localhost/doctor/login" method="post" class="doctor_login_form">
						<input type="hidden" name="_token" value="FPeC2UEwjkuQPRG8UNPFQjq8Fax5maTIstRDa4Tr">
						<div class="form-group">
							<label class="form-label" for="doctor_login_email">Email address</label>
							<input type="email" class="form-control" id="doctor_login_email" name="doctor_login_email" placeholder="email@example.com" required>
						</div>

						<div class="form-group">
							<label class="form-label" for="doctor_login_password">Password</label>
							<input type="password" class="form-control" id="doctor_login_password" name="doctor_login_password" placeholder="Password" required>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="doctor_login_remember" name="doctor_login_remember">
								<label class="custom-control-label" for="doctor_login_remember">Remember me</label>
							</div>
						</div>
						
						<button type="submit" class="btn btn-block btn-primary">Sign in</button>
					</form>
				</div>
			</div>

			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="http://localhost/js/core/jquery-3.5.1.min.js"></script>
	<script src="http://localhost/js/core/popper.min.js"></script>
	<script src="http://localhost/js/core/bootstrap.min.js"></script>

</body>
</html>
```
<div id="execution-results-GETdoctor-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdoctor-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdoctor-logout"></code></pre>
</div>
<div id="execution-error-GETdoctor-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdoctor-logout"></code></pre>
</div>
<form id="form-GETdoctor-logout" data-method="GET" data-path="doctor/logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdoctor-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>doctor/logout</code></b>
</p>
</form>


## get all doctor&#039;s clinic




> Example request:

```bash
curl -X GET \
    -G "http://localhost/doctor/clinics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/clinics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<script>window.location.href= "http://localhost/doctor/login";</script>

```
<div id="execution-results-GETdoctor-clinics" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdoctor-clinics"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdoctor-clinics"></code></pre>
</div>
<div id="execution-error-GETdoctor-clinics" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdoctor-clinics"></code></pre>
</div>
<form id="form-GETdoctor-clinics" data-method="GET" data-path="doctor/clinics" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdoctor-clinics', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>doctor/clinics</code></b>
</p>
</form>


## Store new clinic




> Example request:

```bash
curl -X POST \
    "http://localhost/doctor/clinic/add" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/clinic/add"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTdoctor-clinic-add" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTdoctor-clinic-add"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTdoctor-clinic-add"></code></pre>
</div>
<div id="execution-error-POSTdoctor-clinic-add" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTdoctor-clinic-add"></code></pre>
</div>
<form id="form-POSTdoctor-clinic-add" data-method="POST" data-path="doctor/clinic/add" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTdoctor-clinic-add', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>doctor/clinic/add</code></b>
</p>
</form>


## Delete clinic




> Example request:

```bash
curl -X POST \
    "http://localhost/doctor/clinic/delete" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/clinic/delete"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTdoctor-clinic-delete" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTdoctor-clinic-delete"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTdoctor-clinic-delete"></code></pre>
</div>
<div id="execution-error-POSTdoctor-clinic-delete" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTdoctor-clinic-delete"></code></pre>
</div>
<form id="form-POSTdoctor-clinic-delete" data-method="POST" data-path="doctor/clinic/delete" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTdoctor-clinic-delete', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>doctor/clinic/delete</code></b>
</p>
</form>


## Start edit clinic information




> Example request:

```bash
curl -X GET \
    -G "http://localhost/doctor/clinic/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/clinic/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json
{}
```
<div id="execution-results-GETdoctor-clinic-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdoctor-clinic-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdoctor-clinic-edit"></code></pre>
</div>
<div id="execution-error-GETdoctor-clinic-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdoctor-clinic-edit"></code></pre>
</div>
<form id="form-GETdoctor-clinic-edit" data-method="GET" data-path="doctor/clinic/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdoctor-clinic-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>doctor/clinic/edit</code></b>
</p>
</form>


## Edit clinic information




> Example request:

```bash
curl -X POST \
    "http://localhost/doctor/clinic/edit" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/clinic/edit"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTdoctor-clinic-edit" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTdoctor-clinic-edit"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTdoctor-clinic-edit"></code></pre>
</div>
<div id="execution-error-POSTdoctor-clinic-edit" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTdoctor-clinic-edit"></code></pre>
</div>
<form id="form-POSTdoctor-clinic-edit" data-method="POST" data-path="doctor/clinic/edit" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTdoctor-clinic-edit', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>doctor/clinic/edit</code></b>
</p>
</form>


## Show doctor&#039;s reservations




> Example request:

```bash
curl -X GET \
    -G "http://localhost/doctor/reservations" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/reservations"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<script>window.location.href= "http://localhost/doctor/login";</script>

```
<div id="execution-results-GETdoctor-reservations" hidden>
    <blockquote>Received response<span id="execution-response-status-GETdoctor-reservations"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETdoctor-reservations"></code></pre>
</div>
<div id="execution-error-GETdoctor-reservations" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETdoctor-reservations"></code></pre>
</div>
<form id="form-GETdoctor-reservations" data-method="GET" data-path="doctor/reservations" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETdoctor-reservations', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>doctor/reservations</code></b>
</p>
</form>


## Doctor approve reservation




> Example request:

```bash
curl -X POST \
    "http://localhost/doctor/reservation/approve" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/reservation/approve"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTdoctor-reservation-approve" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTdoctor-reservation-approve"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTdoctor-reservation-approve"></code></pre>
</div>
<div id="execution-error-POSTdoctor-reservation-approve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTdoctor-reservation-approve"></code></pre>
</div>
<form id="form-POSTdoctor-reservation-approve" data-method="POST" data-path="doctor/reservation/approve" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTdoctor-reservation-approve', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>doctor/reservation/approve</code></b>
</p>
</form>


## Doctor decline reservation




> Example request:

```bash
curl -X POST \
    "http://localhost/doctor/reservation/decline" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/doctor/reservation/decline"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTdoctor-reservation-decline" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTdoctor-reservation-decline"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTdoctor-reservation-decline"></code></pre>
</div>
<div id="execution-error-POSTdoctor-reservation-decline" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTdoctor-reservation-decline"></code></pre>
</div>
<form id="form-POSTdoctor-reservation-decline" data-method="POST" data-path="doctor/reservation/decline" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTdoctor-reservation-decline', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>doctor/reservation/decline</code></b>
</p>
</form>


## admin




> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<script>window.location.href= "http://localhost/admin/login";</script>

```
<div id="execution-results-GETadmin" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin"></code></pre>
</div>
<div id="execution-error-GETadmin" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin"></code></pre>
</div>
<form id="form-GETadmin" data-method="GET" data-path="admin" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin</code></b>
</p>
</form>


## Show admin login form




> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>Admin Login</title>	
	<!-- Include favicon -->
	<link rel="icon" type="image/png" sizes="192x192"  href="http://localhost/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://localhost/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/icon/favicon-16x16.png">
	<!-- Microsoft Tiles -->
	<link rel="manifest" href="http://localhost/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="http://localhost/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="http://localhost/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://localhost/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://localhost/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://localhost/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://localhost/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://localhost/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://localhost/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://localhost/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/icon/apple-icon-180x180.png">
	<!-- To run web application in full-screen -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Fonts and icons -->
	<script src="http://localhost/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["http://localhost/css/fonts.min.css"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="http://localhost/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/css/atlantis.min.css">
</head>
<body>
		
	<div class="container">
		<div class="wrapper row justify-content-center align-items-center">
			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>

			<!-- main login div -->
			<div class="card mb-0 col-sm-12 col-md-4 p-0">
				<div class="card-header text-center text-uppercase">
					<h3 class="text-primary">Admin Login</h3>
				</div>
				<div class="card-body">
				
					
					<form action="http://localhost/admin/login" method="post" class="admin_login_form">
						<input type="hidden" name="_token" value="FPeC2UEwjkuQPRG8UNPFQjq8Fax5maTIstRDa4Tr">
						<div class="form-group">
							<label class="form-label" for="admin_login_email">Email address</label>
							<input type="email" class="form-control" id="admin_login_email" name="admin_login_email" placeholder="email@example.com" required>
						</div>

						<div class="form-group">
							<label class="form-label" for="admin_login_password">Password</label>
							<input type="password" class="form-control" id="admin_login_password" name="admin_login_password" placeholder="Password" required>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="admin_login_remember" name="admin_login_remember">
								<label class="custom-control-label" for="admin_login_remember">Remember me</label>
							</div>
						</div>
						
						<button type="submit" class="btn btn-block btn-primary">Sign in</button>
					</form>
				</div>
			</div>

			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="http://localhost/js/core/jquery-3.5.1.min.js"></script>
	<script src="http://localhost/js/core/popper.min.js"></script>
	<script src="http://localhost/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<!-- <script src="http://localhost/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="http://localhost/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script> -->
	
	<!-- Atlantis JS -->
	<!-- <script src="http://localhost/js/atlantis.min.js"></script> -->

</body>
</html>
```
<div id="execution-results-GETadmin-login" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-login"></code></pre>
</div>
<div id="execution-error-GETadmin-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-login"></code></pre>
</div>
<form id="form-GETadmin-login" data-method="GET" data-path="admin/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/login</code></b>
</p>
</form>


## Admin login




> Example request:

```bash
curl -X POST \
    "http://localhost/admin/login" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/login"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTadmin-login" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTadmin-login"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-login"></code></pre>
</div>
<div id="execution-error-POSTadmin-login" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-login"></code></pre>
</div>
<form id="form-POSTadmin-login" data-method="POST" data-path="admin/login" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTadmin-login', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>admin/login</code></b>
</p>
</form>


## Admin logout




> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/logout" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/logout"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<!DOCTYPE html>
<html lang="en">
<head>
	<!-- Set character encoding for the document -->
	<meta charset="utf-8">
	<!-- Viewport for responsive web design -->
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<!-- Document Title -->	
	<title>Admin Login</title>	
	<!-- Include favicon -->
	<link rel="icon" type="image/png" sizes="192x192"  href="http://localhost/icon/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="http://localhost/icon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="http://localhost/icon/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="http://localhost/icon/favicon-16x16.png">
	<!-- Microsoft Tiles -->
	<link rel="manifest" href="http://localhost/icon/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="http://localhost/icon/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<!-- Apple Touch Icon -->
	<link rel="apple-touch-icon" sizes="57x57" href="http://localhost/icon/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="http://localhost/icon/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="http://localhost/icon/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="http://localhost/icon/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="http://localhost/icon/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="http://localhost/icon/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="http://localhost/icon/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="http://localhost/icon/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="http://localhost/icon/apple-icon-180x180.png">
	<!-- To run web application in full-screen -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- Fonts and icons -->
	<script src="http://localhost/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ["http://localhost/css/fonts.min.css"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>
	<!-- CSS Files -->
	<link rel="stylesheet" href="http://localhost/css/bootstrap.min.css">
	<link rel="stylesheet" href="http://localhost/css/atlantis.min.css">
</head>
<body>
		
	<div class="container">
		<div class="wrapper row justify-content-center align-items-center">
			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>

			<!-- main login div -->
			<div class="card mb-0 col-sm-12 col-md-4 p-0">
				<div class="card-header text-center text-uppercase">
					<h3 class="text-primary">Admin Login</h3>
				</div>
				<div class="card-body">
				
					
					<form action="http://localhost/admin/login" method="post" class="admin_login_form">
						<input type="hidden" name="_token" value="FPeC2UEwjkuQPRG8UNPFQjq8Fax5maTIstRDa4Tr">
						<div class="form-group">
							<label class="form-label" for="admin_login_email">Email address</label>
							<input type="email" class="form-control" id="admin_login_email" name="admin_login_email" placeholder="email@example.com" required>
						</div>

						<div class="form-group">
							<label class="form-label" for="admin_login_password">Password</label>
							<input type="password" class="form-control" id="admin_login_password" name="admin_login_password" placeholder="Password" required>
						</div>

						<div class="form-group">
							<div class="custom-control custom-checkbox">
								<input type="checkbox" class="custom-control-input" id="admin_login_remember" name="admin_login_remember">
								<label class="custom-control-label" for="admin_login_remember">Remember me</label>
							</div>
						</div>
						
						<button type="submit" class="btn btn-block btn-primary">Sign in</button>
					</form>
				</div>
			</div>

			<!-- empty col div -->
			<div class="col-sm-0 col-md-4"></div>
		</div>
	</div>


	<!--   Core JS Files   -->
	<script src="http://localhost/js/core/jquery-3.5.1.min.js"></script>
	<script src="http://localhost/js/core/popper.min.js"></script>
	<script src="http://localhost/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<!-- <script src="http://localhost/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="http://localhost/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script> -->
	
	<!-- Atlantis JS -->
	<!-- <script src="http://localhost/js/atlantis.min.js"></script> -->

</body>
</html>
```
<div id="execution-results-GETadmin-logout" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-logout"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-logout"></code></pre>
</div>
<div id="execution-error-GETadmin-logout" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-logout"></code></pre>
</div>
<form id="form-GETadmin-logout" data-method="GET" data-path="admin/logout" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-logout', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/logout</code></b>
</p>
</form>


## Get all clinics for admin to approve




> Example request:

```bash
curl -X GET \
    -G "http://localhost/admin/clinics" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/clinics"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "GET",
    headers,
}).then(response => response.json());
```


> Example response (200):

```json

<script>window.location.href= "http://localhost/admin/login";</script>

```
<div id="execution-results-GETadmin-clinics" hidden>
    <blockquote>Received response<span id="execution-response-status-GETadmin-clinics"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-GETadmin-clinics"></code></pre>
</div>
<div id="execution-error-GETadmin-clinics" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETadmin-clinics"></code></pre>
</div>
<form id="form-GETadmin-clinics" data-method="GET" data-path="admin/clinics" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('GETadmin-clinics', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-green">GET</small>
 <b><code>admin/clinics</code></b>
</p>
</form>


## Approve clinic




> Example request:

```bash
curl -X POST \
    "http://localhost/admin/clinic/approve" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/clinic/approve"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTadmin-clinic-approve" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTadmin-clinic-approve"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-clinic-approve"></code></pre>
</div>
<div id="execution-error-POSTadmin-clinic-approve" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-clinic-approve"></code></pre>
</div>
<form id="form-POSTadmin-clinic-approve" data-method="POST" data-path="admin/clinic/approve" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTadmin-clinic-approve', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>admin/clinic/approve</code></b>
</p>
</form>


## Decline clinic




> Example request:

```bash
curl -X POST \
    "http://localhost/admin/clinic/decline" \
    -H "Content-Type: application/json" \
    -H "Accept: application/json"
```

```javascript
const url = new URL(
    "http://localhost/admin/clinic/decline"
);

let headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};


fetch(url, {
    method: "POST",
    headers,
}).then(response => response.json());
```


<div id="execution-results-POSTadmin-clinic-decline" hidden>
    <blockquote>Received response<span id="execution-response-status-POSTadmin-clinic-decline"></span>:</blockquote>
    <pre class="json"><code id="execution-response-content-POSTadmin-clinic-decline"></code></pre>
</div>
<div id="execution-error-POSTadmin-clinic-decline" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTadmin-clinic-decline"></code></pre>
</div>
<form id="form-POSTadmin-clinic-decline" data-method="POST" data-path="admin/clinic/decline" data-authed="0" data-hasfiles="0" data-headers='{"Content-Type":"application\/json","Accept":"application\/json"}' onsubmit="event.preventDefault(); executeTryOut('POSTadmin-clinic-decline', this);">
<h3>
    Request&nbsp;&nbsp;&nbsp;
    </h3>
<p>
<small class="badge badge-black">POST</small>
 <b><code>admin/clinic/decline</code></b>
</p>
</form>



