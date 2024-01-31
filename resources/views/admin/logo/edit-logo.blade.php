@extends('admin.master')
@section('title')
    Logo
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="">Logo</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal form-stripe" action="{{ route('update-logo') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h4 class="mb-xlg text-center"><b>Edit logo form</b></h4>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">logo Image</label>
                                    <div class="col-sm-10">
                                        <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" accept="image/*" >
                                        <input type="hidden" value="{{ $logo->id }}" name="logo_id" class="form-control">
                                        <img id="blah" src="{{ asset($logo->image) }}" alt="img" width="100" height="100" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for=""  class="col-sm-2 control-label">Publication Status</label>
                                    <div class="col-sm-10">
                                        @if($logo->publication_status==1)
                                            <input type="radio" name="publication_status" value="1" checked> Published  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="publication_status" value="0"> UnPublished<br>
                                        @else
                                            <input type="radio" name="publication_status" value="1" > Published  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="publication_status" value="0" checked> UnPublished<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



