@extends('admin.master')
@section('title')
    Slider
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="">Slider</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Slider
    </button>

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h5 class="mb-md text-success text-center">{{session('message')}}</h5>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>First header</th>
                                <th>Last header</th>
                                <th>Slider image</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1 ?>
                            @foreach($sliders as $slider)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{substr($slider->first_header,0,30)}}</td>
                                    <td>{{substr($slider->last_header,0,30)}}</td>
                                    <td><img src="{{ $slider->image }}" width="100px" height="100px"></td>
                                    <td>{{$slider->publication_status==1 ? 'Published':'Unpublished'}}</td>
                                    <td>
{{--                                        <a href="{{route('view-slider',['id'=>$slider->id])}}" class="btn btn-primary btn-xs" title="view">--}}
{{--                                            <span class="glyphicon glyphicon-eye-open"></span>--}}
{{--                                        </a>--}}
                                        @if($slider->publication_status==1)

                                            <a href="{{route('published-slider',['id'=>$slider->id])}}" class="btn btn-success btn-xs" title="Published">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                        @else
                                            <a href="{{route('unpublished-slider',['id'=>$slider->id])}}" class="btn btn-warning btn-xs" title="UnPublished">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>
                                        @endif
{{--                                        <a href="{{route('edit-slider',['id'=>$slider->id])}}" class="btn btn-primary btn-xs" title="edit">--}}
{{--                                            <span class="glyphicon glyphicon-edit"></span>--}}
{{--                                        </a>--}}
                                        <a href="{{route('delete-slider',['id'=>$slider->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete this!!')" title="delete">
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
                <h4 class="text-center font-weight-bold" style="color: #126F5C"><i>Add slider form</i></h4>
                {{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                <div class="modal-body">
                    <form action="{{ route('new-slider') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">First heading</label>
                            <input type="text" class="form-control" name="first_header" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Last heading</label>
                            <input type="text" class="form-control" name="last_header" id="" placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="">Slider Image</label>
                            <input type="file" name="image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" accept="image/*">
                            <img id="blah" alt="img" width="100" height="100" />
{{--                                <input type="file" name="main_image" accept="image/*">--}}

                        </div>
                        <div class="form-group">
                            <label for="">Publication Status</label>&nbsp; 	&nbsp;&nbsp; 	&nbsp;
                            <input type="radio" name="publication_status" value="1" checked> Published  	&nbsp; 	&nbsp; 	&nbsp;
                            <input type="radio" name="publication_status" value="0"> UnPublished<br>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
