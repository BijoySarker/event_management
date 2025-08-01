@extends('front.layout.master')

@section('main_content')

<div class="common-banner" style="background-image:url({{ asset('dist-front/images/banner.jpg') }})">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <h2>Contact</h2>
                    <div class="breadcrumb-container">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="contacts" class="pt_70 pb_50 white">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-sm-12">
                <div class="contact">
                    <form class="form" method="post" action="">
                        <div class="row">
                            <div class="form-group col-md-6">
                                <input name="name" class="form-control" placeholder="Name" type="text">
                            </div>
                            <div class="form-group col-md-6">
                                <input name="email" class="form-control" placeholder="Email" type="email">
                            </div>
                            <div class="form-group col-md-12">
                                <input name="subject" class="form-control" placeholder="Subject" type="text">
                            </div>
                            <div class="form-group col-md-12">
                                <textarea rows="3" name="message" class="form-control" placeholder="Message"></textarea>
                            </div>
                            <div class="col-md-12">
                                <div class="actions">
                                    <input value="Send Message" name="submit" class="btn btn-lg btn-con-bg" type="submit">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-4 col-sm-12">
                <div class="contact-info">
                    <div class="contact-inner-box">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-map-marker"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Address: <br><span>Dhaka, Bangladesh</span>
                            </div>
                        </div>
                    </div>
                    <div class="contact-inner-box">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-envelope-o"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Email: <br><span>bijoybp7538@gmail.com</span>
                            </div>
                        </div>
                    </div>
                    <div class="contact-inner-box">
                        <div class="icon">
                            <div class="contact-inner-icon">
                                <i class="fa fa-phone"></i>
                            </div>
                        </div>
                        <div class="text">
                            <div class="contact-inner-text">
                                Phone: <br><span>+8801314447426</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
