@extends('admin.master')
@section('title')
    Dashboard
@endsection
@section('content')

    <!-- content HEADER -->
    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content headar.blade.php -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12 col-lg-4">
            <div class="row">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--WIDGETBOX-->
                <div class="col-sm-12 col-md-12">
                    <div class="panel widgetbox wbox-2 bg-scale-0">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-globe color-darker-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-1">Total Category</h4>
                                        <h1 class="title color-primary"> {{ count($category) }}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-user color-darker-2"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-2">Total Sub Category</h4>
                                        <h1 class="title color-w"> {{ count($subCategory) }}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">Total Product</h4>
                                        <h1 class="title color-light"> {{count($product)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">Total Supplier</h4>
                                        <h1 class="title color-light"> {{count($supplier)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">Total Brand</h4>
                                        <h1 class="title color-light"> {{count($brand)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="row">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--WIDGETBOX-->
                <div class="col-sm-12 col-md-12">
                    <div class="panel widgetbox wbox-2 bg-scale-0">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-globe color-darker-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-1"> Total Order</h4>
                                        <h1 class="title color-primary"> {{ count($order) }}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-user color-darker-2"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-2">Pending Order</h4>
                                        <h1 class="title color-w"> {{count($pendingOrder)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">Total Success Full Order</h4>
                                        <h1 class="title color-light"> {{count($successOrder)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">Total Customer</h4>
                                        <h1 class="title color-light"> {{count($customer)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-sm-12 col-lg-4">
            <div class="row">
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <!--WIDGETBOX-->
                <div class="col-sm-12 col-md-12">
                    <div class="panel widgetbox wbox-2 bg-scale-0">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-globe color-darker-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-1">Cancel Order</h4>
                                        <h1 class="title color-primary"> {{count($cancelOrder)}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $j=0; $totals = 0; ?>
                    @foreach($allOrders as $order)
                        <?php $subTotal= $order->order_total?>
                        <?php $j++; $totals = $totals+$subTotal; ?>
                    @endforeach
                    <div class="panel widgetbox wbox-2 bg-lighter-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-user color-darker-2"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-darker-2">Today Sells</h4>
                                        <h1 class="title color-w"> {{$totals}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $p=0; $totalsweeklysells = 0; ?>
                    @foreach($weeklyorders as $weeklyorder)
                        <?php $subTotal2= $weeklyorder->order_total?>
                        <?php $p++; $totalsweeklysells = $totalsweeklysells+$subTotal2; ?>
                    @endforeach
                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">This week total sells</h4>
                                        <h1 class="title color-light"> {{$totalsweeklysells}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <?php $k=0; $thismonthsells = 0; ?>
                    @foreach($monthlyOrders as $monthlyOrder)
                        <?php $subTotal3= $monthlyOrder->order_total?>
                        <?php $k++; $thismonthsells = $thismonthsells+$subTotal3; ?>
                    @endforeach

                    <div class="panel widgetbox wbox-2 bg-darker-2 color-light">
                        <a href="#">
                            <div class="panel-content">
                                <div class="row">
                                    <div class="col-xs-4">
                                        <span class="icon fa fa-envelope color-lighter-1"></span>
                                    </div>
                                    <div class="col-xs-8">
                                        <h4 class="subtitle color-lighter-1">This Month total sells</h4>
                                        <h1 class="title color-light"> {{$thismonthsells}}</h1>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

            </div>

        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

@endsection
