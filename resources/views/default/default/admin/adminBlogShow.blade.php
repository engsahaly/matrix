@extends('default.adminMaster')

@section('seoTitle','Blog')
@section('s_blog','active')

@section('mainContents')

    @if (isset($blog))
    <div class="content">
        <div class="page-inner">

            <div class="content-header mb-3">
            <div class="container-fluid">
                <div class="row">
                <div class="col-sm-6">
                    <h2 class="m-0 text-dark">{{ $blog->name }}</h2>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <div class="float-sm-right">
                      <a href="{{ route('admin.blog') }}" id="back_blog_btn" class="btn btn-primary btn-xs">
                        <i class="fas fa-arrow-left"></i>
                      </a>
                    </div>
                </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
            </div>
            
            <!-- main page Content -->
            <div class="row" id="mainCont">
                @if ($blog->created_by != null)       
                <div class="col-4 form-group">
                    <label for="admin_blog_show_created_by">Created By</label>
                    <p>{{ $blog->created_by }}</p>
                </div>
                @endif

                <div class="col-4 form-group">
                    <label for="admin_blog_show_seo_keywords">Seo Keywords</label>
                    <p>{{ $blog->seo_keywords }}</p>
                </div>

                <div class="col-4 form-group">
                    <label for="admin_blog_show_seo_description">Seo Description</label>
                    <p>{{ $blog->seo_description }}</p>
                </div>

                @if ($blog->image != null)
                <div class="col-12 form-group">                    
                    <img class="card-img-top" src="{{ asset('storage') }}/{{ $blog->image }}" alt="blog image" style="height:200px; width:200px; border-radius:10px;">                    
                </div>
                @endif

                <div class="col-12 form-group">                    
                    {!! $blog->text !!}
                </div>
            </div>

        </div>
    </div>
    @else 
    <div class="alert alert-danger">No blog found !</div>
    @endif








@endsection