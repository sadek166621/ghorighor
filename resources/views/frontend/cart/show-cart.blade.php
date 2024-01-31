@extends("frontend.master")
@section('title')
    Show-cart
    @endsection
@section('content')
    <div class="single-banner-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="single-ban-top-content">
                        <p>Shopping Cart</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-single-heading-banner-->
    <!--start-single-heading-->
    <div class="signle-heading">
        <div class="container">
            <div class="row">
                <!--start-shop-head -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-head-menu">
                        <ul>
                            <li><i class="fa fa-home"></i><a class="shop-home" href="index.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                            <li class="shop-pro">Shopping Cart</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <!-- cart-main-area start-->
    <div class="cart-main-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="table-content table-responsive">
                            <table>
                                <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-subtotal">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                                </thead>
                                <tbody>
                                @php
                                    $products = Cart::content();
                                     $i=1;
                                     $total=0;
                                @endphp
                                @foreach($products as $product)
                                <tr>
                                    <td class="product-thumbnail"><a href="#"><img src="{{ asset($product->options->image) }}" alt="" /></a></td>
                                    <td class="product-name"><a href="#">{{ $product->name }}</a></td>
                                    <td class="product-price"><span class="amount">৳{{$product->price}}</span></td>

                                    <td class="product-quantity">

                                        <form action="{{ route('cart-update') }}" method="post" class="form-inline">
                                            @csrf
                                            <div class="form-group" style="position: relative">
                                           @if($product->qty > 0)
                                           <button type="submit" >
                                            <input class="form-control" type="number" name="qty" value="{{ $product->qty }}" style="width: 28%">
                                            </button>
                                            @endif
                                                <input type="hidden" name="rowId" value="{{ $product->rowId }}">
                                                <input type="submit" class="btn btn-warning form-control" value="update" style="width: 66px;">
                                            </div>
                                        </form>
                                    </td>
                                    <td class="product-subtotal">৳{{ $product->subtotal }}</td>
                                    <td class="product-remove"><a href="{{ route('cart-remove',['id'=>$product->rowId]) }}"><i class="fa fa-times"></i></a></td>
                                </tr>
                                @php
                                    $i++;
                                    $total += $product->subtotal;
                                @endphp
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 col-md-8 col-sm-7 col-xs-12">
{{--                                <div class="buttons-cart">--}}
{{--                                    <a href="#">Continue Shopping</a>--}}
{{--                                </div>--}}
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-5 col-xs-12">
                                <div class="cart_totals">
                                    <h2>Cart Totals</h2>
                                    <table>
                                        <tbody>
                                        <tr class="cart-subtotal">
                                            <th>Subtotal</th>
                                            <td><span class="amount">৳ <?php echo $total ?></span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul id="shipping_method">
                                                    <li>
                                                        <label>
                                                            ঢাকার ভিতরে ডেলিভারি চার্জ: <span class="amount">৳60</span><br>
                                                            ঢাকার বাইরে ডেলিভারি চার্জ: <span class="amount">৳120</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Total</th>
                                            <td>
                                                <strong><span class="amount">
                                                        ৳ <?php echo $total ?>
                                                    </span></strong>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                    <div class="wc-proceed-to-checkout">
                                        <a href="{{route('checkout')}}">Proceed to Checkout</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart-main-area end -->
    @endsection
