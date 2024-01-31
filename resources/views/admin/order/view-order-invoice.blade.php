{{--@extends('admin.master')--}}
{{--@section('title')--}}
{{--    Manage Order--}}
{{--@endsection--}}
{{--@section('body')--}}
<style>
    .invoice-box{
        max-width:800px;
        margin:auto;
        padding:30px;
        border:1px solid #eee;
        /*box-shadow:0 0 10px rgba(0, 0, 0, .15);*/
        font-size:16px;
        line-height:24px;
        font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
        color:#555;
    }

    .invoice-box table{
        width:100%;
        line-height:inherit;
        text-align:left;
    }

    .invoice-box table td{
        padding:5px;
        vertical-align:top;
    }

    .invoice-box table tr td:nth-child(2){
        text-align:right;
    }

    .invoice-box table tr.top table td{
        padding-bottom:20px;
    }

    .invoice-box table tr.top table td.title{
        font-size:45px;
        line-height:45px;
        color:#333;
    }

    .invoice-box table tr.information table td{
        padding-bottom:40px;
    }

    .invoice-box table tr.heading td{
        /*background:#eee;*/
        border-bottom:1px solid #eee;
        font-weight:bold;
    }

    .invoice-box table tr.details td{
        padding-bottom:20px;
    }

    .invoice-box table tr.item td{
        border-bottom:1px solid #eee;
    }

    .invoice-box table tr.item.last td{
        border-bottom:none;
    }

    .invoice-box table tr.total td:nth-child(2){
        border-top:2px solid #eee;
        font-weight:bold;
    }

    @media only screen and (max-width: 600px) {
        .invoice-box table tr.top table td{
            width:100%;
            display:block;
            text-align:center;
        }

        .invoice-box table tr.information table td{
            width:100%;
            display:block;
            text-align:center;
        }
    }
</style>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="invoice-box" style="background-color: white;">
                <table cellpadding="0" cellspacing="0" >
                    <tr class="top">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td class="title">
                                        <img src="{{ asset('frontend') }}/assets/img/logo/logo.png" style="width:80%; max-width:200px;">
                                    </td>

                                    <td>
                                        Invoice #:{{ $orderInfo->order_no }}<br>
                                        Created: {{ date("F j, Y") }}<br>
                                        Order Date: {{ date('F j, Y',strtotime($orderInfo->created_at)) }}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>

                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        <h3>Order Billing Info</h3>
                                        <span> First Name : </span> {{ $shippingInfo->first_name}}<br>
                                        <span> Late Name : </span> {{ $shippingInfo->last_name}}<br>
                                        <span> Address : </span> {{ $shippingInfo->address }}<br>
                                        <span> Email : </span> {{ $shippingInfo->email }}<br>
                                        <span> Mobile Number : </span>{{ $shippingInfo->phone }}<br>
                                    </td>

                                    <td>
                                        <h3>Order Delivery Info</h3>
                                        <span> Name : </span> {{ $shippingInfo->first_name }}<br>
                                        <span> Address : </span> {{ $shippingInfo->address }}<br>
                                        <span> Mobile Number : </span>{{ $shippingInfo->phone }}<br>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <table border="1">
                    <tr class="heading">
                        <td>SL NO</td>
                        <td>Product Name</td>
                        <td>Product Code</td>
                        <td>Product Price</td>
                        <td>Product Quantity</td>
                        <td>Total Price</td>
                    </tr>
                    <?php $i=1; $total = 0; ?>
                    @foreach($orderProductsInfo as $orderProductInfo)
                        <tr class="item">
                            <td>{{ $i }}</td>
                            <td>{{ $orderProductInfo->product_name }}</td>
                            <td class="text-center">{{ $orderProductInfo->product_code }}</td>
                            {{--                            <td class="text-center">{{ $orderInfo->order_total }}</td>--}}
                            @if($orderProductInfo->discount_product_price>0)
                                <td class="text-center">TK. {{ $orderProductInfo->discount_product_price }}</td>
                            @else
                                <td class="text-center">TK. {{ $orderProductInfo->product_price }}</td>
                            @endif
                            <td class="text-center">{{ $orderProductInfo->quantity }}</td>
                            @if($orderProductInfo->discount_product_price>0)
                                <td class="text-right">TK. {{ $subTotal = $orderProductInfo->discount_product_price*$orderProductInfo->quantity }}</td>
                            @else
                                <td class="text-right">TK. {{ $subTotal = $orderProductInfo->product_price*$orderProductInfo->quantity }}</td>
                            @endif
                        </tr>
                        <?php $i++; $total = $total+$subTotal; ?>
                    @endforeach
                    <tr class="total">
                </table>
                <table>
                    <tr>
                        <td style="text-align: right;">



                                @php
                                    $total2 = $total+$orderInfo->subtk;
                                @endphp


                            Sub Total: TK. {{ $total }}<br>

                                shipping : TK. {{$orderInfo->subtk}} <br>

                                Total: TK. {{ $total2}}

                        </td>
                    </tr>
                </table>
                <hr/>
                <br/><br/><br/><br/><br/>
                <table cellpadding="0" cellspacing="0" >
                    <tr class="information">
                        <td colspan="2">
                            <table>
                                <tr>
                                    <td>
                                        <hr/>
                                        Received By Signature
                                    </td>

                                    <td>
                                        <hr/>
                                        Delivery By Signature
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section><!-- /.content -->
{{--@endsection--}}
