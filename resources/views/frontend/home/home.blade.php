@extends("frontend.master")
@section('title')
    Home One || OurStore
@endsection
@section('content')
    <style>
        @media (max-width: 400px) {
            .spclimg{
                height: 150px!important;
            }

        }
    </style>

    <section class="slider-area home-1">
        <div class="preview-1">
            @foreach($sliders as $slider)
            <div id="ensign-nivoslider" class="slides">
                <img src="{{asset($slider->image)}}" alt="" title="#slider-direction-1" />
            </div>
            <!-- direction 1 -->
            <div id="slider-direction-1" class="t-cn slider-direction slider-one">
                <div class="slider-progress"></div>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 text-right">
                            <div class="slider-content">
                                <!-- layer 1 -->
                                <div class="layer-1-1">
                                    <h2 class="title1 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay=".8s">{{$slider->first_header}}</h2>
                                </div>
                                <!-- layer 2 -->
                                <div class="layer-1-2">
                                    <p class="title2">
                                                <span class="fashion-1 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="1s"><i class="fa fa-modx"></i>
                                                </span>
                                    </p>
                                </div>
                                <!-- layer 3 -->
                                <div class="layer-1-3 hidden-xs">
                                    <p class="title3 wow bounceInLeft" data-wow-duration="0.5s" data-wow-delay="1.5s" >{{$slider->last_header}}</p>
                                </div>
                                <!-- layer 4 -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            <!-- direction 2 -->
{{--            <div id="slider-direction-2" class="slider-direction slider-two">--}}
{{--                <div class="slider-progress"></div>--}}
{{--                <div class="container">--}}
{{--                    <div class="row">--}}
{{--                        <div class="col-lg-12 col-md-12 text-left">--}}
{{--                            <div class="slider-content">--}}
{{--                                <!-- layer 1 -->--}}
{{--                                <div class="layer-1-1">--}}
{{--                                    <h2 class="title1 wow bounceInRight" data-wow-duration="0.5s" data-wow-delay=".8s">fashion for <span class="h-color">men</span></h2>--}}
{{--                                </div>--}}
{{--                                <!-- layer 2 -->--}}
{{--                                <div class="layer-1-2">--}}
{{--                                    <p class="title2">--}}
{{--                                                <span class="fashion-1 fashion-2 wow bounceInRight" data-wow-duration="0.5s" data-wow-delay="1s"><i class="fa fa-modx"></i>--}}
{{--                                                </span>--}}
{{--                                    </p>--}}
{{--                                </div>--}}
{{--                                <!-- layer 3 -->--}}
{{--                                <div class="layer-1-3 layer-2-3 hidden-xs">--}}
{{--                                    <p class="title3  wow bounceInRight" data-wow-duration="0.5s" data-wow-delay="1.5s" >Clean and elegant design with a modern style.</p>--}}
{{--                                </div>--}}
{{--                                <!-- layer 4 -->--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>

    </section>
    <!-- End-slider-->
    <!-- Start-banner-area-->
    <!-- End-banner-area-->
    <!-- Start-featured-area-->
    <div class="featured-product-wrap padding-t padding-dis">
        <div class="container">
            <!-- section-heading start -->
            <div class="section-heading">
                <h3><span class="h-color">FEATURED</span> PRODUCTS</h3>
            </div>
            <!-- section-heading end -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="features-tab">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--start-home-section-->
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    <div class="">
                                        <!-- Start-single-product -->
                                        @foreach($featureds as $category)
                                        <div class="col-lg-3 col-sm-6 col-xs-6">
                                            <div class="single-product">
                                                @if($category->product_stock > 0)
                                                    <div class="sale">
                                                        Sale
                                                    </div>
                                                @elseif($category->product_stock <= 0)
                                                    <div style="color: red" class="sale">
                                                        Unsale
                                                    </div>
                                                @endif

                                                <div class="sale-border"></div>
                                                @if($category->product_stock <= 0)
                                                    <div class="new">out of stock</div>
                                                @endif
                                                <div class="product-img-wrap">
                                                    <a class="product-img" href="@if($category->product_stock > 0)
                                                    {{route('product-details',['id'=>$category->id])}}
                                                    @endif">
                                                        <img src="{{asset($category->main_image)}}" class="spclimg" style="height:277px;width: 264px;" alt="product-image" /></a>
                                                    <div class="add-to-link">
                                                        <form  action="{{ route('new-wish-list') }}" method="post">
                                                            @csrf
                                                        <input type="hidden" value="{{ $category->id }}" name="product_id">
                                                        <a href="">
                                                            <div><i class="fa fa-heart"></i><span><button type="submit" style="padding: 0;border: none;background: none">Add to Wishlist</button></span></div>
                                                        </a>
                                                        </form>
                                                    </div>
                                                    <form  action="{{ route('cart-add') }}" method="post" style="display: inline" id="add-to-cart-form">
                                                        @csrf
                                                    <div class="add-to-cart">
                                                        <button type="submit" style="border: none;background: none">
                                                            <a title="add to cart">
                                                                <input type="hidden" value="{{ $category->id }}" name="Product_id">
                                                                <div><i class="fa fa-shopping-cart"></i><span>Add to cart</span></div>
                                                            </a>
                                                        </button>
                                                    </div>
                                                    </form>
                                                </div>
                                                <div class="product-info text-center">
                                                    <div class="product-content">
                                                        <a href="@if($category->product_stock > 0)
                                                        {{route('product-details',['id'=>$category->id])}}
                                                        @endif">
                                                            <h3 class="pro-name">{{$category->product_name}}</h3>
                                                        </a>
                                                        <div class="pro-price">
                                                            <span class="price-text">Price:</span>
                                                            <span class="normal-price">৳{{$category->discount_product_price}}</span>
                                                            <span class="old-price"><del>৳{{$category->product_price}}</del></span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                        <!-- End-single-product -->
                                    </div>
                                </div>
                            </div>
                            <!--end-home-section-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-featured-area-->
    <div class="clear"></div>
    <!--Start-banner-area-->
    <div class="banner-area padding-t banner-dis11">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="single-banner banner-r-b">
                        <a href="{{$banner->url}}"><img alt="Hi Guys" src="{{asset($banner->image)}}" style="width: 458px ;height: 189px;" /></a>
                    </div>
                </div>
                <div class="col-lg-7 col-md-7 col-sm-7 col-xs-12">
                    <div class="single-banner">
                        <a href="{{$banner2->url}}"><img alt="Hi Guys" src="{{asset($banner2->image)}}" style="width: 653px;height: 189px;"/></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--End-banner-area-->
    <div class="clear"></div>
    <!--Start-new-arrival-random-wrap-->
{{--    ............--}}
    <div class="featured-product-wrap padding-t padding-dis">
        <div class="container">
            <!-- section-heading start -->
            <div class="section-heading">
                <h3><span class="h-color">New</span> Arrivals</h3>
            </div>
            <!-- section-heading end -->
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="features-tab">
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <!--start-home-section-->
                            <div role="tabpanel" class="tab-pane active" id="home">
                                <div class="row">
                                    <div class="featured-carousel indicator">
                                        <!-- Start-single-product -->
                                        @foreach($arrivals as $category)
                                            <div class="col-lg-3 col-sm-6 col-xs-6">
                                                <div class="single-product">
                                                    @if($category->product_stock > 0)
                                                        <div class="sale">
                                                            Sale
                                                        </div>
                                                    @elseif($category->product_stock <= 0)
                                                        <div style="color: red" class="sale">
                                                            Unsale
                                                        </div>
                                                    @endif

                                                    <div class="sale-border"></div>
                                                    @if($category->product_stock <= 0)
                                                        <div class="new">out of stock</div>
                                                    @endif
                                                    <div class="product-img-wrap">
                                                        <a class="product-img" href="@if($category->product_stock > 0)
                                                        {{route('product-details',['id'=>$category->id])}}
                                                        @endif">
                                                            <img src="{{asset($category->main_image)}}" style="height:277px;width: 264px;" alt="product-image" /></a>
                                                        <div class="add-to-link">
                                                            <form  action="{{ route('new-wish-list') }}" method="post">
                                                                @csrf
                                                                <input type="hidden" value="{{ $category->id }}" name="product_id">
                                                                <a href="">
                                                                    <div><i class="fa fa-heart"></i><span><button type="submit" style="padding: 0;border: none;background: none">Add to Wishlist</button></span></div>
                                                                </a>
                                                            </form>
                                                        </div>
                                                        <form  action="{{ route('cart-add') }}" method="post" style="display: inline">
                                                            @csrf
                                                            <div class="add-to-cart">
                                                                <button type="submit" style="border: none;background: none">
                                                                    <a title="add to cart">
                                                                        <input type="hidden" value="{{ $category->id }}" name="Product_id">
                                                                        <div><i class="fa fa-shopping-cart"></i><span>Add to cart</span></div>
                                                                    </a>
                                                                </button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                    <div class="product-info text-center">
                                                        <div class="product-content">
                                                            <a href="@if($category->product_stock > 0)
                                                            {{route('product-details',['id'=>$category->id])}}
                                                            @endif">
                                                                <h3 class="pro-name">{{$category->product_name}}</h3>
                                                            </a>
                                                            <div class="pro-price">
                                                                <span class="price-text">Price:</span>
                                                                <span class="normal-price">৳{{$category->discount_product_price}}</span>
                                                                <span class="old-price"><del>৳{{$category->product_price}}</del></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                    @endforeach
                                    <!-- End-single-product -->
                                    </div>
                                </div>
                            </div>
                            <!--end-home-section-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-new-arrival-random-wrap-->
    <div class="clear"></div>
    <!--Start-latest-products-wrap-->
    <div class="latest-products-wrap padding-t">
        <div class="container">
            <div class="latest-content text-center">
                <div class="section-heading">
                    <h3><span class="h-color">latest</span> Products</h3>
                </div>
            </div>
            <div class="row">
                <div class="featured-carousel indicator">
                    <!-- Start-single-product -->
                    @foreach($latests as $category)
                    <div class="col-lg-3 col-md-3 col-sm-6 col-xs-6">
                        <div class="single-product">
                            @if($category->product_stock > 0)
                                <div class="sale">
                                    Sale
                                </div>
                            @elseif($category->product_stock <= 0)
                                <div style="color: red" class="sale">
                                    Unsale
                                </div>
                            @endif

                            <div class="sale-border"></div>
                            @if($category->product_stock <= 0)
                                <div class="new">out of stock</div>
                            @endif
                            <div class="product-img-wrap">
                                <a class="product-img" href="@if($category->product_stock > 0)
                                {{route('product-details',['id'=>$category->id])}}
                                @endif">
                                    <img src="{{asset($category->main_image)}}" style="height:277px;width: 264px;" alt="product-image" /></a>
                                <div class="add-to-link">
                                    <form  action="{{ route('new-wish-list') }}" method="post">
                                        @csrf
                                        <input type="hidden" value="{{ $category->id }}" name="product_id">
                                        <a href="">
                                            <div><i class="fa fa-heart"></i><span><button type="submit" style="padding: 0;border: none;background: none">Add to Wishlist</button></span></div>
                                        </a>
                                    </form>
                                </div>
                                <form  action="{{ route('cart-add') }}" method="post" style="display: inline">
                                    @csrf
                                    <div class="add-to-cart">
                                        <button type="submit" style="border: none;background: none">
                                            <a title="add to cart">
                                                <input type="hidden" value="{{ $category->id }}" name="Product_id">
                                                <div><i class="fa fa-shopping-cart"></i><span>Add to cart</span></div>
                                            </a>
                                        </button>
                                    </div>
                                </form>
                            </div>
                            <div class="product-info text-center">
                                <div class="product-content">
                                    <a href="@if($category->product_stock > 0)
                                    {{route('product-details',['id'=>$category->id])}}
                                    @endif">
                                        <h3 class="pro-name">{{$category->product_name}}</h3>
                                    </a>
                                    <div class="pro-price">
                                        <span class="price-text">Price:</span>
                                        <span class="normal-price">৳{{$category->discount_product_price}}</span>
                                        <span class="old-price"><del>৳{{$category->product_price}}</del></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>
        </div>
    </div>
    <!--End-latest-products-wrap-->
    <!--Start-brand-area-->
    <div class="business-policy-wrap padding-t">
        <div class="container">
            <div class="row">
                <!--Satar-single-p-wrap-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="single-p-wrap banner-r-b text-center">
                        <span><i class="fa fa-plane"></i></span>
                        <h4> SHIPPING IN BANGLADESH.</h4>
                    </div>
                </div>
                <!--end-single-p-wrap-->
                <!--Satar-single-p-wrap-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="single-p-wrap banner-r-b text-center">
                        <span><i class="fa fa-life-ring"></i></span>
                        <h4>24/7 CUSTOMER SERVICE.</h4>
                    </div>
                </div>
                <!--end-single-p-wrap-->
                <!--Satar-single-p-wrap-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="single-p-wrap banner-r-b text-center">
                        <span><i class="fa fa-money"></i></span>
                        <h4>100% MONEY BACK</h4>
                    </div>
                </div>
                <!--end-single-p-wrap-->
                <!--Satar-single-p-wrap-->
                <div class="col-lg-3 col-md-3 col-sm-3 col-xs-12">
                    <div class="single-p-wrap text-center">
                        <span><i class="fa fa-clock-o"></i></span>
                        <h4>24 HOUR YOU CAN SHOP</h4>
                    </div>
                </div>
                <!--end-single-p-wrap-->
            </div>
        </div>
    </div>
    <!--End-brand-area-->
    <!--Start-variety-products-wrap-->



    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
       $("#ajaxxdata").on("submit",function (e) {
           e.preventDefault();
    //        var form = $(this);
    //        var url = form.attr('action');
    //        var type = form.attr('method');
    //        var data = form.serialize();

    //        $.ajax({
    //            url:url,
    //            data:data,
    //            type:type,
    //            datatype: "json",
    //             success: function (data) {
    //                 alert(data);
    //             },
    //        });
    //    });
    });
</script>
    @endsection
