<!doctype html>
<html lang="en" class="fixed left-sidebar-top">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>|| Ecommerce || @yield('title')</title>
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('admin') }}/favicon/apple-icon-120x120.png">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('admin') }}/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('admin') }}/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('admin') }}/favicon/favicon-16x16.png">
    <!--load progress bar-->
    <script src="{{ asset('admin') }}/vendor/pace/pace.min.js"></script>
    <link href="{{ asset('admin') }}/vendor/pace/pace-theme-minimal.css" rel="stylesheet" />

    <!--Select with searching & tagging-->
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/css/bootstrap-select.min.css">
    <!-- Select2 -->
    <link href="{{ asset('admin') }}/plugins/select2/select2.min.css" rel="stylesheet" type="text/css" />

    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('admin') }}/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="{{ asset('admin') }}/vendor/animate.css/animate.css">
    <!--SECTION css-->

    <!-- ========================================================= -->
    <!--Notification msj-->
{{--    <link rel="stylesheet" href="{{ asset('admin') }}/vendor/toastr/toastr.min.css">--}}
    <!--Magnific popup-->
    <link rel="stylesheet" href="{{ asset('admin') }}/vendor/magnific-popup/magnific-popup.css">
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="{{ asset('admin') }}/stylesheets/css/style.css">

    <link rel="stylesheet" href="{{ asset('admin') }}/fancy-file-uploader/fancy_fileupload.css">
    <style>
        @yield('style')
    </style>
</head>

<body>
<div class="">
    <!-- page HEADER -->
@include('admin.include.headar')
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body">
        <!-- LEFT SIDEBAR -->
    @include('admin.include.left-sidebar')
        <!-- CONTENT -->
        <!-- ========================================================= -->
        <div class="content">

            @yield('content')

        </div>
        <!-- RIGHT SIDEBAR -->
    @include('admin.include.right-sidebar')
        <!--scroll to top-->
        <a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="{{ asset('admin') }}/vendor/jquery/jquery-1.12.3.min.js"></script>
<script>
    $(document).ready(function(){
        $(".open").click(function(){
            $(".persent").show(500);
            $(".dis_pri").show(500);
            $(".fixed-dis").hide(500);
        });
        $(".fix").click(function(){
            $(".persent").hide(500);
            $(".fixed-dis").show(500);
            $(".dis_pri").show(500);
        });
    });
</script>
<script>
    $(document).ready(function(){
        $("#WithPower").click(function(){
            // alert('ok');
            $(".status").show(500);
            $(".status2").hide(500);
        });
        $("#WithOutPower").click(function(){
            // alert('ok');
            $(".status2").show(500);
            $(".status").hide(500);
        });
    });
</script>

<script>
    $(document).ready(function(){
        $(".open2").click(function(){
            var button_id = $(this).val();
            $(".price2").show(500);
            // alert('#price2'+button_id+'');
            // $('#price2'+button_id+'').show(500);
        });
    });
</script>

<script>
    /**
     * Check all the permissions
     */
    $("#checkPermissionAll").click(function(){
        if($(this).is(':checked')){
            // check all the checkbox
            $('input[type=checkbox]').prop('checked', true);
        }else{
            // un check all the checkbox
            $('input[type=checkbox]').prop('checked', false);
        }
    });
    function checkPermissionByGroup(className, checkThis){
        const groupIdName = $("#"+checkThis.id);
        const classCheckBox = $('.'+className+' input');
        if(groupIdName.is(':checked')){
            classCheckBox.prop('checked', true);
        }else{
            classCheckBox.prop('checked', false);
        }
    }
</script>
<script>
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
<script src="{{ asset('admin') }}/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="{{ asset('admin') }}/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="{{ asset('admin') }}/javascripts/template-script.min.js"></script>
<script src="{{ asset('admin') }}/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!--dataTable-->
<script src="{{ asset('admin') }}/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
<script src="{{ asset('admin') }}/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<script src="{{ asset('admin') }}/javascripts/examples/tables/data-tables.js"></script>
<script src="{{ asset('admin') }}/javascripts/examples/forms/advanced.js"></script>
<!-- ========================================================= -->
<!--Notification msj-->
{{--<script src="{{ asset('admin') }}/vendor/toastr/toastr.min.js"></script>--}}
<!--morris chart-->
<script src="{{ asset('admin') }}/vendor/chart-js/chart.min.js"></script>
<!--Gallery with Magnific popup-->
<script src="{{ asset('admin') }}/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!--Examples-->
<script src="{{ asset('admin') }}/plugins/select2/select2.full.min.js" type="text/javascript"></script>
<script>
    $(".select2").select2();
</script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap-select@1.13.14/dist/js/bootstrap-select.min.js"></script>
<script>
    $('.my-select').selectpicker();
</script>
<script src="{{ asset('admin') }}/fancy-file-uploader/jquery.ui.widget.js"></script>
<script src="{{ asset('admin') }}/fancy-file-uploader/jquery.iframe-transport.js"></script>
<script src="{{ asset('admin') }}/fancy-file-uploader/jquery.fileupload.js"></script>
<script src="{{ asset('admin') }}/fancy-file-uploader/jquery.fancy-fileupload.js"></script>
<script>
    $('#demo').FancyFileUpload({
        params : {
            action : 'fileuploader'
        },
        'fileupload' : {
            uploadMode: 'single',
        },
        maxfilesize : 10000000,
        singleFileUploads :1
    });
</script>



<script src="{{ asset('admin') }}/javascripts/examples/dashboard.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>

<script>
    $('.summernote').summernote({
        placeholder: 'Write here description ',
        tabsize: 2,
        height: 200,
    });
</script>
<script>
    function updateCounter() {
        fetch('https://api.countapi.xyz/update/ecommerce/abc/?amount=1')
            .then(res => res.json())
            .then(data => counterElement.innerHTML = data.value)
    }
    updateCounter()
    counterElement = document.getElementsByClassName('count')[0];
</script>

<script>
    function discount_price() {
        var price=document.getElementById('price').value;
        var product_discount_amount=document.getElementById('product_discount_amount').value;
        document.getElementById('product_discount_price').value=price-product_discount_amount;
        if(product_discount_amount === ''){
            document.getElementById('product_discount_price').value='';
        }
    }
</script>
<script>
    function discount_Percentage() {
        var price=document.getElementById('price').value;
        var percentage=document.getElementById('percentage').value;
        document.getElementById('product_discount_price').value=price-price*percentage/100;
        if(product_discount_amount === ''){
            document.getElementById('product_discount_price').value='';
        }
    }
</script>

</body>

</html>
