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
    <div class="col-sm-12">
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <h4 class="mb-xlg text-center"><b>View contact Data ( ID: {{ $contact->id }} )</b></h4>
                    <table id="" class="table table-bordered table-striped">
                        <tr>
                            <th>Primary Email</th>
                            <td>{{ $contact->email}}</td>
                        </tr>
                        <tr>
                            <th>Secondary Email</th>
                            <td>{{ $contact->email_1}}</td>
                        </tr>
                        <tr>
                            <th>Phone No. 1</th>
                            <td>{{ $contact->phone_1}}</td>
                        </tr>
                        <tr>
                            <th>Phone No. 2</th>
                            <td>{{ $contact->phone_2}}</td>
                        </tr>
                        <tr>
                            <th>Phone No. 3</th>
                            <td>{{ $contact->phone_3}}</td>
                        </tr>
                        <tr>
                            <th>Phone No. 4</th>
                            <td>{{ $contact->phone_4}}</td>
                        </tr>
                        <tr>
                            <th>Phone No. 5</th>
                            <td>{{ $contact->phone_5}}</td>
                        </tr>
                        <tr>
                            <th>Facebook</th>
                            <td>{{ $contact->facebook}}</td>
                        </tr>
                        <tr>
                            <th>Twitter</th>
                            <td>{{ $contact->twitter}}</td>
                        </tr>
                        <tr>
                            <th>Instagram</th>
                            <td>{{ $contact->instagram}}</td>
                        </tr>
                        <tr>
                            <th>Pinterest</th>
                            <td>{{ $contact->pinterest}}</td>
                        </tr>
                        <tr>
                            <th>LinkedIn</th>
                            <td>{{ $contact->linkedIn}}</td>
                        </tr>
                        <tr>
                            <th>YouTube</th>
                            <td>{{ $contact->youTube}}</td>
                        </tr>
                        <tr>
                            <th>Address</th>
                            <td>{{ $contact->address}}</td>
                        </tr>
                        <tr>
                            <th>Location Map</th>
                            <td><iframe src="{{ $contact->map}}" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></td>
                        </tr>
                        <tr>
                            <th>Publication Status</th>
                            <td>{{$contact->publication_status==1 ? 'Published':'Unpublished'}}</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection



