
<!doctype html>
<html class="no-js" lang="en">

<head>
    <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'../../../www.googletagmanager.com/gtm5445.html?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-K73K8NJ');</script>
<!-- End Google Tag Manager -->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Products Details
</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('new')}}/img/sunglass.png">
    <!-- CSS========================= -->
    <link href="../../../cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="{{asset('new')}}/css/plugins.css">
    <link rel="stylesheet" href="{{asset('new')}}/zoom/xzoom.min.css">

    <!-- Main Style CSS -->
    <link rel="stylesheet" href="{{asset('new')}}/css/style.css">
        <style>
            </style>
    
<meta name="facebook-domain-verification" content="coy69ql2em2vjywbxtw2z4lo96eqf9" />
<meta name="_token" content="{!! csrf_token() !!}" />
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>@yield('title')</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,400i,500,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,500,600,700,800i" rel="stylesheet">

    <!-- favicon icon -->
    <link rel="shortcut icon" type="images/png" href="{{asset('frontend')}}/images/favicon.ico">

    <!-- all css here -->
    <link rel="stylesheet" href="{{asset('frontend')}}/style.css">
    <!-- modernizr css -->
    <script src="{{asset('frontend')}}/js/vendor/modernizr-2.8.3.min.js"></script>
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    
</head>


<body>
    


</div>
@include("frontend.include.header")



                    <!--breadcrumbs area start-->
<div class="breadcrumbs_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb_content">
                    <h3>    Products Details
</h3>
                    <ul>
                        <li><a href="../../index.html">home</a></li>
                        <li>></li>
                        <li>    Products Details
</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!--breadcrumbs area end-->

    <!--product details start-->
    <div class="product_details">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product-details-tab">
                        <div id="img-1" class="zoom1 single-zoom">
                            <a href="#">
                                <img id="zoom1" src="{{asset($details->main_image)}}" xoriginal="{{asset($details->main_image)}}" alt="big-1" class="c-img-de">
                            </a>
                        </div>
                        <div class="single-zoom-thumb">
                        
                            <ul class="s-tab-zoom owl-carousel single-product-active" id="gallery_01">
                            @foreach($product_images as $product_image)
                                <li>
                                    <a href="#" class="elevatezoom-gallery active" data-update="" data-image="{{asset($product_image->sub_image)}}" data-zoom-image="{{asset($product_image->sub_image)}}">
                                        <img src="{{asset($product_image->sub_image)}}" alt="zo-th-1" style="height: 80px"/>
                                    </a>
                                </li>
                                @endforeach

                           </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product_d_right">
                        <form action="{{ route('cart-add') }}" method="post" enctype="multipart/form-data">
                        @csrf                            
                        <h1>{{ $details->product_name }}</h1>
                        <input type="hidden" value="{{ $details->id }}" name="Product_id">                            <div class="product_price">
                                                                    <del class="old_price">৳ {{$details->product_price}} </del>&nbsp;&nbsp;
                                    <span class="current_price">৳ {{$details->discount_product_price}}</span>
                                                            </div>



                            <div class="action_links">
                                <ul>



                                    <li><a href="#" title="Stock info" style="width: 85px">Stock In</a></li>
                                </ul>
                                <br>
                                Stock Quantity:
                                    <span class="signle-stock">{{$details->product_stock}}</span>
                            </div>
                            <br>
                            <div class="product_meta">
                            <div class=''><iframe width="272" height="150" src="{{$details->link}}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe></div>
                            </div>
                            
                            <br>
                            <div class="product_variant quantity">
                                <label>quantity</label>
                                <input min="1" max="100" value="1" type="number">
                                <button class="button " type="submit">add to cart</button>
                            </div>
                        
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--product details end-->
    

    <!--product info start-->
    <div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<div class="product-description-tab custom-tab">
								<!-- tab bar -->
								<ul class="nav nav-tabs" role="tablist">
									<li class="active"><a href="#product-des" data-toggle="tab">Product Description</a></li>
								</ul>
								<!-- Tab Content -->
								<div class="tab-content">
									<div class="tab-pane active" id="product-des">
										<p>{!! $details->description !!}</p>
									</div>
									<div class="tab-pane" id="product-rev">
										<div class="row">
											<div class="col-lg-6 col-md-6 col-sm-5 col-xs-12">
												<div class="product-rev-left">
													<p class="product-action">
														<a href="http://infinitelayout.com/">OurStore</a> <b>Review by</b> <span>OurStore</span>
													</p>
													<div class="product-ratting">
														<table class="">
															<tr>
																<td>Quality</td>
																<td class="quality-single-p">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                                                    </ul>
																</td>
															</tr>
															<tr>
																<td>Price</td>
																<td class="quality-single-p">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                                                    </ul>
																</td>
															</tr>
															<tr>
																<td>Value</td>
																<td class="quality-single-p">
                                                                    <ul>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li><i class="fa fa-star"></i></li>
                                                                        <li class="r-grey"><i class="fa fa-star-half-o"></i></li>
                                                                    </ul>
																</td>
															</tr>
														</table>
													</div>
													<p>OurStore<span class="posted">(Posted on 20/07/2017)</span></p>
												</div>
											</div>
											<div class="col-lg-6 col-md-6 col-sm-7 col-xs-12">
												<div class="product-rev-right">
													<h3>You're reviewing: Proin lectus ipsum</h3>
													<h3><b>How do you rate this product? <span>*</span></b></h3>
													<div class="product-rev-right-table table-responsive">
														<table>
															<thead>
																<tr class="first last">
																	<th>&nbsp;</th>
																	<th><span class="nobr">1 star</span></th>
																	<th><span class="nobr">2 stars</span></th>
																	<th><span class="nobr">3 stars</span></th>
																	<th><span class="nobr">4 stars</span></th>
																	<th><span class="nobr">5 stars</span></th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<th>Quality</th>
																	<th><input type="radio" class="radio" name="ratings[1]"></th>
																	<th><input type="radio" class="radio" name="ratings[1]"></th>
																	<th><input type="radio" class="radio" name="ratings[1]"></th>
																	<th><input type="radio" class="radio" name="ratings[1]"></th>
																	<th><input type="radio" class="radio" name="ratings[1]"></th>
																</tr>
																<tr>
																	<th>Price</th>
																	<th><input type="radio" class="radio" name="ratings[2]"></th>
																	<th><input type="radio" class="radio" name="ratings[2]"></th>
																	<th><input type="radio" class="radio" name="ratings[2]"></th>
																	<th><input type="radio" class="radio" name="ratings[2]"></th>
																	<th><input type="radio" class="radio" name="ratings[2]"></th>
																</tr>
																<tr>
																	<th>Value</th>
																	<th><input type="radio" class="radio" name="ratings[3]"></th>
																	<th><input type="radio" class="radio" name="ratings[3]"></th>
																	<th><input type="radio" class="radio" name="ratings[3]"></th>
																	<th><input type="radio" class="radio" name="ratings[3]"></th>
																	<th><input type="radio" class="radio" name="ratings[3]"></th>
																</tr>
															</tbody>
														</table>
													</div>
													<div class="porduct-rev-right-form">
														<form action="#" class="form-horizontal product-form">
															<div class="form-goroup">
																<label>Nickname <sup>*</sup></label>
																<input type="text" class="form-control" required="required">
															</div>
															<div class="form-goroup">
																<label>Summary of Your Review <sup>*</sup></label>
																<input type="text" class="form-control" required="required">
															</div>
															<div class="form-goroup">
																<label>Review <sup>*</sup></label>
																<textarea class="form-control" rows="5" required="required"></textarea>
															</div>
															<div class="form-goroup form-group-button">
																<button class="btn custom-button" value="submit">Submit Review</button>
															</div>
														</form>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="product-tag">
										<h2>Other people marked this product with these tags:</h2>
										<p class="product-action">
											<a href="http://bootexperts.com/">Laptop </a> <span>(1)</span>
										</p>
										<form action="#" class="product-form">
											<label>Add Your Tags:</label>
											<input type="text" class="form-control" required="required">
											<button class="btn custom-button" value="submit">Add Tags</button>
										</form>
										<p>Use spaces to separate tags. Use single quotes (') for phrases.</p>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
    <!--product info end-->

    <!--product section area start-->
    <div class="featured-product-wrap padding-t padding-dis">
        <div class="container">
            <!-- section-heading start -->
            <div class="section-heading">
                <h3><span class="h-color">Related</span> Products</h3>
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
                                        @foreach($related as $category)
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
    <!--product section area end-->
    <hr>
<!--Newsletter area start-->
<div class="newsletter_area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="newsletter_content">
                    <h2>Our Newsletter</h2>
                    <p>Get E-mail updates about our latest shop and special offers.</p>
                    <div class="subscribe_form">
                        <form action="" method="">
                            <input type="hidden" name="_token" value="thbExbcl369G3RD7FV6NbaEkIDle9QjoZ8vfIDm0">                            <input type="hidden" name="name" value="text">
                            <input type="hidden" name="subject" value="text">
                            <input  type="email" name="email" placeholder="Email address..." required/>
                            <input type="hidden" name="message" value="text">
                            <button type="submit">Subscribe</button>
                        </form>
                        <!-- mailchimp-alerts Start -->
                        <div class="mailchimp-alerts text-centre">
                            <div class="mailchimp-submitting"></div><!-- mailchimp-submitting end -->
                            <div class="mailchimp-success"></div><!-- mailchimp-success end -->
                            <div class="mailchimp-error"></div><!-- mailchimp-error end -->
                        </div><!-- mailchimp-alerts end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

</div>
<!--End-Newsletter-Popup-->


    <!-- all js here -->
    <!-- jquery latest version -->
    <script src="{{asset('frontend')}}/js/vendor/jquery-1.12.0.min.js"></script>
    <!-- bootstrap js -->
    <script src="{{asset('frontend')}}/js/bootstrap.min.js"></script>
    <!-- owl.carousel js -->
    <script src="{{asset('frontend')}}/js/owl.carousel.min.js"></script>
    <!-- meanmenu.js -->
    <script src="{{asset('frontend')}}/js/jquery.meanmenu.js"></script>
    <!-- nivo.slider.js -->
    <script src="{{asset('frontend')}}/lib/js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script src="{{asset('frontend')}}/lib/home.js" type="text/javascript"></script>
    <!-- jquery-ui js -->
    <script src="{{asset('frontend')}}/js/jquery-ui.min.js"></script>
    <!-- scrollUp.min.js -->
    <script src="{{asset('frontend')}}/js/jquery.scrollUp.min.js"></script>
    <!-- jquery.parallax.js -->
    <script src="{{asset('frontend')}}/js/jquery.parallax.js"></script>
    <!-- sticky.js -->
    <script src="{{asset('frontend')}}/js/jquery.sticky.js"></script>
    <!-- jquery.simpleGallery.min.js -->
    <script src="{{asset('frontend')}}/js/jquery.simpleGallery.min.js"></script>
    <script src="{{asset('frontend')}}/js/jquery.simpleLens.min.js"></script>
    <!-- countdown.min.js -->
    <script src="{{asset('frontend')}}/js/jquery.countdown.min.js"></script>
    <!-- wow js -->
    <script src="{{asset('frontend')}}/js/wow.min.js"></script>
    <!-- plugins js -->
    <script src="{{asset('frontend')}}/js/plugins.js"></script>
    <!-- main js -->
    <script src="{{asset('frontend')}}/js/main.js"></script>
<script>
    const thumbs=document.querySelector(".thumb-img").children;

    function changeImage(event){
        document.querySelector(".pro-img").src=event.children[0].src

        for(let i=0; i<thumbs.length;i++){
            thumbs[i].classList.remove("active");
        }
        event.classList.add("active");
    }
</script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
{!! Toastr::message() !!}
<!-- JS
============================================ -->
<!-- Plugins JS -->
<script src="{{asset('new')}}/js/plugins.js"></script>
<script  src="{{asset('new')}}/zoom/xzoom.min.js"></script>
<script>
    $(".xzoom").xzoom();
</script>
<!-- Main JS -->
<script src="{{asset('new')}}/js/main.js"></script>
<script src="{{asset('new')}}/js/multi-countdown.js"></script>
<script>
    $('.hero_count').attr('data-date');
</script>
<script>
    $(document).ready(function(){
        $(".abc").click(function(){
            $('.abcd').toggle(500);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".search").click(function(){
            $(".div").addClass('div2');
            // $(".div").css({"display": "block","transition":"3s"});
        });
    });
</script>
<script>
    $(document).ready(function(){
        $(".open").click(function(){
            $(".lens").show(500);
            $('.lens-type2').hide(500)
        });
        $(".close").click(function(){
            $(".lens").hide(500);
        });
    });
</script>













<script>
    // $( window ).on( "load", function() {
    //     var a =$("#cart_a").val();
    //     var b =$("#srate").val();
    //     alert(b);
    //
    //
    // });
    // $(document).ready(function(){
    //     $("#cart_a").click(function(){
    //         $(".lens").show(500);
    //         $('.lens-type2').hide(500)
    //     });
    //     $(".close").click(function(){
    //         $(".lens").hide(500);
    //     });
    // });
</script>
<script>
    $(document).ready(function(){
        $("#select").change(function(){
            var selectedVal = $("#select option:selected").val();
            if(selectedVal == 'Without Power'){
                $('.lens-type').hide(500)
                $('.lens-type2').show(500)
            }
            if(selectedVal == 'With Power'){
                $('.lens-type').show(500)
                $('.lens-type2').hide(500)
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('select[name="lens_type"]').on('change',function (){
            var lens_type=$(this).val();
            if(lens_type){
                $.ajax({
                    url:"http://sunglasshut.com.bd/select-lens/"+lens_type,
                    type:"GET",
                    dataType:"json",
                    success:function (data) {
                        $("#lensPrice").empty();
                        $.each(data,function (key,value) {
                            // alert(value.id);
                            $("#lensPrice").append('<option value="'+value.lens_price+'">'+value.lens_price+'</option>');
                            $("#desc").empty();
                            $("#desc").append('<div>'+value.description+'</div>');
                        })
                    }
                });
            }else{
                alert('danger');
            }
        });
    });
</script>
<script>
    $(document).ready(function(){
        $('select[name="area"]').on('change',function (){
            var area=$(this).val();
            // alert(area);
            if(area){
                $.ajax({
                    url:"http://sunglasshut.com.bd/select-area/"+area,
                    type:"GET",
                    dataType:"json",
                    success:function (data) {
                        // alert(data)
                        // $("#rate").text(data.rate);
                        $("#rate").empty();
                        $.each(data,function (key,value) {
                            // alert(value.id);
                            $("#rate").append('<span style="position: relative;left: 36px;height: 30px;">৳</span><input id="srate" style="width: 100px;border: none;height: 30px;padding-left: 40px" name="rate" value="'+value.rate+'">');
                            // $("#rate").text(data.rate);
                            var b =Number(value.rate);
                            var a =Number($(".cart_a").val());
                            var c = a+b;
                            // alert(c);
                            $("#abd").text(c);
                            $("#tt").val(c);
                        })
                    }
                });
            }else{
                alert('danger');
            }
        });
    });
</script>

<script>
    $(document).ready(function(){
        $('select[name="division"]').on('change',function (){
            var division=$(this).val();
            // alert(division);
            if(division){
                $.ajax({
                    url:"http://sunglasshut.com.bd/select-division/"+division,
                    type:"GET",
                    dataType:"json",
                    success:function (data) {
                        // alert(data)
                        // $("#rate").text(data.rate);
                        $(".area").empty();
                        $(".area").append('<option>Please select A Shipping Area</option>');
                        $.each(data,function (key,value) {
                            $(".area").append('<option value="'+value.state+'">'+value.state+'</option>');
                        })
                    }
                });
            }else{
                alert('danger');
            }
        });
    });
</script>

<script>
    $('.details').click(function () {
        var productId = $(this).attr('id');
        // alert(productId);
        $.ajax({
            method:"GET",
            url:'api/details/'+productId,
            dataType:'JSON',
            success:function (data) {
                // alert(data);
                // alert(data.product_name);
                $('.product_id').val(data.id);
                $('#product_name').text(data.product_name);
                $('#discount_product_amount').text(data.discount_product_amount +'% Off');
                $('#description').html(data.short_description);
                $('#product_code').text(data.product_code);
                $('#product_stock').text(data.product_stock);
                $('#product_made_by').text(data.product_made_by);
                if (data.discount_product_price !=null || data.discount_product_price > 0){
                    $('.discount_product_price').html('৳'+data.discount_product_price).addClass("new_price");
                    $('.product_price').html('৳'+data.product_price).addClass("old_price");
                } else {
                    $('.discount_product_price').html('৳'+data.product_price).addClass("new_price");
                    $('.product_price').text('');

                }

                if (data.main_image !=null){
                    // alert(data.main_image);
                    $('.main_image').attr('src',data.main_image);
                    $('.main_image').attr('data-lens-image',data.main_image);
                } else {
                    $('.main_image').attr('src','../../../www.hgs.at/img/contact/ce.jpg')
                }

            }
        });
        $('#modal_box').modal('show');
        return false;

    });
</script>
<script>
    $(".form").on('submit', function(){
        $('#mymodal').show();
    })
</script>



<script src="../../../cdn.jsdelivr.net/npm/select2%404.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
</script>
</body>

</html>
