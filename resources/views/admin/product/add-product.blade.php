@extends('admin.master')
@section('title')
    Product
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-columns" aria-hidden="true"></i><a href="#">Product</a></li>
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
                            <h3 class="text-center text-italic">Add Products Form</h3>
                            <form action="{{ route('new-product') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Category Name</label>
                                    <div class="col-sm-10">
                                        <select name="category_id" id="category_id" class="form-control" onclick="selectSubCategory(this.value);">
                                            <option value="">--- Select Category Name ---</option>
                                            @foreach($categories as $category)
                                                <option value="{{$category->id}}">{{$category->category_name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row" id="subRes">
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
                                                <option readonly="" value="{{ $supplier->id}}">{{ $supplier->supplier_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Name</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_name" id="product_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product code</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_code" id="product_code">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"  class="col-sm-2 control-label text-center">Product Regular Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="product_price" class="form-control" id="price" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"  class="col-sm-2 control-label text-center">Discount Percentage</label>
                                    <div class="col-sm-10">
                                        <input type="text" value="" onkeyup="discount_price();" name="discount_product_amount" class="form-control" id="product_discount_amount" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="inputEmail3"  class="col-sm-2 control-label text-center">Discount Price</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="discount_product_price" class="form-control" id="product_discount_price" placeholder="" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Quantity/Size</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_quantity" id="product_quantity">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Cost</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_cost" id="product_cost">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Stock</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_stock" id="product_stock">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Color</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_color" id="product_color">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Made By</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" name="product_made_by" id="product_made_by">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Youtube Link</label>
                                    <div class="col-sm-10">
                                        <input type="text" required class="form-control" name="link" >
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Description</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" rows="6" name="description" placeholder="" id=""></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product Main Image</label>
                                    <div class="col-sm-10">
{{--                                        <input type="file" name="main_image" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])" accept="image/*">--}}
{{--                                        <img id="blah" alt="product main image" width="100" height="100" />--}}
                                        <input type="file" name="main_image" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Product sub Image</label>
                                    <div class="col-sm-10">
{{--                                        <input type="file" id="file-input" name="sub_image[]" multiple="" accept="image/*">--}}
{{--                                        <img id="preview" alt="product sub image" width="100" height="100" />--}}
                                        <input type="file" name="sub_image[]" multiple="" accept="image/*">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Primium Watch</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="primium" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                        <input type="radio" name="primium" value="0" checked> Hide<br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">featured product</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="featured_product" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                        <input type="radio" name="featured_product" value="0" checked> Hide<br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">New arrivals</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="new_arrivals" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                        <input type="radio" name="new_arrivals" value="0" checked> Hide<br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Ramdom products</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="ramdom_products" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                        <input type="radio" name="ramdom_products" value="0" checked> Hide<br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">latest product</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="latest_product" value="1" > Show  	&nbsp; 	&nbsp; 	&nbsp;
                                        <input type="radio" name="latest_product" value="0" checked> Hide<br>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="large-input" class="col-sm-2 col-form-label text-center">Publication Status</label>
                                    <div class="col-sm-10">
                                        <input type="radio" name="publication_status" value="1" checked> Published  	&nbsp; 	&nbsp; 	&nbsp;
                                        <input type="radio" name="publication_status" value="0"> UnPublished<br>
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

        function selectSubCategory(category_id) {
            var xmlHttp = new XMLHttpRequest();
            var serverPage='/Ecommerceshuvo/public/select-sub-category/'+category_id;
            xmlHttp.open("GET", serverPage);
            xmlHttp.onreadystatechange = function() {
                if (xmlHttp.readyState == 4 && xmlHttp.status == 200) {
                    document.getElementById('subRes').innerHTML = xmlHttp.responseText;
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
@endsection
