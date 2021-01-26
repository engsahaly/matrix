<div class="main-header">
    <!-- Logo Header -->
    <div class="logo-header" data-background-color="dark2">
        
        <!-- Dashboard Logo -->
        <a href="{{ route('doctor.home') }}">
            <h4 class="text-white text-uppercase">Doctor Dashboard</h4>
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
                            <img src="{{ asset('img') }}/profile_default.jpg" alt="profile image" class="avatar-img rounded">
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-user animated fadeIn">
                        <li>
                            <div class="user-box">
                                <div class="u-text text-primary">
                                    <h4>{{ Auth::guard('doctor')->user()->name }}</h4>
                                    <p class="text-muted">{{ Auth::guard('doctor')->user()->email }}</p>
                                </div>
                            </div>
                        </li>
                        <div class="dropdown-divider"></div>
                        <li>
                            <a class="dropdown-item" href="{{ route('doctor.logout') }}">Logout</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navbar -->
</div>