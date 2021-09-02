@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>About Us</h1>
                                <p>Learn more about us</p>
                            </div><!-- End .page-header -->

                            <p class="lead text-center">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.</p>

                            <div class="mb20 mb10-xs"></div><!-- margin -->

                            <div class="row">
                                <div class="col-sm-4 count-container text-center">
                                    <span class="count" data-from="0" data-to="18" data-speed="2000" data-refresh-interval="50">0</span>
                                    <h4 class="count-title">Years in Business</h4>
                                </div><!-- End .col-sm-4 -->
                                <div class="col-sm-4 count-container text-center">
                                    <span class="count" data-from="0" data-to="200" data-speed="2000" data-refresh-interval="50">0</span>
                                    <h4 class="count-title">Clients and Partners</h4>
                                </div><!-- End .col-sm-4 -->
                                <div class="col-sm-4 count-container text-center">
                                    <span class="count-prefix">$</span><span class="count" data-from="0" data-to="15" data-speed="2000" data-refresh-interval="50">0</span>
                                    <h4 class="count-title">Billion Sales</h4>
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->

                            <div class="mb35 mb20-sm mb10-xs"></div><!-- margin -->

                            <div class="title-group text-center">
                                <h2 class="title big">Our History</h2>
                                <p class="title-desc">Our Way of Success</p>
                            </div><!-- End .title-group -->

                            <div class="mb20 mb10-sm mb0-xs"></div><!-- margin -->
                            
                            <div class="history-section">
                                <div class="history-left">
                                    <p>Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions...</p>

                                    <ul class="timeline-list">
                                        <li class="scroll-anim" data-anim="fadeInUp">
                                            <span class="timeline-date">2001</span>
                                            <span class="timeline-dot"></span>
                                            <h3>Company formed</h3>
                                            <p>Page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncove.</p>
                                        </li>

                                        <li class="scroll-anim" data-anim="fadeInUp">
                                            <span class="timeline-date">2005</span>
                                            <span class="timeline-dot"></span>
                                            <h3>Suspendisse tincidunt nibh.</h3>
                                            <p>making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a</p>
                                        </li>

                                        <li class="scroll-anim" data-anim="fadeInUp">
                                            <span class="timeline-date">2017</span>
                                            <span class="timeline-dot"></span>
                                            <h3>Awards and 300 employees</h3>
                                            <p>Suffered alteration in some form, by injected humour, or randomised words which don't look.</p>
                                        </li>
                                    </ul>
                                </div><!-- End .history-left -->

                                <div class="history-right">
                                    <img src="{{ $publicUrl }}/images/about-img.jpg" alt="About image" class="img-responsive about-img">
                                </div><!-- End .history-right -->
                            </div><!-- End .history-section -->

                            <div class="mb5"></div><!-- margin -->

                            <div class="title-group text-center">
                                <h2 class="title big">Our Team</h2>
                                <p class="title-desc">The Dream Team</p>
                            </div><!-- End .title-group -->

                            <div class="mb5"></div><!-- margin -->

                            <div class="row">
                                <div class="col-md-10 col-md-offset-1">
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <div class="team-member scroll-anim" data-anim="fadeInUp">
                                                <figure>
                                                    <img src="{{ $publicUrl }}/images/team/member1.jpg" alt="Member">
                                                </figure>

                                                <h3>john doe</h3>
                                                <p>marketing</p>
                                            </div><!-- End .team-member -->
                                        </div><!-- End .col-sm-4 -->
                                        <div class="col-sm-4">
                                            <div class="team-member scroll-anim" data-anim="fadeInUp" data-anim-delay="0.1s">
                                                <figure>
                                                    <img src="{{ $publicUrl }}/images/team/member2.jpg" alt="Member">
                                                </figure>

                                                <h3>Robert doe</h3>
                                                <p>SEO &amp; Founder</p>
                                            </div><!-- End .team-member -->
                                        </div><!-- End .col-sm-4 -->
                                        <div class="col-sm-4">
                                            <div class="team-member scroll-anim" data-anim="fadeInUp" data-anim-delay="0.2s">
                                                <figure>
                                                    <img src="{{ $publicUrl }}/images/team/member3.jpg" alt="Member">
                                                </figure>

                                                <h3>brian doe</h3>
                                                <p>Manager</p>
                                            </div><!-- End .team-member -->
                                        </div><!-- End .col-sm-4 -->
                                    </div><!-- End .row -->
                                </div><!-- End .col-md-10 -->
                            </div><!-- End .row -->
                            
                            <div class="mb50"></div><!-- margin -->
                        </div><!-- End .col-md-9 -->
@stop