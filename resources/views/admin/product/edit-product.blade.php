@extends('admin.master')
@section('title')
    Category
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Edit-Product</a></li>
                <li><a>Page</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <div>
                                        @foreach ($errors->all() as $error)
                                            <p>{{ $error }}</p>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                            <h3 class=" text-bold text-center text-success">{{session('message')}}</h3>
                            <h3 class="text-center text-italic">Edit Products Form</h3>
                            <form name="editProductForm" action="{{ route('update-product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" class="form-control" onchange="selectSubCategory(this.value); ">
                                            <option value="">--- Select Category Name ---</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="sub_category_name">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Sub Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="sub_category_id" id="sub_category_id" class="form-control">
                                            <option value="">Select sub Category</option>
                                            @foreach($subCategories as $subCategory)
                                                <option value="{{ $subCategory->id}}">{{$subCategory->sub_category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Brand Name</label>
                                    <div class="col-sm-10">
                                        <select name="brand_id" id="brand_id" class="form-control">
                                            <option value="">Select Brand</option>
                                            @foreach($brands as $brand)
                                                <option value="{{ $brand->id}}">{{ $brand->brand_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Supplier Name</label>
                                    <div class="col-sm-10">
                                        <select name="supplier_id" id="supplier_id" class="form-control">
                                            <option value="">--Select Supplier--</option>
                                            @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id}}">{{ $supplier->supplier_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_name }}" name="product_name" id="product_name">
                                        <input type="hidden" value="{{ $productById->id }}" name="product_id" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_code }}" name="product_code" id="product_code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"  class="col-sm-2 control-label text-center">Product Regular Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $productById->product_price }}" name="product_price" class="form-control" id="price" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"  class="col-sm-2 control-label text-center">Discount Percentage</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="0" onkeyup="discount_price();" name="discount_product_amount" class="form-control" id="product_discount_amount" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"  class="col-sm-2 control-label text-center">Discount Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $productById->discount_product_price }}" name="discount_product_price" class="form-control" id="product_discount_price" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Quantity/Size</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_quantity }}" name="product_quantity" id="product_quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Cost</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_cost }}" name="product_cost" id="product_cost">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Stock</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_stock }}" name="product_stock" id="product_stock">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Color</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_color }}" name="product_color" id="product_color">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Made By</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{ $productById->product_made_by }}" name="product_made_by" id="product_made_by">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Youtube Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="{{ $productById->link }}"  class="form-control" name="link" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="6" name="description" placeholder="" id="">{{ $productById->description }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Main Image</label>
                                    <div class="col-sm-10">
                                        {{--                                        <input type="file" name="main_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" accept="image/*">--}}
                                        {{--                                        <img id="blah" alt="product main image" width="100" height="100" />--}}
                                        <input type="file" name="main_image" accept="image/*">
                                        <span class="text-danger"> Image size should be 300*300 </span><br/>
                                        <img src="{{ asset($productById->main_image) }}" alt="" height="80" width="80"/>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product sub Image</label>
                                    <div class="col-sm-10">
                                        {{--                                        <input type="file" id="file-input" name="sub_image[]" multiple="" accept="image/*">--}}
                                        {{--                                        <img id="preview" alt="product sub image" width="100" height="100" />--}}
                                        <input type="file" name="sub_image[]" multiple="" accept="image/*">
                                        <span class="text-danger"> Image size should be 300*300 </span> <br/>
                                        @foreach($productSubImages as $productSubImage)
                                            <img src="{{ asset($productSubImage->sub_image) }}" alt="" height="80" width="80"/>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">featured product</label>
                                    <div class="col-sm-10">
                                        @if($productById->featured_product  == 1)
                                            <input type="radio" name="featured_product" value="1" checked> Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="featured_product" value="0"> Hide<br>
                                        @else
                                            <input type="radio" name="featured_product" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="featured_product" value="0" checked> Hide<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">New arrivals</label>
                                    <div class="col-sm-10">
                                        @if($productById->new_arrivals  == 1)
                                            <input type="radio" name="new_arrivals" value="1" checked> Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="new_arrivals" value="0"> Hide<br>
                                        @else
                                            <input type="radio" name="new_arrivals" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="new_arrivals" value="0" checked> Hide<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Ramdom products</label>
                                    <div class="col-sm-10">
                                        @if($productById->ramdom_products  == 1)
                                            <input type="radio" name="ramdom_products" value="1" checked> Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="ramdom_products" value="0"> Hide<br>
                                        @else
                                            <input type="radio" name="ramdom_products" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="ramdom_products" value="0" checked> Hide<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">latest product</label>
                                    <div class="col-sm-10">
                                        @if($productById->latest_product  == 1)
                                            <input type="radio" name="latest_product" value="1" checked> Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="latest_product" value="0"> Hide<br>
                                        @else
                                            <input type="radio" name="latest_product" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="latest_product" value="0" checked> Hide<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Primium Watch</label>
                                    <div class="col-sm-10">
                                        @if($productById->primium == 1)
                                            <input type="radio" name="primium" value="1" checked> Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="primium" value="0"> Hide<br>
                                        @else
                                            <input type="radio" name="primium" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="primium" value="0" checked> Hide<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Publication Status</label>
                                    <div class="col-sm-10">
                                        @if($productById->publication_status  == 1)
                                            <input type="radio" name="publication_status" value="1" checked> Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="publication_status" value="0"> Hide<br>
                                        @else
                                            <input type="radio" name="publication_status" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                            <input type="radio" name="publication_status" value="0" checked> Hide<br>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center"></label>
                                    <div class="col-sm-10">
                                        <input type="submit" class="btn btn-light px-5" value="submit">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <script>
        function validate() {
            var select = document.getElementById('selection').value;
            var message = document.getElementById('message');
            if (select=="Select Option"){
                message.innerHTML ='Please select Publication Status ';
                return false;
            }else {
                return true;
            }
        }
    </script>
    <script>

        function selectSubCategory(category_name) {
            var xmlHttp = new XMLHttpRequest();
            var serverPage='/select-sub-category/'+category_name;
            xmlHttp.open("GET", serverPage);
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById('sub_category_name').innerHTML = xmlHttp.responseText;
                }
            }
            xmlHttp.send(null);
        }
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
        function previewImages() {

            var preview = document.querySelector('#preview');

            if (this.files) {
                [].forEach.call(this.files, readAndPreview);
            }

            function readAndPreview(file) {

                // Make sure `file.name` matches our extensions criteria
                if (!/\.(jpe?g|png|gif)$/i.test(file.name)) {
                    return alert(file.name + " is not an image");
                } // else...

                var reader = new FileReader();

                reader.addEventListener("load", function() {
                    var image = new Image();
                    image.height = 100;
                    image.title  = file.name;
                    image.src    = this.result;
                    preview.appendChild(image);
                });

                reader.readAsDataURL(file);

            }

        }

        document.querySelector('#file-input').addEventListener("change", previewImages);
    </script>
    <script>
        document.forms['editProductForm'].elements['category_id'].value = '{{ $productById->category_id }}';
        document.forms['editProductForm'].elements['sub_category_id'].value = '{{ $productById->sub_category_id }}';
        document.forms['editProductForm'].elements['brand_id'].value = '{{ $productById->brand_id }}';
        document.forms['editProductForm'].elements['supplier_id'].value = '{{ $productById->supplier_id }}';
        document.forms['editProductForm'].elements['product_color'].value = '{{ $productById->product_color }}';
        document.forms['editProductForm'].elements['discount_product_amount'].value = '{{ $productById->discount_product_amount }}';
        document.forms['editProductForm'].elements['trending_page'].value = '{{ $productById->trending_page }}';
        document.forms['editProductForm'].elements['publication_status'].value = '{{ $productById->publication_status }}';
    </script>
@endsection
