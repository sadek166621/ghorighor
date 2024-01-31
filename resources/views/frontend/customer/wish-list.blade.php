@extends("frontend.master")
@section('title')
    WishList
    @endsection
@section('content')
    <div class="signle-heading">
        <div class="container">
            <div class="row">
                <!--start-shop-head -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-head-menu">
                        <ul>
                            <li><i class="fa fa-home"></i><a class="shop-home" href="index.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                            <li class="shop-pro">Wishlist</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <!-- wishlist-area start -->
    <div class="wishlist-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="wishlist-content">

                            <div class="wishlist-table table-responsive">
                                <table>
                                    <thead>
                                    <tr>
                                        <th class="product-remove"><span class="nobr">Remove</span></th>
                                        <th class="product-thumbnail">Image</th>
                                        <th class="product-name"><span class="nobr">Product Name</span></th>
                                        <th class="product-price"><span class="nobr"> Unit Price </span></th>
                                        <th class="product-stock-stauts"><span class="nobr"> Stock Status </span></th>
                                        <th class="product-add-to-cart"><span class="nobr">add-to-cart </span></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($products as $product)
                                    <tr>
                                        <td class="product-remove"><a href="{{ route('wish-list-remove',['id'=>$product->id]) }}">×</a></td>
                                        <td class="product-thumbnail"><a href="#"><img src="{{ asset($product->main_image) }}" alt="" /></a></td>
                                        <td class="product-name"><a href="#">{{$product->product_name}}</a></td>
                                        <td class="product-price"><span class="amount">৳{{$product->product_price }}</span></td>
                                        <td class="product-stock-status"><span class="wishlist-in-stock">In Stock</span></td>
                                        <td class="product-add-to-cart">
                                        <form  action="{{ route('cart-add') }}" method="post">
                                            @csrf
                                            <input type="hidden" value="{{ $product->product_id }}" name="Product_id">
                                            <button type="submit" style="border: none;background: none"> <a style="font-size: 21px;"> Add to Cart</a></button>
                                        </form>
                                        </td>
                                    </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- wishlist-area end -->
    <!-- start-wishlist-area-->
    <div class="wishlist-share-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                </div>
            </div>
        </div>
    </div>
    <!-- end-wishlist-area-->
    @endsection
