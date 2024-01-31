<footer class="footer-area">
    <div class="footer-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3 col-sm-5 col-xs-12">
                    <div class="footer-logo">
                        <a href="index.html"><img src="{{asset('frontend')}}/images/logo/1.png" alt="Logo Demo"></a>
                    </div>
                    <!--footer-text-start-->
                    <div class="footer-top-content">
                        <p class="des">Think about a scenario where on an occasion or on a life event, you want to surprise your loved ones or want to use personally, ”GhoriGhor” website has the best solution. We keep up with the modern trend, fashion & style with premium brand products.</p>
                    </div>
                    <!--footer-text-end-->
                    <!--footer-link-area-start-->
                    <div class="social-icon">
                        <h4>FOLLOW US ON</h4>
                        <a class="faceb" href="#" title="Facebook"><i class="fa fa-facebook"></i></a>
                        <a class="twitt" href="#" title="Twitter" ><i class="fa fa-twitter"></i></a>
                        <a class="tumb" href="#" title="Tumblr"><i class="fa fa-tumblr"></i></a>
                        <a class="google" href="#" title="Google-plus"><i class="fa fa-google-plus"></i></a>
                        <a class="dribb" href="#" title="Dribbble"><i class="fa fa-dribbble"></i></a>
                    </div>
                    <!--footer-link-area-end-->
                </div>
                <!--footer-tag-area-start-->
                <div class="tag-area">
                    <div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">
                        <h3 class="wedget-title">Related Tags</h3>
                        <div class="footer-top-content">
                            <ul>
                                @foreach($categories as $category)
                                <li><a href="{{url('our-product',['id'=>$category->id])}}">{{$category->category_name}}</a></li>
                                    @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <!--footer-tag-area-end-->
                <!--footer-account-area-start-->
                <div class="footer-account-area footer-none">
                    <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                        <h3 class="wedget-title">My account</h3>
                        <div class="footer-top-content">
                            <ul>
                                <li><a href="{{route('customer-login')}}">Login</a></li>
                                <li><a href="#">My Cart</a></li>
                                <li><a href="{{route('wish-list')}}">Wishlist</a></li>
                                <li><a href="#">Safe shopping</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                                <li><a href="#">Advanced Search</a></li>
                                <li><a href="{{route('contact-us')}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!--footer-account-area-end-->
                <!--footer-contact-info-start-->
                <div class="footer-contact-info">
                    <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                        <h3 class="wedget-title">Contact Us</h3>
                        <div class="footer-contact">
                            <p class="adress"><label>Office:</label><span class="ft-content">Razzak Plaza, 1 New Eskaton Road, Moghbazar More, Dhaka-1217</span></p>
                            <p class="phone"><label>phone:</label><span class="ft-content phone-num"><span class="phone1">+8801784909595</span></span></p>
                            <p class="web"><label>email:</label><span class="ft-content web-site"><a href="mailto:admin@infinitelayout.com">info@ghorighor.com</a></span></p>
                        </div>
                    </div>
                </div>
                <!--footer-contact-info-end-->
            </div>
        </div>
    </div>
    <!--footer-top-area-end-->
    <!--footer-bottom-area-start-->
    <div class="footer-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="copy-right">
                        <span> Copyright &copy; <a href="http://ghorighor.com/">GhoriGhor</a>| All Rights Reserved | Developed By </span>
                        <span><a href="">Abu Sadek Chowdhury</a>
                    </div>
                </div>
{{--                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">--}}
{{--                    <div class="payment-area">--}}
{{--                        <ul>--}}
{{--                            <li><a title="Paypal" href="#"><img src="{{asset('frontend')}}/images/payment/1.png" alt="Paypal"></a></li>--}}
{{--                            <li><a title="Visa" href="#"><img src="{{asset('frontend')}}/images/payment/2.png" alt="Visa"></a></li>--}}
{{--                            <li><a title="Bank" href="#"><img src="{{asset('frontend')}}/images/payment/3.png" alt="Bank"></a></li>--}}
{{--                            <li class="hidden-xs"><a title="Mastercard" href="#"><img src="{{asset('frontend')}}/images/payment/4.png" alt="Mastercard"></a></li>--}}
{{--                            <li><a title="Discover" href="#"><img src="{{asset('frontend')}}/images/payment/5.png" alt="Discover"></a></li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
    <!--footer-bottom-area-end-->
</footer>
<!--End-footer-wrap-->

<!--End-main-wrapper-->
<!--strat-Quickview-product -->
<div id="quickview-wrapper">
    <!-- Modal -->
    <div class="modal fade" id="productModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <!-- modal-content-start-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
                <div class="modal-body">
                    <div class="modal-product">
                    <!-- product-{{asset('frontend')}}/images -->
                        <div class="product-{{asset('frontend')}}/images">
                            <div class="main-image {{asset('frontend')}}/images">
                                <img alt="" src="{{asset('frontend')}}/images/single-p/m1.jpg">
                            </div>
                        </div>
                    <!-- product-{{asset('frontend')}}/images -->
                        <!-- product-info -->
                        <div class="product-info">
                            <h1>Sample Product</h1>
                            <div class="price-box-3">
                                <div class="s-price-box">
                                    <span class="normal-price">£333.00</span>
                                </div>
                            </div>
                            <a href="shop-grid.html" class="see-all">See all features</a>
                            <div class="quick-add-to-cart">
                                <form method="post" class="cart">
                                    <div class="numbers-row">
                                        <input type="number" id="french-hens" value="3">
                                    </div>
                                    <button class="single_add_to_cart_button" type="submit">Add to cart</button>
                                </form>
                            </div>
                            <div class="quick-desc">
                                Think about a scenario where on an occasion or on a life event, you want to surprise your loved ones or want to use personally,”watch point”website has the best solution. We keep up with the modern trend, fashion & style with premium brand products.
                            </div>
                            <div class="social-sharing">
                                <div class="widget widget_socialsharing_widget">
                                    <h3 class="widget-title-modal">Share this product</h3>
                                    <ul class="social-icons">
                                        <li><a target="_blank" title="Facebook" href="#" class="facebook social-icon"><i class="fa fa-facebook"></i></a></li>
                                        <li><a target="_blank" title="Twitter" href="#" class="twitter social-icon"><i class="fa fa-twitter"></i></a></li>
                                        <li><a target="_blank" title="Pinterest" href="#" class="pinterest social-icon"><i class="fa fa-pinterest"></i></a></li>
                                        <li><a target="_blank" title="Google +" href="#" class="gplus social-icon"><i class="fa fa-google-plus"></i></a></li>
                                        <li><a target="_blank" title="LinkedIn" href="#" class="linkedin social-icon"><i class="fa fa-linkedin"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!-- product-info -->
                    </div>
                    <!-- modal-product -->
                </div>
                <!-- modal-body -->
            </div>
            <!-- modal-content -->
        </div>
        <!-- modal-dialog -->
    </div>
    <!-- END Modal -->
</div>
<!-- End-quickview-product -->
<!--Start-Newsletter-Popup-->

