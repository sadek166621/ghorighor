<!doctype html>
<html class="no-js" lang="en">

<head>
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
<!--[if lt IE 8]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->
<!-- Add your site or application content here -->
<!--Start-Preloader-area-->
<!--<div class="preloader">
            <div class="loading-center">
                <div class="loading-center-absolute">
                    <div class="object object_one"></div>
                    <div class="object object_two"></div>
                    <div class="object object_three"></div>
                </div>
            </div>
        </div>-->
<!--end-Preloader-area-->
<!--header-area-start-->
<!--Start-main-wrapper-->
    <!--Start-Header-area-->
<div class="page-1">
@include("frontend.include.header")
<!--End-Header-area-->
    <!-- Start-slider-->
   @yield('content')
    <!--End-newsletter-wrap-->
    <!--Start-footer-wrap-->
@include("frontend.include.footer")
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
<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js" type="text/javascript"></script>
<script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
<script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

{!! Toastr::message() !!}

<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(function () {
       $("#ajaxxdata").on("submit",function (e) {
           e.preventDefault();
        //    var form = $(this);
        //    var url = form.attr('action');
        //    var type = form.attr('method');
        //    var data = form.serialize();

        //    $.ajax({
        //        url:/cart-add,
        //        data:data,
        //        type:type,
        //        datatype: "json",
        //         success: function (data) {
        //             alert(data);
        //         },
        //    });
       });
    });
</script>
https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js
    <script>
    $(document).ready(function){
        $('#addcarts').on('click',function(){
            var id = $(this).data('id');
            alert(id)
            
        });
    };
    </script>

    <Script>
    $(document).on('submit', '#add-to-cart-form', function (e) {
    e.preventDefault();
    // alert('hello world');
    var form = $(this);

    $.ajax({
        url: form.attr('action'),
        type: 'POST',
        data: form.serialize(),
        success: function (response) {
            // Handle success response
        },
        error: function (xhr) {
            // Handle error response
        }
    });

});
    </Script>
    <script>
    $.ajax({
    type: 'GET',
    url: '{{ route("/") }}',
    success: function(response) {
        // Update the cart contents in the view
        $('#cart-show-value').html(response);
    }
});
    </script>
</body>

</html>
