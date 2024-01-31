@extends("frontend.master")
@section('title')
    our-products
@endsection
@section('content')
    <style>
        @media (max-width: 400px) {
            .spclimg{
                height: 180px!important;
            }

        }
    </style>
    <br>
    <!--end-single-heading-->
    <!--start-shop-product-area-->
    <div class="shop-product-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                    <!-- Left-Sidebar-start-->
                    <div class="left-sidebar-title">
                        <h2>Shopping Options</h2>
                    </div>
                    <!-- Shop-Layout-start -->
                    <div class="left-sidebar">
                        <div class="shop-layout">
                            <div class="layout-title">
                                <h2>SHOP</h2>
                            </div>
                            <div class="layout-list">
                                @foreach($all_categorys as $all_category)
                                    <ul>
                                        <li><a href="{{route('menu',['id'=>$all_category->id])}}">{{$all_category->category_name}}</a><span></span></li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <!-- Shop-Layout-end -->
                        <!-- Shop-Layout-start -->
                        <div class="shop-layout">
                            <div class="layout-title">
                                <h2>BRANDS</h2>
                            </div>
                            <div class="layout-list">
                                @foreach($all_brands as $all_brand)
                                    <ul>
                                        <li><a href="{{route('brand-product',['id'=>$all_brand->id])}}">{{$all_brand->brand_name}}</a></li>
                                    </ul>
                                @endforeach
                            </div>
                        </div>
                        <!-- Shop-Layout-end -->
                        <!-- Shop-Layout-start -->
                        <!-- Shop-Layout-end -->
                    </div>
                    <!-- End-Left-Sidebar -->
                    <!-- Shop-Layout-Banner-start -->
                    <!-- Shop-Layout-Banner-end -->
                </div>
                <div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
                    <!-- Shop-Product-View-start -->
                    <div class="shop-product-view">
                        <!-- Shop Product Tab Area -->
                        <div class="product-tab-area">
                            <!-- Tab Bar -->

                            <!-- End-Tab-Bar -->
                            <!-- Tab-Content -->
                            <div class="tab-content">
                                <!-- Shop Product-->
                                <div id="shop-product" class="tab-pane active">
                                    <div class="row">
                                        <!-- Start-single-product -->
                                        @if($latest->isEmpty())
                                            <h1 style="text-align: center; background-color: #FFBB00;"><b>Sorry No Products</b></h1>
                                            <br>
                                            <br>
                                        @else
                                        @foreach($latest as $category)
                                            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-6">
                                                <div class="single-product shop-mar-bottom">
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
                                                            <img src="{{asset($category->main_image)}}" class="spclimg" style="height:277px;width: 264px" alt="product-image" /></a>
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
                                        @endif
                                    <!-- End-single-product -->
                                    </div>
                                </div>
                                <!-- End-Shop-Product-->
                                <!-- Shop List -->
                                <div id="shop-list" class="tab-pane">
                                    <!-- start-Single-Shop-list-->
                                    <div class="single-shop">
                                        <div class="row">
                                            <!-- single-product-start -->
                                            <div class="single-product">
                                                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                                                    <div class="product-img-wrap">
                                                        <a class="product-img" href="#"> <img src="{{asset('frontend')}}/images/product/14.jpg" alt="product-image" /></a>
                                                    </div>
                                                </div>
                                                <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                                                    <div class="product-info text-left">
                                                        <div class="product-content shop">
                                                            <a href="#"><h3 class="pro-name">Sample Product</h3></a>
                                                            <div class="pro-rating">
                                                                <ul>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li><i class="fa fa-star"></i></li>
                                                                    <li class="r-grey"><i class="fa fa-star"></i></li>
                                                                    <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                                                </ul>
                                                            </div>
                                                            <div class="pro-price">
                                                                <span class="price-text">Price:</span>
                                                                <span class="normal-price">150.00</span>
                                                                <span class="old-price"><del>$200.00</del></span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="shop-article text-left">
                                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis laboriosam hic omnis, blanditiis nihil aliquam, dolores maxime eum et quidem ducimus nostrum adipisci culpa, delectus numquam repellendus minima deserunt iste similique nesciunt. Accusantium ipsam sed deleniti culpa necessitatibus optio sit fuga quis cumque itaque odit nihil non, officia, et sapiente.</p>
                                                    </div>
                                                    <div class="shop-button-area">
                                                        <div class="add-to-cartbest shop">
                                                            <a href="#" title="add to cart">
                                                                <div><span>Add to cart</span></div>
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="add-to-link shop">
                                                        <a href="#">
                                                            <div><i class="fa fa-heart"></i><span>Add to Wishlist</span></div>
                                                        </a>
                                                        <a href="#">
                                                            <div><i class="fa fa-random"></i><span>Add to compare</span></div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- single-product-end -->
                                        </div>
                                    </div>
                                    <!-- end-Single-Shop-list-->
                                    <!-- start-Single-Shop-list-->

                                    <!-- end-Single-Shop-list-->
                                    <!-- start-Single-Shop-list-->
                                    <!-- end-Single-Shop-list-->
                                    <!-- start-Single-Shop-list-->
                                    <!-- end-Single-Shop-list-->
                                    <!-- start-Single-Shop-list-->
                                    <!-- end-Single-Shop-list-->
                                </div>
                                <!-- End Shop List -->
                            </div>
                            <!-- End Tab Content -->
                            <!-- Tab Bar -->
                            <div class="tab-bar tab-bar-bottom">
                                <div class="toolbar">
                                    <div class="sorter">
                                        <div class="sort-by">
                                            <label class="sort-none">Sort By</label>
                                            <select>
                                                <option value="position">Position</option>
                                                <option value="name">Name</option>
                                                <option value="price">Price</option>
                                            </select>
                                            <a class="up-arrow" href="#"><i class="fa fa-long-arrow-up"></i></a>
                                        </div>
                                    </div>
                                    <div class="pages">
                                        {{ $latest->links('frontend.pagination.custom') }}
                                    </div>
                                </div>
                            </div>
                            <!-- End Tab Bar -->
                        </div>
                        <!-- End Shop Product Tab Area -->
                    </div>
                    <!-- End Shop Product View -->
                </div>
            </div>
        </div>
    </div>
    <!--shop-product-area-end-->
    <!--Start-newsletter-wrap-->

@endsection
