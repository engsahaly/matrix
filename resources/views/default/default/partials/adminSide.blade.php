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
                
                <!-- about info tab -->
                <li class="nav-item @yield('s_aboutInfo')">
                    <a data-toggle="collapse" href="#about_tab" class="collapsed" aria-expanded="false">
                        <i class="fas fa-address-card"></i>
                        <p>About Info</p>
                        <span class="caret"></span>
                    </a>
                    <div class="collapse @yield('s_aboutInfo_showCollapsed')" id="about_tab">
                        <ul class="nav nav-collapse">
                            <li class="@yield('s_aboutInfo_basic')">
                                <a href="{{ route('admin.about.basic') }}">
                                    <span class="sub-item">Basic Info</span>
                                </a>
                            </li>
                            <li class="@yield('s_aboutInfo_contact')">
                                <a href="{{ route('admin.about.contact') }}">
                                    <span class="sub-item">Contact Info</span>
                                </a>
                            </li>
                            <li class="@yield('s_aboutInfo_social')">
                                <a href="{{ route('admin.about.social') }}">
                                    <span class="sub-item">Social Links</span>
                                </a>
                            </li>
                            <li class="@yield('s_aboutInfo_images')">
                                <a href="{{ route('admin.about.images') }}">
                                    <span class="sub-item">Images</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </li>

                <!-- experience tab -->
                <li class="nav-item @yield('s_experience')">
                    <a href="{{ route('admin.experience') }}">
                        <i class="nav-icon fas fa-briefcase"></i>
                        <p>Experience</p>
                    </a>
                </li>

                <!-- education tab -->
                <li class="nav-item @yield('s_education')">
                    <a href="{{ route('admin.education') }}">
                        <i class="nav-icon fas fa-university"></i>
                        <p>Education</p>
                    </a>
                </li>

                <!-- skills tab -->
                <li class="nav-item @yield('s_skills')">
                    <a href="{{ route('admin.skills') }}">
                        <i class="nav-icon fab fa-elementor"></i>
                        <p>Skills</p>
                    </a>
                </li>

                <!-- services tab -->
                <li class="nav-item @yield('s_services')">
                    <a href="{{ route('admin.services') }}">
                        <i class="nav-icon fas fa-network-wired"></i>
                        <p>Services</p>
                    </a>
                </li>

                <!-- success story tab -->
                <li class="nav-item @yield('s_success')">
                    <a href="{{ route('admin.success') }}">
                        <i class="nav-icon fas fa-check-double"></i>
                        <p>Success Story</p>
                    </a>
                </li>

                <!-- clients tab -->
                <li class="nav-item @yield('s_clients')">
                    <a href="{{ route('admin.clients') }}">
                        <i class="nav-icon fas fa-user-shield"></i>
                        <p>Clients</p>
                    </a>
                </li>

                <!-- my team tab -->    
                <li class="nav-item @yield('s_team')">
                    <a href="{{ route('admin.team') }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>My Team</p>
                    </a>
                </li>

                <!-- subscribers tab -->    
                <li class="nav-item @yield('s_subscribers')">
                    <a href="{{ route('admin.subscribers') }}">
                        <i class="nav-icon fas fa-user-friends"></i>
                        <p>Subscribers</p>
                    </a>
                </li>

                <!-- projects tab -->    
                <li class="nav-item @yield('s_projects')">
                    <a href="{{ route('admin.projects') }}">
                        <i class="nav-icon fas fa-project-diagram"></i>
                        <p>Projects</p>
                    </a>
                </li>

                <!-- messages tab -->
                <li class="nav-item @yield('s_messages')">
                    <a href="{{ route('admin.messages') }}">
                        <i class="nav-icon fas fa-envelope-open-text"></i>
                        <p>Messages</p>
                    </a>
                </li>

                <!-- testmonials tab -->
                <li class="nav-item @yield('s_testmonials')">
                    <a href="{{ route('admin.testmonials') }}">
                        <i class="nav-icon fas fa-comment-dots"></i>
                        <p>Testmonials</p>
                    </a>
                </li>

                <!-- blog tab -->
                <li class="nav-item @yield('s_blog')">
                    <a href="{{ route('admin.blog') }}">
                        <i class="fas fa-blog"></i>
                        <p>Blog</p>
                    </a>
                </li>

                <!-- settings tab -->
                <li class="nav-item @yield('s_settings')">
                    <a href="{{ route('admin.settings') }}">
                        <i class="fas fa-cog"></i>
                        <p>Settings</p>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
<!-- End Sidebar -->