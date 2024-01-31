@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>

            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Manage-users</a></li>
{{--            <li class="active">Data tables</li>--}}
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

{{--    ....--}}

    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Manage Users</b></h4>
{{--        <p class="section-text">Add to the table the class <span class="code">.table-bordered</span></p>--}}
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table class="table table-striped table-hover table-bordered text-center">
                        <thead>
                        <tr>
                            <th>Sl</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{ $loop->index+1 }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
                                    @foreach ($user->roles as $role)
                                        <span class="badge badge-info mr-1">
                                                {{ $role->name }}
                                            </span>
                                    @endforeach
                                </td>
{{--                                <td>--}}
{{--                                    <a class="btn btn-success text-white" href="{{route('edit-users',['id'=>$user->id])}}">Edit</a>--}}

{{--                                    <a class="btn btn-danger text-white" href="{{route('delete-users',['id'=>$user->id])}}"onclick="alert('Are you sure?')">Delete</a>--}}
{{--                                </td>--}}
                                <td>
                                    <div class="btn-group btn-group-xs">
                                        <a class="btn btn-transparent" href="{{route('edit-users',['id'=>$user->id])}}"><i class="fa fa-pencil" ></i>
                                        </a>
                                        <a class="btn btn-transparent" href="{{route('delete-users',['id'=>$user->id])}}"><i class="fa fa-times"></i>
                                        </a>
                                      </div>
                                </td>
                            </tr>
                        @endforeach
{{--                        <tr>--}}
{{--                            <td>Olivia Liang</td>--}}
{{--                            <td>Support Engineer</td>--}}
{{--                            <td>Singapore</td>--}}
{{--                            <td>--}}
{{--                                <div class="btn-group btn-group-xs">--}}
{{--                                    <button class="btn btn-transparent"><i class="fa fa-eye"></i>--}}
{{--                                    </button>--}}
{{--                                    <button class="btn btn-transparent"><i class="fa fa-pencil"></i>--}}
{{--                                    </button>--}}
{{--                                    <button class="btn btn-transparent"><i class="fa fa-times"></i>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </td>--}}
{{--                        </tr>--}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Main content -->

@endsection
