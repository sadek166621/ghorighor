@extends('admin.master')
@section('title')
    Manage Gallery Module
@endsection
@section('content')
    <div id="main-content">
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-md-12">
                    <div class="card">
                        <div class="header text-center">
                            <br>
                            <h2>Manage Gallery Module</h2>
                            <h2>{{ session('message') }}</h2>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover dataTable js-exportable">
                                    <thead>
                                    <tr>
                                        <th>Si no</th>
                                        <th>Image</th>
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

                                            <td>{{$gallery->publication_status==1 ? 'Published':'Unpublished'}}</td>
                                            <td>

                                                @if($gallery->publication_status==1)

                                                    <a href="{{route('published-gallery',['id'=>$gallery->id])}}" class="btn btn-success btn-xs" title="Published">
                                                        <span class="icon-arrow-down"></span>
                                                    </a>
                                                @else
                                                    <a href="{{route('unpublished-gallery',['id'=>$gallery->id])}}" class="btn btn-warning btn-xs" title="UnPublished">
                                                        <span class="icon-arrow-up"></span>
                                                    </a>
                                                @endif

                                                <a href="{{route('delete-gallery',['id'=>$gallery->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete this!!')" title="delete">
                                                    <span class="icon-trash"></span>
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
        </div>
    </div>

@endsection

