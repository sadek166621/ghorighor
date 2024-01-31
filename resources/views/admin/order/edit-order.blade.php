@extends('admin.master')
@section('title')
    Edit Order
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Edit Order </a></li>
                <li><a>Details</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class=" text-bold text-center text-success">{{session('message')}}</h3>
                            <h3 class="text-center text-italic">Edit Order Info Goes Here</h3>
                            <form name="editOrderForm" class="form-horizontal" action="{{route('update-order')}}" method="POST">
                                <div class="box-body">
                                    @csrf
                                    <div class="form-group">
                                        <label for="inputEmail3"  class="col-sm-2 control-label">Order Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                                <option value="2">Success full</option>
                                                <option value="1">Cancel</option>
                                                <option value="0">Pending</option>
                                            </select>
                                            <input type="hidden" name="order_id" value="{{ $orderById->id }}" class="form-control" id="inputEmail3">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail3"  class="col-sm-2 control-label">Payment Status</label>
                                        <div class="col-sm-10">
                                            <select name="payment_status" class="form-control">
                                                <option value="1">Complete</option>
                                                <option value="0">Pending</option>
                                            </select>
                                        </div>
                                    </div>
                                </div><br>
                                <div class="box-footer">
                                    <label for="inputEmail3"  class="col-sm-2 control-label"></label>
                                    <div class="col-sm-10">
                                        <button type="submit" class="btn btn-info btn-block">Update Stock Info</button>
                                    </div>
                                </div><!-- /.box-footer -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.forms['editOrderForm'].elements['status'].value='{{$orderById->status}}';
        document.forms['editOrderForm'].elements['payment_status'].value='{{$orderById->payment_status}}';
    </script>
@endsection
