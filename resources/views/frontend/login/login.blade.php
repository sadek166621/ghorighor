@extends("frontend.master")
@section('title')
    Login
    @endsection
@section('content')
    <div class="single-banner-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12  text-center">
                    <div class="single-ban-top-content">
                        <p>Login</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-single-heading-banner-->
    <!--start-single-heading-->
    <div class="signle-heading login-m">
        <div class="container">
            <div class="row">
                <!--start-shop-head -->
                <div class="col-lg-12">
                    <div class="shop-head-menu">
                        <ul>
                            <li><i class="fa fa-home"></i><a class="shop-home" href="index.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                            <li class="shop-pro">Login</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <!-- login-area start -->
    <div class="login-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-content banner-r-b">
                        <h2 class="login-title">Login</h2>
                        <p>Hello,Welcome to your account</p>
                        <h4 class="mb-md text-danger text-center">{{session('message')}}</h4>
                        <form action="{{ route('customer-login') }}" method="post">
                            @csrf
                            <label>Email Address</label>
                            <input name="username" required type="text" />
                            <label>Password</label>
                            <input name="password" required type="password" />

                            <input class="login-sub" type="submit" value="Login" />
                        </form>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="login-content banner-r-b">
                    <div class="resestered-customers customer">
                        <div class="customer-inner">
                            <div class="user-title">
                                <h2><i class="fa fa-file-text"></i>Registered  Customers</h2>
                            </div>
                            <div class="user-content">
                                <p>If you have an account with us, please log in.</p>
                            </div>
                            <div class="account-form">
                                <form class="form-horizontal product-form" action="{{ route('new-customer') }}" method="post">
                                    @csrf
                                    <div class="form-goroup">
                                        <label>Name<sup>*</sup></label>
                                        <input type="text" name="name" required="required" class="form-control">
                                    </div>
                                    <div class="form-goroup">
                                        <label>Phone<sup>*</sup></label>
                                        <input type="text" name="mobile_number" required="required" class="form-control">
                                    </div>
                                    <div class="form-goroup">
                                        <label>Email Address <sup>*</sup></label>
                                        <input type="email" name="email" required="required" class="form-control">
                                    </div>
                                    <div class="form-goroup">
                                        <label>Password <sup>*</sup></label>
                                        <input type="password" name="password" required="required" class="form-control">
                                    </div>
                                    <div class=" fix" style="padding-left: 336px;">
                                        <input class="login-sub" type="submit" value="Login" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- login-area end -->
    @endsection
