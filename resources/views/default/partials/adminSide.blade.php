<!-- Sidebar -->
<div class="sidebar sidebar-style-2" data-background-color="dark2">			
    <div class="sidebar-wrapper scrollbar scrollbar-inner">
        <div class="sidebar-content">                    

            <!-- links and tabs -->
            <ul class="nav nav-primary">

                <!-- main home - dashboard tab -->
                <li class="nav-item @yield('s_home')">
                    <a href="{{ route('admin.home') }}">
                        <i class="fas fa-home"></i>
                        <p>Home</p>                        
                    </a>                    
                </li>
                                
                <!-- experience tab -->
                <li class="nav-item @yield('s_doctors')">
                    <a href="#">
                        <i class="fas fa-user-md"></i>
                        <p>Doctors</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->