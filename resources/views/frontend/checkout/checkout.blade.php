@extends("frontend.master")
@section('title')
    Checkout
    @endsection
    @section('content')
        @php
            $products = Cart::content();
             $x=0;
             $total=0;
             $total1=0;
        @endphp
        @foreach($products as $product)
            @php
                $total += $product->subtotal;
                $x++
            @endphp

        @endforeach
        <div class="single-banner-top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                        <div class="single-ban-top-content">
                            <p>Checkout</p>
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
                    <div class="col-lg-12">
                        <div class="shop-head-menu">
                            <ul>
                                <li><i class="fa fa-home"></i><a class="shop-home" href="index.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                                <li class="shop-pro">Checkout</li>
                            </ul>
                        </div>
                    </div>
                    <!--end-shop-head-->
                </div>
            </div>
        </div>
        <!--end-single-heading-->
        <!-- checkout-area start -->
        <div class="checkout-area">
            <div class="container">
                <div class="row">
                    <form action="{{ route('shipping') }}" method="post">
                        @csrf
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="checkbox-form">
                                <h3>Billing And Shipping Details</h3>
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label>First Name <span class="required">*</span></label>
                                            <input type="text" name="first_name" placeholder="আপনার প্রথম নাম" required />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label>Last Name <span class="required">*</span></label>
                                            <input type="text" name="last_name" required placeholder="আপনার শেষ নাম" />
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label>Address <span class="required">*</span></label>
                                            <input type="text" name="address" required placeholder="ঠিকানা" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label>Town / City <span class="required">*</span></label>
                                            <input type="text" name="city" required placeholder="শহর/গ্রাম" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label>Postcode / Zip (Optional) <span class="required"></span></label>
                                            <input type="text" name="zip" placeholder="জিপ কোড(ঐচ্ছিক)" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label>Email Address (Optional) <span class="required"></span></label>
                                            <input type="email" name="email" placeholder="আপনার ইমেল(ঐচ্ছিক)" />
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                        <div class="checkout-form-list">
                                            <label>Phone  <span class="required">*</span></label>
                                            <input type="text" name="phone" required placeholder="আপনার মোবাইল নাম্বার" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                            <div class="your-order">
                                <h3>Your order</h3>
                                <div class="your-order-table table-responsive">
                                    <table>
                                        <thead>
                                        <tr>
                                            <th class="product-name">Product</th>
                                            <th class="product-total">Total</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($products as $product)
                                            <tr class="cart_item">
                                            <td class="product-name">
                                                {{ $product->name }} <strong class="product-quantity"> × {{ $product->qty }}</strong>
                                            </td>
                                            <td class="product-total">
                                                <span class="amount">৳ {{ $product->price }}</span>
                                            </td>
                                        </tr>
                                            @endforeach
                                        </tbody>
                                        <tfoot>
                                        <tr class="cart-subtotal">
                                            <th>Cart Subtotal</th>
                                            <td><span class="amount">৳{{$total}}</span></td>
                                        </tr>
                                        <tr class="shipping">
                                            <th>Shipping</th>
                                            <td>
                                                <ul>
                                                    <li>
                                                        <label>
                                                            <input type="radio" value="60" required name="subtk"> ঢাকার ভিতরে ডেলিভারি চার্জ: <span class="amount">৳60</span><br>
                                                            <input type="radio" value="120" required name="subtk">ঢাকার বাইরে ডেলিভারি চার্জ: <span class="amount">৳120</span>
                                                        </label>
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                        <tr class="order-total">
                                            <th>Order Total</th>
                                            <td><strong><span class="amount">৳ <?php echo $total ?></span></strong>
                                                <input type="hidden" name="order_total" value="{{ $total }}">
                                            </td>
                                        </tr>
                                        </tfoot>
                                    </table>
                                    <label>
                                        আপনি আপনার পন্যগুলো আমাদের কাছ থেকে দুই ভাবে কিনতে পারবেন <br>
                                        ১। cash on delivary হতে
                                        <br>
                                        অথবা
                                        <br>
                                        ২। মোবাইল ব্যাংকিং হতে
                                        <br>
                                        যদি আপনি আপনার পণ্যগুলো মোবাইল ব্যাংকিং হতে কিনতে চান তাহলে cash on delivary বাটনের নিচে mobile baking লিখায় ক্লিক করুন।একটি ফরম দেখে পাবেন। সেখানে আপনার অপারেটর সিলেক্ট করে আপনার মোবাইল নাম্বর,ট্রানজেকশন আইডি এবং টাকার পরিমান সঠিক ভাবে দিয়ে place order বাটনে ক্লিক করে ডেলিভারি সম্পুন করুন অথবা নগদ লেনদেন করতে চাইলে cash on delivary বাটনে ক্লিক করুন ।
                                        <br>
                                        ধন্যবাদ।
                                    </label>
                                    <hr>
                                </div>
                                <div class="payment-method">
                                    <div class="panel-default">
                                        <input id="payment" name="payment_method" type="radio"  value="cod" data-target="createp_account" />
                                        <label for="payment" data-toggle="collapse" data-target="#method" aria-controls="method">Cash on Delivery </label>
                                    </div>
                                    <div class="panel-default">
                                        <label for="payment_defult" data-toggle="collapse" data-target="#collapsedefult" aria-controls="collapsedefult" >Mobile banking</label>
                                        <div id="collapsedefult" class="collapse one" data-parent="#accordion">
                                            <input id="" name="payment_method" type="radio" value="bkash" required/>
                                            <img src="{{ asset('frontend') }}/logo/bkash.png" alt="" style="height: 20px;width: 50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input  id="" name="payment_method" type="radio" value="nogod" required/>
                                            <img src="{{ asset('frontend') }}/logo/nogod.png" alt=""style="height: 20px;width: 50px">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                            <input id="" name="payment_method" type="radio" value="roket" required/>
                                            <img src="{{ asset('frontend') }}/logo/roket.png" alt="" style="height: 20px;width: 50px">
                                            <div class="card-body1">
                                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                                    <div class="checkout-form-list">
                                                        <label style="color:red;">(Mobile No : 01784909595) <span class=""></span></label>
                                                        <label>Mobile No <span class="">*</span></label>
                                                        <input type="text" data-order_button_text="" name="payment_mobile_no" class=""><br>
                                                        <label>Transaction ID<span class="">*</span></label>
                                                        <input type="text" data-order_button_text="" name="transaction_no" class=""><br>
                                                        <label>Amount<span class="">*</span></label>
                                                        <input type="text" data-order_button_text="" name="amount" class="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="order-button-payment">
                                        <input type="submit" value="Place order" />
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- checkout-area end -->
        @endsection
