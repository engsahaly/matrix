@extends('default.adminMaster')

@section('seoTitle','Profile')

@section('mainContents')

    <div class="content">
        <div class="page-inner">

            <!-- main page Content -->            
            <div class="row">
                <!-- basic info card -->
                <div class="col-md-12" >
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Profile</h4>                    
                        </div>

                        <div class="card-body row"> 

                            <!-- Start admin info content -->    
                            <div class="col-sm-12 col-md-6">
                                <div class="card">                                    
                                    <div class="card-body">
                                    <div class="tab-content">

                                        <form action="{{ route('admin.profile') }}" method="post">
                                            @if ($errors->updateAdminInfoErrors->any())
                                                <div class="alert alert-danger text-danger container">
                                                    <ul>
                                                        @foreach ($errors->updateAdminInfoErrors->all() as $adminInfoError)
                                                            <li>{{ $adminInfoError }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if (\Session::has('adminProfileUpdateMSG'))
                                                <div class="alert alert-success text-success container">
                                                    {{ \Session::get('adminProfileUpdateMSG') }}
                                                </div>
                                            @endif
                                            
                                            @csrf

                                            <div class="form-group">
                                                <label for="admin_profile_name">Name</label>
                                                <input type="text" class="form-control" id="admin_profile_name" name="admin_profile_name" value="{{ Auth::guard('admin')->user()->name }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="admin_profile_email">Email</label>
                                                <input type="email" class="form-control" id="admin_profile_email" name="email" value="{{ Auth::guard('admin')->user()->email }}">
                                            </div>                       

                                            <div class="form-group text-right">
                                                <input type="submit" value="Update" class="btn btn-danger">
                                            </div>
                                        </form>

                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End admin info content -->    

                            <!-- Start Password change content -->    
                            <div class="col-sm-12 col-md-6">
                                <div class="card">                                   
                                    <div class="card-body">
                                    <div class="tab-content">
                                        
                                        <form action="{{ route('admin.change.password') }}" method="post"> 
                                            @if ($errors->updateAdminPasswordErrors->any())
                                                <div class="alert alert-danger text-danger container">
                                                    <ul>
                                                        @foreach ($errors->updateAdminPasswordErrors->all() as $adminPasswordError)
                                                            <li>{{ $adminPasswordError }}</li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            @endif

                                            @if (\Session::has('adminPasswordUpdateSuccessMSG'))
                                                <div class="alert alert-success text-success container">
                                                    {{ \Session::get('adminPasswordUpdateSuccessMSG') }}
                                                </div>
                                            @endif

                                            @if (\Session::has('adminPasswordUpdateFailureMSG'))
                                                <div class="alert alert-danger text-danger container">
                                                    {{ \Session::get('adminPasswordUpdateFailureMSG') }}
                                                </div>
                                            @endif

                                            @csrf

                                            <div class="form-group">
                                                <label for="admin_profile_current_password">Current Password</label>
                                                <input type="password" class="form-control" id="admin_profile_current_password" name="admin_profile_current_password" value="{{ old('admin_profile_current_password') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="admin_profile_new_password">New Password</label>
                                                <input type="password" class="form-control" id="admin_profile_new_password" name="admin_profile_new_password" value="{{ old('admin_profile_new_password') }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="admin_profile_confirm_new_password">Confirm New Password</label>
                                                <input type="password" class="form-control" id="admin_profile_confirm_new_password" name="admin_profile_confirm_new_password" value="{{ old('admin_profile_confirm_new_password') }}">
                                            </div>

                                            <div class="form-group text-right">
                                                <input type="submit" value="Update" class="btn btn-danger">                                     
                                            </div>
                                        </form>

                                    </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Password change content -->

                        </div>
                    </div>
                </div>
            </div>            

        </div>
    </div>


@endsection