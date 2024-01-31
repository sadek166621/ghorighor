@extends('admin.master')
@section('title')
    Manage Product
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="#">Products</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
{{--            <h5 class="mb-md text-success text-center">{{session('message')}}</h5>--}}
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <h4 class="text-center" style="color: green">{{Session::get('message')}}</h4>
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>Sl No</th>
                                <th>Product Name</th>
                                <th>Category Name</th>
                                <!--<th>Sub Category Name</th>-->
                                <th>Product cost</th>
                                <th>Product size</th>
                                <th>Product Price</th>
                                <th>Stock Amount</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i = 1; ?>
                            @foreach($allPublishedProducts as $allPublishedProduct)
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $allPublishedProduct->product_name }}</td>
                                    <td>{{ $allPublishedProduct->category_name }}</td>

                                    <td>TK. {{ $allPublishedProduct->product_cost }}</td>
                                    <td> {{ $allPublishedProduct->product_quantity }}</td>
                                    <td>TK. {{ $allPublishedProduct->product_price }}</td>
                                    <td>{{ $allPublishedProduct->product_stock }}</td>
                                    <td>{{ $allPublishedProduct->publication_status == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td class="center">
                                        <a href="{{ url('/view-product/'.$allPublishedProduct->id) }}" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-zoom-in" title="View Product"></span>
                                        </a>
                                        @if($allPublishedProduct->publication_status == 1)
                                            <a href="{{ url('/unpublished-product/'.$allPublishedProduct->id) }}" class="btn btn-success btn-xs" title="Unpublished Product">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                        @else
                                            <a href="{{ url('/published-product/'.$allPublishedProduct->id) }}" class="btn btn-warning btn-xs" title="Published Product">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>
                                        @endif
                                        <a href="{{ url('/edit-product/'.$allPublishedProduct->id) }}" class="btn btn-primary btn-xs" title="Edit Product">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="{{ url('/delete-product/'.$allPublishedProduct->id) }}" class="btn btn-danger btn-xs" title="Delete Product" onclick="return confirm('Are You Sure Delete This');">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>
                                </tr>
                                <?php $i++; ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
