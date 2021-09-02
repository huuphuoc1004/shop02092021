<!-- FOOTER -->
<aside class="col-md-3 col-md-pull-9 sidebar sidebar-shop">
                            <div class="widget widget-box widget-shop-category active">
                                <h3 class="widget-title">Danh mục</h3>

                                <ul class="shop-category-list accordion">
                                    @foreach($itemsCat as $item)
                                        @php
                                            $id = $item->cid;
                                            $cname = $item->cname;
                                            $slug  = Str::slug($cname);
                                            $urlCat  = route('shop.cat',[$slug,$id]);
                                        @endphp
                                    <li>
                                        <a href="{{$urlCat}}">{{$cname}}</a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div><!-- End .widget -->
                        </aside><!-- End .col-md-3 -->
                    </div><!-- End .row -->
                </div><!-- End .container -->
            </div><!-- End .main -->
            
            <footer class="footer">
                <div class="container">
                    <div class="info-bar">
                        <div class="info-bar-col">
                            <h5 class="info-bar-title">FREE SHIPPING &amp; RETURN</h5>
                            <p>Free shipping on all orders over $99</p>
                        </div><!-- End .info-bar-col -->
                        <div class="info-bar-col">
                            <h5 class="info-bar-title">MONEY BACK GUARANTEE</h5>
                            <p>100% money back guarantee</p>
                        </div><!-- End .info-bar-col -->
                        <div class="info-bar-col">
                            <h5 class="info-bar-title">ONLINE SUPPORT 24/7</h5>
                            <p>Highly customer satisfaction</p>
                        </div><!-- End .info-bar-col -->
                    </div><!-- End .info-bar -->
                </div><!-- End .container -->
                <div class="footer-inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6 col-md-3">
                                <div class="widget widget-about">
                                    <h4 class="widget-title">Contact Information</h4>

                                    <address>
                                        <span>123 Shopo St</span>
                                        <span>Commerce Land, EC 12345</span>
                                        <span>+123 456 7890</span>
                                        <a href="mailto:info@domain.com">info@domain.com</a>
                                    </address>
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-3 -->

                            <div class="col-sm-6 col-md-3">
                                <div class="widget">
                                    <h4 class="widget-title">Collection</h4>

                                    <ul class="links">
                                        <li><a href="#">Fashion</a></li>
                                        <li><a href="#">Electronics</a></li>
                                        <li><a href="#">Home &amp; Garden</a></li>
                                        <li><a href="#">Music</a></li>
                                        <li><a href="#">Sports</a></li>
                                        <li><a href="#">Motors</a></li>
                                    </ul>
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-3 -->

                            <div class="clearfix visible-sm"></div><!-- clearfix -->

                            <div class="col-sm-6 col-md-3">
                                <div class="widget">
                                    <h4 class="widget-title">My Account</h4>

                                    <ul class="links">
                                        <li><a href="#">Account</a></li>
                                        <li><a href="#">Login</a></li>
                                        <li><a href="#">My cart</a></li>
                                        <li><a href="#">Wishlist</a></li>
                                        <li><a href="#">Checkout</a></li>
                                    </ul>
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-3 -->

                            <div class="col-sm-6 col-md-3">
                                <div class="widget widget-newsletter">
                                    <h4 class="widget-title">Newsletter</h4>
                                    <p>Signup for our newsletter</p>

                                    <form action="#">
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Your Email" required>
                                            <input type="submit" value="GO" class="btn">
                                        </div><!-- End .form-group -->
                                    </form>

                                    <div class="social-icons">
                                        <a href="#" class="social-icon" title="Facebook"><i class="fa fa-facebook"></i></a>
                                        <a href="#" class="social-icon" title="Twitter"><i class="fa fa-twitter"></i></a>
                                        <a href="#" class="social-icon" title="Linkedin"><i class="fa fa-linkedin"></i></a>
                                    </div>
                                </div><!-- End .widget -->
                            </div><!-- End .col-md-3 -->
                        </div><!-- End .row -->
                    </div><!-- End .container -->
                </div><!-- End .footer-inner -->

                <div class="footer-bottom">
                    <div class="container">
                        <p class="copyright">Online &copy; 2017. All Rights Reserved</p>
                    <img src="{{ $publicUrl }}/images/cards.png" alt="Payment Methods" class="img-cards">
                    </div><!-- End .container -->
                </div><!-- End .footer-bottom -->
            </footer><!-- End .footer -->
        </div><!-- End #wrapper -->
        
        <a id="scroll-top" href="#top" title="Scroll top"><i class="fa fa-angle-up"></i></a>

        <!-- End -->
        <script src="{{ $publicUrl }}/js/plugins.js"></script>
        <script src="{{ $publicUrl }}/js/main.js"></script>

        <!-- REVOLUTION JS FILES -->
        <script type="text/javascript" src="{{ $publicUrl }}/js/jquery.themepunch.tools.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/jquery.themepunch.revolution.min.js"></script>

        <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  
        (Load Extensions only on Local File Systems !  
        The following part can be removed on Server for On Demand Loading) -->  
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.actions.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.carousel.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.kenburn.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.layeranimation.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.migration.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.navigation.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.parallax.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.slideanims.min.js"></script>
        <script type="text/javascript" src="{{ $publicUrl }}/js/extensions/revolution.extension.video.min.js"></script>

        <script type="text/javascript">
            jQuery(document).ready(function() {
                "use strict";

                var revapi;
                if ( $("#rev_slider").revolution == undefined ) {
                    revslider_showDoubleJqueryError("#rev_slider");
                } else {
                    revapi = $("#rev_slider").show().revolution({
                        sliderType: "standard",
                        jsFileLocation: "{{ $publicUrl }}/js/",
                        sliderLayout: "auto",
                        dottedOverlay:"none",
                        delay: 15000,
                        navigation: {
                            mouseScrollNavigation: "off",
                            onHoverStop: "off",
                            touch: {
                                touchenabled: "on"
                            },
                            arrows: {
                                style: "custom",
                                enable: true,
                                hide_onmobile: false,
                                hide_under: 768,
                                hide_onleave: false,
                                tmp: '',
                                left: {
                                    h_align: "left",
                                    v_align: "bottom",
                                    h_offset: 63,
                                    v_offset: 48
                                },
                                right: {
                                    h_align: "left",
                                    v_align: "bottom",
                                    h_offset: 85,
                                    v_offset: 48
                                }
                            },
                            bullets: {
                                enable: false
                            }
                        },
                        responsiveLevels: [1200,992,768,480],
                        gridwidth: [870,679,640,480],
                        gridheight: [468,400,360,300],
                        lazyType: "smart",
                        spinner: "spinner2",
                        parallax: {
                            type: "off"
                        },
                        debugMode: false
                    });
                }
            });
        </script>
    </body>

<!-- Mirrored from obest.org/html/shopo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 06:39:14 GMT -->
</html>
<!-- END FOOTER -->