@extends('admin.master')
@section('title')
    Sells Report
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Sells Report</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    <!--SEARCHING, ORDENING & PAGING-->


    <?php $j=0; $totals = 0; ?>
    @foreach($allOrders as $order)
        <?php $subTotal= $order->order_total?>
        <?php $j++; $totals = $totals+$subTotal; ?>
    @endforeach


    <div class="row animated fadeInRight">
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-8">
                        <h5 class="mb-lg ">Today Sells Report</h5>
                    </div>
                    <div  class="col-md-4">
                        <input type="text" class="form-control num1" name="total_fees" value="Today Sells: TK.{{$totals}}" id="totalAmount" readonly style="border: none; font-size: 25px; font-weight: bold;color: red;background: none">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row animated fadeInRight">
        <div class="col-sm-12 col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{route('sells-report')}}"><button class="btn btn-wide btn-primary">Sells Report</button></a>
                            <a href="{{route('daily-sells-report')}}"><button class="btn btn-wide btn-primary">Daily Sells Report</button></a>
                            <a href="{{route('weekly-sells-report')}}"><button class="btn btn-wide btn-primary">Weekly Sells Report</button></a>
                            <a href="{{route('monthly-sells-report')}}"><button class="btn btn-wide btn-primary">Monthly Sells Report</button></a>
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
                        <?php $j=0; $totals = 0; ?>
                        @foreach($allOrders as $order)
                            <tr>
                                <td>{{ $i }}</td>
                                <td>{{ $order->order_no }}</td>
                                <td>TK. {{ $order->order_total}} </td>
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
                                    <a href="{{url('/view-order-invoice/'.$order->id)}}" class="btn btn-info btn-xs">
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
                            <?php $j++; $totals = $totals+$subTotal; ?>
                        @endforeach


                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>

@endsection
