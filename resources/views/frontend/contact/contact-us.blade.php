@extends("frontend.master")
@section('title')
    Contact
    @endsection
@section('content')
    <div class="single-banner-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 text-center">
                    <div class="single-ban-top-content">
                        <p>Contact Us</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-single-heading-banner-->
    <!--start-single-heading-->
    <div class="signle-heading">
        <div class="container">
            <div class="row">
                <!--start-shop-head -->
                <div class="col-lg-12">
                    <div class="shop-head-menu">
                        <ul>
                            <li><i class="fa fa-home"></i><a class="shop-home" href="index.html"><span>Home</span></a><span><i class="fa fa-angle-right"></i></span></li>
                            <li class="shop-pro">Contact Us</li>
                        </ul>
                    </div>
                </div>
                <!--end-shop-head-->
            </div>
        </div>
    </div>
    <!--end-single-heading-->
    <!--contact-map-area-start-->
    <div class="map-wrap">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="map-area">
{{--                        <div id="googleMap" style="width:100%;height:410px;"></div>--}}
                        <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d1266.5410890641951!2d90.40296521982881!3d23.748744456088506!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sRazzak%20Plaza%2C%201%20New%20Eskaton%20Road%2C%20Moghbazar%20More!5e0!3m2!1sen!2sbd!4v1639418974389!5m2!1sen!2sbd" width="100%" height="410" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end-contact-map-area-->
    <!--stay_in_touch_area_start-->
    <div class="stay-touch-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-md-8 col-sm-8 col-xs-12">
                    <div class="touch-text">
                        <h3>Stay in touch</h3>
                    </div>
                    <div class="smal-text">
                        <p>This time there's no stopping us!" Makin' your way in the world today takes everything you've got. Takin' a break from all your worries sure would help a lot.</p>
                    </div>
                    <form action="{{route('message-send')}}" method="post">
                        @csrf
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="touch-form">
                                            <span class="name">Your Name (required)</span><br>
                                            <input required type="text" name="name"><br>
                                            <span class="name">Your Email (required)</span><br>
                                            <input  type="email" name="email"><br>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                                    <div class="touch-form">
                                            <span class="name">Your Phone (required)</span><br>
                                            <input required type="text" name="phone"><br>
                                            <span class="name">Subject</span><br>
                                            <input type="text" name="subjext"><br>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                    <div class="touch-textarea">
                                            <span class="name">Your Message</span><br>
                                            <textarea required name="message" id="textarea" cols="89" rows="5"></textarea><br>
                                        <div class="continue-butt">
                                                <input class="hvr-underline-from-left" type="submit" value="Send Message">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </form>

                </div>
                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                    <div class="address-area">
                        <div class="single-address">
                            <p><i class="fa fa-map-marker"></i>
                                <strong class="stro">Address :
                                </strong>
                                <br>
                                @foreach($contacts as $contact)
                                <span class="add-tex">{{$contact->address}}</span>
                                    @endforeach
                            </p>
                        </div>
                        <div class="single-email">
                            <p>
                                <i class="fa fa-envelope-o"></i>
                                <strong class="emai-stro">Email :</strong>
                                <br>
                                @foreach($contacts as $contact)
                                <span class="email-tex">{{$contact->email}}</span>
                                    @endforeach
                            </p>
                        </div>
                        <div class="customar-supp">
                            <p>
                                <i class="fa fa-phone"></i>
                                <strong class="cus-stro">customer support :</strong>
                                <br>
                                @foreach($contacts as $contact)
                                <span class="cus-tex">{{$contact->phone_1}}<br>{{$contact->phone_2}}</span>
                                    @endforeach
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endsection
