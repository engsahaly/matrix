<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="dark2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">                    

            <!-- links and tabs -->
            <ul class="nav nav-primary">

                <!-- main home - dashboard tab -->
                <li class="nav-item @yield('s_home')">
                    <a href="{{ route('doctor.home') }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>                        
                    </a>                    
                </li>
                                
                <!-- clinics tab -->
                <li class="nav-item @yield('s_clinics')">
                    <a href="#">
                        <i class="fas fa-clinic-medical"></i>
                        <p>My Clinics</p>
                    </a>
                </li>
                                
                <!-- reservations tab -->
                <li class="nav-item @yield('s_reservations')">
                    <a href="#">
                        <i class="fas fa-check-square"></i>
                        <p>Reservations</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->