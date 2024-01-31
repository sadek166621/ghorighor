@extends('admin.master')
@section('title')
    Supplier
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Tables</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Supplier
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
                                <th>Supplier Name</th>
                                <th>Email</th>
                                <th>phone</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1 ?>
                            @foreach($suppliers as $supplier)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{substr($supplier->supplier_name,0,30)}}</td>
                                    <td>{{substr($supplier->email,0,30)}}</td>
                                    <td>{{$supplier->phone_primary}} , {{$supplier->phone_secondary}}</td>
                                    <td>{{$supplier->publication_status==1 ? 'Published':'Unpublished'}}</td>
                                    <td>
                                        @if($supplier->publication_status==1)

                                            <a href="{{route('published-supplier',['id'=>$supplier->id])}}" class="btn btn-success btn-xs" title="Published">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                        @else
                                            <a href="{{route('unpublished-supplier',['id'=>$supplier->id])}}" class="btn btn-warning btn-xs" title="UnPublished">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>
                                        @endif
                                        <a href="{{route('delete-supplier',['id'=>$supplier->id])}}" class="btn btn-danger btn-xs" onclick="return confirm('Are you sure to Delete this!!')" title="delete">
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
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('new-supplier') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Supplier Name</label>
                            <input type="text" class="form-control" name="supplier_name" id="" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Supplier email</label>
                            <input type="text" class="form-control" name="email" id="" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Supplier phone 01.</label>
                            <input type="text" class="form-control" name="phone_primary" id="" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Supplier phone 02.</label>
                            <input type="text" class="form-control" name="phone_secondary" id="" placeholder="" required>
                        </div>
                        <div class="form-group">
                            <label for="">Supplier address</label>
                            <textarea class="form-control" rows="3" name="address" id="textareaMaxLength" placeholder="Write a comment" maxlength="100"></textarea>
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
