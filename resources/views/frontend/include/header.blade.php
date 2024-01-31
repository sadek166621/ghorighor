@php
    $products = Cart::content();
     $i=0;
     $total=0;

@endphp
@foreach($products as $product)
    @php
        $i++;
        $total += $product->subtotal;
    @endphp

@endforeach
<style>
    @media (max-width: 400px) {
        .mean-container .mean-bar{
            float: left;
            min-height: 38px;
            padding: 0px 20px 0;
            position: relative!important;
            right: 10px!important;
            width: 250px!important;
            z-index: 99;
        }
    }
    /*@media (max-width: 316px) {*/
    /*    .mean-container .mean-bar{*/
    /*        float: left;*/
    /*        min-height: 38px;*/
    /*        padding: 2px 20px 0;*/
    /*        position: relative;*/
    /*        right: 3px;*/
    /*        width: 247px;*/
    /*        z-index: 99;*/
    /*    }*/
    /*}*/
    /*@media (max-width: 336px) {*/
    /*    .mean-container .mean-bar{*/
    /*        float: left;*/
    /*        min-height: 38px;*/
    /*        padding: 2px 20px 0;*/
    /*        position: relative;*/
    /*        right: 25px;*/
    /*        width: 279px;*/
    /*        z-index: 99;*/
    /*    }*/
    /*}*/
    /*@media (max-width: 360px) {*/
    /*    .mean-container .mean-bar{*/
    /*        float: left;*/
    /*        min-height: 38px;*/
    /*        padding: 2px 20px 0;*/
    /*        position: relative;*/
    /*        right: 40px;*/
    /*        width: 310px;*/
    /*        z-index: 99;*/
    /*    }*/
    /*}*/
    /*@media (max-width: 458px) {*/
    /*    .mean-container .mean-bar{*/
    /*        float: left;*/
    /*        min-height: 38px;*/
    /*        padding: 2px 20px 0;*/
    /*        position: relative;*/
    /*        right: 86px;*/
    /*        width: 404px;*/
    /*        z-index: 99;*/
    /*    }*/
    /*}*/
</style>
<header>
    <div class="header-top-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="header-top-left">
                        <!--Start-Header-language-->
                        <!--End-Header-language-->
                        <!--Start-Header-currency-->
                        <div>
                            <a role="" data-toggle="" data-target="" class="top-currency dropdown-toggle" href="#" style="font-size: 15px;">
                                <span class="usd-icon">
                                    <i class="fa fa-phone">
                                    </i></span>
                                Call Us Now :+8801784909595<span class="">
                                </span>
                            </a>
                        </div>
                        <!--End-Header-currency-->
                        <!--Start-welcome-message-->
                        <!--End-welcome-message-->
                    </div>
                </div>
                <!-- Start-Header-links -->
{{--                <h3 class="text-center" style="color:#ff8d00;position: absolute;left: 389px;">{{Session::get('message')}}</h3>--}}
                <div class="col-lg-6 col-md-6">
                    <div class="header-top-center">
                        <marquee width="100%" style="color: white;font-size: 14px" direction="left" height="22px">
                            <b>{{$marque->category_name}}</b>
                        </marquee>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="header-top-right">
                        <div class="top-link-wrap">
                            <div class="single-link">
                                @if($customerId = Session::get('customerId'))
                                    <div class="login"><a href="{{route('customer-logout')}}"><span  class="">{{ Session::get('customerName') }}</span></a></div>
                                @else
                                    <div class="login"><a href="{{route('customer-login')}}"><span  class="">Log In</span></a></div>
                                @endif
                                <div class="wishlist"><a href="{{route('wish-list')}}"><span class="">Wishlist</span></a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End-Header-links -->
            </div>
        </div>
    </div>
    <!--Start-header-mid-area-->
    <div class="header-mid-wrap">
        <div class="container">
            <div class="header-mid-content">
                <div class="row">
                    <!--Start-logo-area-->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <div class="header-logo">
                            <a href="{{url('/')}}"><img src="{{asset($logos->image)}}" style="height: 53px;width: 263px" alt="OurStore"></a>
                        </div>
                    </div>
                    <!--End-logo-area-->
                    <!--Start-gategory-searchbox-->
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                        <div id="search-category-wrap">
                            <form class="header-search-box" action="{{ route('search') }}" method="post">
                                @csrf
                                <div class="search-cat">
                                    <select class="category-items" name="category" onchange="window.location.href=this.value">
                                        <option>All Categories</option>
                                        @foreach($categories as $category)
                                        <option value="{{url('our-product',['id'=>$category->id])}}">{{$category->category_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="search" placeholder="Search here..." id="text-search" name="search_content">
                                <button id="btn-search-category" type="submit">
                                    <i class="fa fa-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!--End-gategory-searchbox-->
                    <!--Start-cart-wrap-->
                    <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                        <ul class="header-cart-wrap">
                            <li><a class="cart" href="#"> My Cart: {{$i}} items</a>
                                <div class="mini-cart-content">
                                    <div class="cart-products-list" id="totalItems">
                                        @foreach($products as $product)
                                        <div class="sing-cart-pro">
                                            <div class="cart-image">
                                                <a href="#"><img src="{{asset($product->options->image)}}" alt=""></a>
                                            </div>
                                            <div class="cart-product-info">
                                                <a href="#" class="product-name">{{ $product->name }}</a>
                                                <div class="cart-price">
                                                    <span class="quantity"><strong>{{ $product->qty }}x</strong></span>
                                                    <span class="p-price">৳{{ $product->price }}</span>
                                                </div>
                                                <a href="{{ route('cart-remove',['id'=>$product->rowId]) }}" class="remove-pro" title="remove"><i class="fa fa-times"></i></a>
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                    <div class="cart-price-list">
                                        <p class="price-amount"><span class="cart-subtotal">SUBTotal :</span> <span>৳{{$total}}</span> </p>
                                        <div class="cart-checkout">
                                            <a href="{{route('checkout')}}">Checkout</a>
                                        </div>
                                        <div class="view-cart">
                                            <a href="{{route('show-cart')}}">View cart</a>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!--End-cart-wrap-->
                </div>
            </div>
        </div>
    </div>
    <!--End-header-mid-area-->
    <!--Start-Mainmenu-area -->
    <div class="mainmenu-area hidden-sm hidden-xs">
        <div id="sticker">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 hidden-sm hidden-xs">
                        <div class="log-small"><a class="logo" href="{{url('/')}}"><img alt="OurStore" style="height: 50px;width: 263px" src="{{asset($logos->image)}}"></a></div>
                        <div class="mainmenu">
                            <nav>
                                <ul id="nav">
                                    <li class=""><a href="{{url('/')}}">Home</a>
                                    </li>
                                    <li class=""><a href="{{url('all-categorys',['id'=>$category->id])}}">All Categorys</a>
                                    </li>
                                    <li class="angle-down"><a href="">SHOP</a>
                                        <div class="megamenu pages">
                                            <div class="megamenu-list">
                                                            <span class="mega-single pages">
                                                                @foreach($categories as $category)
                                                                <a href="{{url('our-product',['id'=>$category->id])}}">{{$category->category_name}}</a>
                                                                    @endforeach
                                                            </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="angle-down"><a href="">Brands</a>
                                        <div class="megamenu pages">
                                            <div class="megamenu-list">
                                                            <span class="mega-single pages">
                                                                @foreach($brands as $brand)
                                                                <a href="{{url('our-brand-product',['id'=>$brand->id])}}">{{$brand->brand_name}}</a>
                                                                    @endforeach
                                                            </span>
                                            </div>
                                        </div>
                                    </li>
                                    <li class=""><a href="{{url('our-primium-product')}}">Primium Watch</a>
                                    <li class=""><a href="{{url('our-latest-product')}}">Latest Watch</a>
                                    </li>
                                    <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-Mainmenu-area-->
    <!--Start-Mobile-Menu-Area -->
    <div class="mobile-menu-area visible-sm visible-xs">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="mobile-menu">
                        <nav id="dropdown">
                            <ul>
                                <li><a href="{{url('/')}}">Home</a>
                                </li>
                                <li><a href="{{url('all-categorys',['id'=>$category->id])}}">All Categorys</a>
                                </li>
                                <li><a >SHOP</a>
                                    <ul>
                                        @foreach($categories as $category)
                                        <li><a href="{{url('our-product',['id'=>$category->id])}}">{{$category->category_name}}</a></li>
                                            @endforeach
                                    </ul>
                                </li>
                                <li><a >Brands</a>
                                    <ul>
                                        @foreach($brands as $brand)
                                            <li><a href="{{url('our-brand-product',['id'=>$brand->id])}}">{{$brand->brand_name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{url('our-primium-product')}}">Primium Watch</a>
                                </li>
                                <li><a href="{{url('our-latest-product')}}">Latest Watch</a>
                                </li>
                                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-Mobile-Menu-Area -->
</header>
