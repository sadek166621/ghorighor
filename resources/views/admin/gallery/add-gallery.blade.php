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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Banner Image
    </button>

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
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Si no</th>
                                <th>Image</th>
                                <th>Section</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                            @foreach($gallery as $gallery)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td><img src="{{ $gallery->image }}" width="100px" height="100px"></td>
                                    <td>{{$gallery->section==1 ? 'Section 1':'Section 2'}}</td>
                                    <td>{{$gallery->publication_status==1 ? 'Published':'Unpublished'}}</td>

                                    <td>

                                        @if($gallery->publication_status==1)

                                            <a href="{{route('published-gallery',['id'=>$gallery->id])}}" class="btn btn-success btn-xs" title="Published">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>
                                        @else
                                            <a href="{{route('unpublished-gallery',['id'=>$gallery->id])}}" class="btn btn-warning btn-xs" title="UnPublished">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                        @endif
                                            <a href="{{ route('edit-gallery',['id'=>$gallery->id])}}" class="btn btn-primary btn-xs" title="Edit Gallery">
                                                <span class="glyphicon glyphicon-edit"></span>
                                            </a>
                                        <a href="{{route('delete-gallery',['id'=>$gallery->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete this!!')" title="delete">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>

                                </tr>
                                <?php $i++ ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h4 class="text-center font-weight-bold" style="color: #126F5C"><i>Add Banner form</i></h4>
                {{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                <div class="modal-body">
                    <form class="form-horizontal" action="{{ route('new-gallery') }}" method="post" enctype="multipart/form-data">
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
                                <input type="file" name="image" accept="image/*">
                            </div>
                        </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label" for="">URL</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" id="" placeholder="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-6 col-sm-offset-3">
                                    <label>section 1:</label><input type="radio" name="section" value="1" >
                                    <label>section 2:</label><input type="radio" name="section" value="2" >
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="publicationStatus" class="col-sm-4 control-label">publication Status</label>
                                <div class="col-sm-8">
                                    <input type="radio" name="publication_status" value="1" checked> Published  	&nbsp; 	&nbsp; 	&nbsp;
                                    <input type="radio" name="publication_status" value="0" > UnPublished<br>
                                </div>
                            </div>

                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-success btn-block">Save banner</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
