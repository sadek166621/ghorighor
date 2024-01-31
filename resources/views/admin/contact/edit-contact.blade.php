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
    <!--SEARCHING, ORDENING & PAGING-->
    <div class="row animated fadeInRight">
        <div class="col-md-12">
            <div class="panel">
                <div class="panel-content">
                    <div class="row">
                        <div class="col-sm-12">
                            <form class="form-horizontal form-stripe" action="{{ route('update-contact') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h4 class="mb-xlg text-center"><b>Edit contact form</b></h4>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Primary Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="{{$contact->email}}" name="email" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Secondary Email</label>
                                    <div class="col-sm-10">
                                        <input type="email" class="form-control" value="{{$contact->email_1}}" name="email_1" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Phone No. 1</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$contact->phone_1}}" name="phone_1" id="" placeholder="" >
                                        <input type="hidden" value="{{ $contact->id }}" name="contact_id" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Phone No. 2</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" value="{{$contact->phone_2}}" name="phone_2" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Phone No. 3</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->phone_3}}" name="phone_3" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Phone No. 4</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->phone_4}}" name="phone_4" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Phone No. 5</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->phone_5}}" name="phone_5" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Facebook</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->facebook}}" name="facebook" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Twitter</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->twitter}}" name="twitter" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Instagram</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->instagram}}" name="instagram" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">Google+</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->pinterest}}" name="pinterest" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">LinkedIn</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->linkedIn}}" name="linkedIn" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="" class="col-sm-2 control-label">YouTube</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control"  value="{{$contact->youTube}}" name="youTube" id="" placeholder="" >
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"  class="col-sm-2 control-label">Address</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" name="address" id="exampleFormControlTextarea1" rows="3" style="resize: vertical"> {{$contact->address}}</textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1"  class="col-sm-2 control-label">Location Map</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control summernote" name="map" id="exampleFormControlTextarea1" rows="3" style="resize: vertical"> {{$contact->map}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for=""  class="col-sm-2 control-label">Publication Status</label>
                                    <div class="col-sm-10">
                                        @if($contact->publication_status==1)
                                        <input type="radio" name="publication_status" value="1" checked> Published  	&nbsp; 	&nbsp; 	&nbsp;
                                        <input type="radio" name="publication_status" value="0"> UnPublished<br>
                                        @else
                                        <input type="radio" name="publication_status" value="1" > Published  	&nbsp; 	&nbsp; 	&nbsp;
                                        <input type="radio" name="publication_status" value="0" checked> UnPublished<br>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-offset-2 col-sm-10">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @endsection



