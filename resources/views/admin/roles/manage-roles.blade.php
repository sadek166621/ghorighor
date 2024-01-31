@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage-Roles</a></li>
        </ol>
    </section>
     @if ($errors->any())
            <div class="alert alert-danger">
                <div>
                    @foreach ($errors->all() as $error)
                        <p>{{ $error }}</p>
                    @endforeach
                </div>
            </div>
        @endif

        @if (Session::has('success'))
            <div class="alert alert-success">
                <div>
                    <p>{{ Session::get('success') }}</p>
                </div>
            </div>
        @endif
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Manage Roles</b></h4>
        {{--        <p class="section-text">Add to the table the class <span class="code">.table-bordered</span></p>--}}
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">

                <table class="table table-bordered">
                            <tr >
                                <th width="10%">Sl</th>
                                <th width="10%" >Name</th>
                                <th width="70%" >Permission</th>
                                <th width="10%">Action</th>
                            </tr>
                                @foreach ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>{{ $role->name }}</td>
                                        <td>
                                            @foreach ($role->permissions as $perm)
                                                <span class="badge badge-info mr-1">
                                                {{ $perm->name }}
                                            </span>
                                            @endforeach
                                        </td>
{{--                                        <td>--}}
{{--                                            <a class="btn btn-primary text-white" href="{{url('/edit-roles',['id'=>$role->id])}}"><i class="fa fa-edit" aria-hidden="true"></i></a>--}}

{{--                                            <a class="btn btn-danger text-white" href="{{route('delete-roles',['id'=>$role->id])}}"onclick="alert('Are you sure?')"><i class="fa fa-trash" aria-hidden="true"></i></a>--}}
{{--                                        </td>--}}
                                        <td>
                                            <div class="btn-group btn-group-xs">
                                                <a class="btn btn-transparent" href="{{url('/edit-roles',['id'=>$role->id])}}"><i class="fa fa-pencil" ></i>
                                                </a>
                                                <a class="btn btn-transparent" href="{{route('delete-roles',['id'=>$role->id])}}" onclick="alert('Are you sure?')"><i class="fa fa-times"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                            @endforeach
                        </table>
            </div>
        </div>
    </div>


    <!-- Main content -->

@endsection
