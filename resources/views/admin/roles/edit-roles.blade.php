@extends('admin.master')
@section('content')
    <!-- Content Header (Page header) -->
{{--    <section class="content-header">--}}
{{--        <h1>--}}

{{--            <small></small>--}}
{{--        </h1>--}}
{{--        <ol class="breadcrumb">--}}
{{--            <ol class="breadcrumb">--}}
{{--                <li><a href="{{route('home')}}"><i class="fa fa-dashboard"></i> Home</a></li>--}}
{{--                <li><a href="{{url('edit-roles')}}">Edit-Roles</a></li>--}}
{{--            </ol>--}}
{{--        </ol>--}}
{{--    </section>--}}


    <div class="col-md-12">
        {{--        <h4 class="section-subtitle"><b>Stripe</b> form</h4>--}}
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-sm-12">
         <!-- Horizontal Form -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                @endif

                <!-- form start -->
                    <form action="{{route('update-roles')}}" method="POST">
                        @csrf
                        <input type="hidden" name="roles_id" value="{{$role->id}}">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Role Name</label>
                                <input type="text" class="form-control" id="name" value="{{$role->name}}" name="name" placeholder="Enter a Role Name">
                            </div>

                            <div class="form-group">
                                <label for="name">Permissions</label>

                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1"{{ App\User::roleHasPermissions($role, $permissions) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="checkPermissionAll">All</label>
                                </div>
                                <hr>
                                @php $i = 1; @endphp
                                @foreach ($permission_groups as $group)
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <div class="form-check">
                                                <input type="checkbox" class="form-check-input" id="{{ $i }}Management" value="{{ $group->name }}" onclick="checkPermissionByGroup('role-{{ $i }}-management-checkbox', this)">
                                                <label class="form-check-label" for="checkPermission">{{ $group->name }}</label>
                                            </div>
                                        </div>

                                        <div class="col-sm-9 role-{{ $i }}-management-checkbox">
                                            @php
                                                $permissions = App\User::getpermissionsByGroupName($group->name);
                                                $j = 1;
                                            @endphp
                                            @foreach ($permissions as $permission)
                                                <div class="form-check">
                                                    <input type="checkbox" class="form-check-input" onclick="checkSinglePermission('role-{{ $i }}-management-checkbox', '{{ $i }}Management', {{ count($permissions) }})" name="permissions[]" {{ $role->hasPermissionTo($permission->name) ? 'checked' : '' }} id="checkPermission{{ $permission->id }}" value="{{ $permission->name }}">                                                    <label class="form-check-label" for="checkPermission{{ $permission->id }}">{{ $permission->name }}</label>
                                                </div>
                                                @php  $j++; @endphp
                                            @endforeach
                                            <br>
                                        </div>

                                    </div>
                                    @php  $i++; @endphp
                                @endforeach


                            </div>


                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Save Role</button>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Main content -->

@endsection
