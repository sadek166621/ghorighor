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
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <h4 class="mb-xlg text-center"><b>View logo Data ( ID: {{ $logo->id }} )</b></h4>
                    <table class="table table-striped table-hover table-bordered text-center">
                        <thead>
                        <tr>
                            <th>logo Image</th>
                            <th>publication Status</th>

                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td><img src="{{ asset($logo->image) }}" width="100px" height="100px"></td>
                            <td>{{$logo->publication_status==1 ? 'Published':'Unpublished'}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection



