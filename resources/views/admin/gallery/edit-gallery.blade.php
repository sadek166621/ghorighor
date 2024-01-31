@extends('admin.master')
@section('title')
    Gallery
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="">Banner</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h5 class="mb-md text-success text-center">{{session('message')}}</h5>
            <div class="panel">
                <div class="panel-content">
                    <form name="editForm" class="form-horizontal" action="{{ route('update-gallery') }}" method="post" enctype="multipart/form-data">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        @csrf

                        <div class="form-group">
                            <label for="" class="col-sm-4 control-label">Image</label>
                            <div class="col-sm-8">
                                <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" accept="image/*" >
                                <input type="hidden" value="{{ $gallery->id }}" name="gallery_id" class="form-control">
                                <img id="blah" src="{{ asset($gallery->image) }}" alt="img" width="100" height="100" />
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="">URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" value="{{ $gallery->url }}" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <label>section 1:</label><input type="radio" name="section" value="1" {{ $gallery->section==1? 'checked' : ''}}>
                                    <label>section 2:</label><input type="radio" name="section" value="2" {{ $gallery->section==2? 'checked' : ''}}>
                                </div>
                            </div>
                        <div class="form-group">
                            <label for="publicationStatus" class="col-sm-4 control-label">publication Status</label>
                            <div class="col-sm-8">
                                <input type="radio" name="publication_status" value="1" {{ $gallery->publication_status==1? 'checked' : ''}}> Published  	&nbsp; 	&nbsp; 	&nbsp;
                                <input type="radio" name="publication_status" value="0" {{ $gallery->publication_status==0? 'checked' : ''}}> UnPublished<br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-block">Save Gallery</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.forms['editForm'].elements['publication_status'].value = '{{ $gallery->publication_status }}';
        document.forms['editForm'].elements['product_ad2'].value = '{{ $gallery->product_ad2 }}';
        document.forms['editForm'].elements['product_ad'].value = '{{ $gallery->product_ad }}';
        document.forms['editForm'].elements['home_ad'].value = '{{ $gallery->home_ad }}';
    </script>

@endsection
