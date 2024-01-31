@extends('admin.master')
@section('title')
    Order
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

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{route('pending-order')}}"><button class="btn btn-wide btn-primary">Pending Order</button></a>
                            <a href="{{route('success-order')}}"><button class="btn btn-wide btn-primary">Success Order</button></a>
                            <a href="{{route('cancel-order')}}"><button class="btn btn-wide btn-primary">Cancel Order</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <h5 class="mb-md text-success text-center">{{session('message')}}</h5>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Invoice No</th>
                                <th>Customer Name</th>
                                <th>Order Total</th>
                                <th>Order Status</th>
                                <th>payment status</th>
                                <th>Payment Type</th>
                                <th>Order Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1; ?>
                            @foreach($allOrders as $order)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $order->order_no}}</td>
                                    <td>{{ $order->first_name}}</td>
                                    <td>TK. {{ $order->order_total }}</td>
                                    @if($order->status == 2)
                                        <td>Success full</td>
                                    @elseif($order->status == 1)
                                        <td>Cancel</td>
                                    @else
                                        <td>Pending</td>
                                    @endif


                                    @if($order->payment_status == 1)
                                        <td>Complete</td>
                                    @else
                                        <td>Pending</td>
                                    @endif
                                    <td>{{$order->payment_method}}</td>
                                    <td>{{date('j-M-Y',strtotime($order->created_at))}}</td>
                                    <td class="center">
                                        <a href="{{url('/view-order/'.$order->id)}}" class="btn btn-primary btn-xs">
                                            <span class="glyphicon glyphicon-zoom-in" title="View Order Details"></span>
                                        </a>
                                        <a href="{{url('/order-details/'.$order->id)}}" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-inbox" title="View Order Invoice"></span>
                                        </a>
                                        {{--                                        <a href="{{url('/download-order-invoice/'.$order->id)}}" class="btn btn-success btn-xs">--}}
                                        {{--                                            <span class="glyphicon glyphicon-download" title="Download Order Invoice"></span>--}}
                                        {{--                                        </a>--}}
                                        <a href="{{url('/edit-order/'.$order->id)}}" class="btn btn-warning btn-xs">
                                            <span class="glyphicon glyphicon-edit" title="Edit Order"></span>
                                        </a>
                                        {{--                                        <a href="{{url('/delete-order/'.$order->id)}}" class="btn btn-danger btn-xs">--}}
                                        {{--                                        <span class="glyphicon glyphicon-trash" title="Delete Order" onclick="return confirm('Are You Sure Delete This');"></span>--}}
                                        {{--                                        </a>--}}
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
