@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Contact Us</h1>
                                <p>Check Out How to Contact Us</p>
                            </div><!-- End .page-header -->

                            <div class="mb20"></div><!-- margin -->

                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="contact-info-box">
                                        <img src="{{ $publicUrl }}/images/icon-pin.png" alt="Pin">
                                        <h3>Address</h3>

                                        <address>
                                            <span>123 Shopo St</span>
                                            <span>Commerce Land, EC 12345</span>
                                            <span>Shoptown Second flor</span>
                                        </address>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                                <div class="col-sm-4">
                                    <div class="contact-info-box">
                                        <img src="{{ $publicUrl }}/images/icon-mobile.png" alt="Pin">
                                        <h3>Phone</h3>
                                        <p><strong>Office :</strong> +1800-123-4567</p>
                                        <p><strong>Sale :</strong> +558 6544 522</p>
                                        <p><strong>Admin :</strong> 960 555 4281</p>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                                <div class="col-sm-4">
                                    <div class="contact-info-box">
                                        <img src="{{ $publicUrl }}/images/icon-email.png" alt="Pin">
                                        <h3>Email</h3>
                                        <p><a href="mailto:#">hello@finance.com</a></p>
                                        <p><a href="mailto:#">sales@finace.com</a></p>
                                        <p><a href="mailto:#">careers@finance.com</a></p>
                                    </div><!-- End .contact-info-box -->
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->

                            <div class="mb35 mb20-sm mb10-xs"></div><!-- margin -->

                            <div class="title-group text-center">
                                <h2 class="title">Send a Message</h2>
                                <p class="title-desc">Send Us a Message</p>
                            </div><!-- End .title-group -->

                            <form action="#" class="contact-form">
                                <div class="row">
                                	<div class="col-sm-6">
                                		<div class="form-group">
		                                    <label>First Name*</label>
		                                    <input type="text" class="form-control" required>
		                                </div><!-- End .form-group -->

                                        <div class="form-group">
                                            <label>Email*</label>
                                            <input type="email" class="form-control" required>
                                        </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-6 -->

                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <label>Message*</label>
                                            <textarea cols="30" rows="6" class="form-control" required></textarea>
                                        </div><!-- End .form-group -->
                                    </div><!-- End .col-sm-6 -->
                                </div><!-- End .row -->

                                <div class="clearfix text-right">
                                    <input type="submit" class="btn btn-accent min-width" value="Send Message">
                                </div><!-- End .clearfix -->
                            </form>

                            <div class="title-group text-center">
                                <h2 class="title">Our Location</h2>
                                <p class="title-desc">Location on Map</p>
                            </div><!-- End .title-group -->

                            <div id="map"></div><!-- map -->
                        </div><!-- End .col-md-9 -->
@stop