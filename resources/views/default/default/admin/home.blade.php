@extends('default.adminMaster')

@section('seoTitle','Dashboard')
@section('s_home','active')

@section('mainContents')

    <div class="content">
        <!-- <div class="panel-header bg-primary-gradient">
            <div class="page-inner py-5">
                <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                    <div>
                        <h2 class="text-white pb-2 fw-bold">Dashboard</h2>                        
                    </div>                   
                </div>
            </div>
        </div> -->
        
        <div class="page-inner mt-2">            
            <div class="row row-card-no-pd">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-head-row card-tools-still-right">
                                <h4 class="card-title text-white badge badge-danger ml-0">Overall Statistics</h4>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="table-responsive table-hover table-sales">
                                        <table class="table">
                                            <tbody>
                                                <!-- experience statistics -->
                                                <tr>
                                                    <td>
                                                        <i class="nav-icon fas fa-briefcase"></i>
                                                        <span class="ml-1">Experience</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Experience::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.experience') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- education statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-university"></i>
                                                        <span class="ml-1">Education</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Education::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.education') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- skills statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fab fa-elementor"></i>
                                                        <span class="ml-1">Skills</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Skill::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.skills') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- services statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-network-wired"></i>
                                                        <span class="ml-1">Services</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Service::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.services') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- success stories statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-check-double"></i>
                                                        <span class="ml-1">Success Stories</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Success::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.success') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- clients statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-user-shield"></i>
                                                        <span class="ml-1">Clients</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Client::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.clients') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="table-responsive table-hover table-sales">
                                        <table class="table">
                                            <tbody>                                                
                                                <!-- team statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-users"></i>
                                                        <span class="ml-1">Team</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Team::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.team') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- subscribers statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-user-friends"></i>
                                                        <span class="ml-1">Subscribers</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Subscribe::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.subscribers') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- projects statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-project-diagram"></i>
                                                        <span class="ml-1">Projects</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Project::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.projects') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- messages statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-envelope-open-text"></i>
                                                        <span class="ml-1">Messages</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Message::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.messages') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- testmonials statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="nav-icon fas fa-comment-dots"></i>
                                                        <span class="ml-1">Testmonials</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Testmonial::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.testmonials') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>

                                                <!-- blog statistics -->
                                                <tr>                                                    
                                                    <td>
                                                        <i class="fas fa-blog"></i>
                                                        <span class="ml-1">Blog</span>
                                                    </td>
                                                    <td>
                                                        {{ count( \App\Models\Blog::all() )}}
                                                    </td>
                                                    <td class="text-right">
                                                        <a href="{{ route('admin.blog') }}" class="fa-lg"><i class="fas fa-external-link-square-alt"></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>            
        </div>
    </div>

@endsection