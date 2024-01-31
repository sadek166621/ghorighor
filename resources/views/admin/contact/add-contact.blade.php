@extends('admin.master')
@section('title')
    Contract
@endsection
@section('content')

    <!-- ========================================================= -->
    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-table" aria-hidden="true"></i><a href="">Contract</a></li>
                <li><a>Data-table</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Add Contract
    </button>

    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-sm-12">
            <h5 class="mb-md text-success text-center">{{session('message')}}</h5>
            <div class="panel">
                <div class="panel-content">
                    <div class="table-responsive">
                        <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>SL No.</th>
                                <th>Phone: 1</th>
                                <th>Phone: 2</th>
                                <th>Address</th>
                                <th>Publication Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php $i=1 ?>
                            @foreach($contacts as $contact)

                                <tr>
                                    <td>{{$i}}</td>
                                    <td>{{substr($contact->phone_1,0,17)}}</td>
                                    <td>{{substr($contact->phone_2,0,17)}}</td>
                                    <td>{{substr($contact->address,0,30)}}</td>
                                    <td>{{$contact->publication_status==1 ? 'Published':'Unpublished'}}</td>
                                    <td class="center">
                                        <a href="{{ url('/view-contact/'.$contact->id) }}" class="btn btn-info btn-xs">
                                            <span class="glyphicon glyphicon-zoom-in" title="View contact"></span>
                                        </a>
                                        @if($contact->publication_status == 1)
                                            <a href="{{ url('/unpublished-contact/'.$contact->id) }}" class="btn btn-success btn-xs" title="Unpublished contact">
                                                <span class="glyphicon glyphicon-arrow-down"></span>
                                            </a>
                                        @else
                                            <a href="{{ url('/published-contact/'.$contact->id) }}" class="btn btn-warning btn-xs" title="Published contact">
                                                <span class="glyphicon glyphicon-arrow-up"></span>
                                            </a>
                                        @endif
                                        <a href="{{ url('/edit-contact/'.$contact->id) }}" class="btn btn-primary btn-xs" title="Edit contact">
                                            <span class="glyphicon glyphicon-edit"></span>
                                        </a>
                                        <a href="{{ url('/delete-contact/'.$contact->id) }}" class="btn btn-danger btn-xs" title="Delete contact" onclick="return confirm('Are You Sure Delete This');">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </a>
                                    </td>


                                </tr>
                                <?php $i++ ?>
                            @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <h4 class="text-center font-weight-bold" style="color: #126F5C"><i>Add contract us form</i></h4>
                {{--                <button type="button" class="close" data-dismiss="modal" aria-label="Close">--}}
                <div class="modal-body">
                    <form action="{{ route('new-contact') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Primary Email</label>
                            <input type="email" class="form-control" name="email" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Secondary Email</label>
                            <input type="email" class="form-control" name="email_1" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Phone No. 1</label>
                            <input type="text" class="form-control" name="phone_1" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Phone No. 2</label>
                            <input type="text" class="form-control" name="phone_2" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Phone No. 3</label>
                            <input type="text" class="form-control" name="phone_3" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Phone No. 4</label>
                            <input type="text" class="form-control" name="phone_4" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Phone No. 5</label>
                            <input type="text" class="form-control" name="phone_5" id="" placeholder="" >
                        </div>



                        <div class="form-group">
                            <label for="">Facebook</label>
                            <input type="text" class="form-control" name="facebook" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Twitter</label>
                            <input type="text" class="form-control" name="twitter" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Instagram</label>
                            <input type="text" class="form-control" name="instagram" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">Google+</label>
                            <input type="text" class="form-control" name="pinterest" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">LinkedIn</label>
                            <input type="text" class="form-control" name="linkedIn" id="" placeholder="" >
                        </div>
                        <div class="form-group">
                            <label for="">YouTube</label>
                            <input type="text" class="form-control" name="youTube" id="" placeholder="" >
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" style="resize: vertical"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Location Map</label>
                                <textarea type="text" class="form-control summernote" name="map" id="" placeholder=" "></textarea>

                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Publication Status</label>&nbsp; 	&nbsp;&nbsp; 	&nbsp;
                            <input type="radio" name="publication_status" value="1" checked> Published  	&nbsp; 	&nbsp; 	&nbsp;
                            <input type="radio" name="publication_status" value="0"> UnPublished<br>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
