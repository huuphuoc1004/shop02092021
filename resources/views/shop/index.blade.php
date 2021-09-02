@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay">
</div><!-- End .sidemenu-overlay -->
<div class="main">
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-md-push-3">
                <div id="rev_slider_wrapper" class="slider-container rev_slider_wrapper fullwidthbanner-container">
                    <div id="rev_slider" class="rev_slider fullwidthabanner" style="display:none;">
                        <ul>
                            @foreach ($items as $items)
                                    @php
                                        $pname      = $items->pname;
                                        $picture    = $items->picture;
                                        $urlPic     = "storage/app/public/files/".$picture;
                                        $slug       = Str::slug($pname);
                                        $id         = $items->pid;
                                        $urlDetail  = route('shop.product',[$slug,$id]);
                                    @endphp
                                    
                            <!-- SLIDE  -->
                            <li data-transition="fade">
                                <!-- Background Image -->
                                <img src="{{ $publicUrl }}/images/transparent.png" class="rev-slidebg" style="background-color: #eeebe7;" alt="Slider bg">

                                <div class="tp-caption tp-resizeme rs-parallaxlevel-0 text-primary" 
                                    data-x="['left','left','left','left']" data-hoffset="['68','50','45','30']" 
                                    data-y="['center','center','center','center']" data-voffset="['-44','-36','-30','-24']" 
                                    data-fontsize="['26','24','22','20']"
                                    data-fontweight="400"
                                    data-lineheight="['36','34','32','30']"
                                    data-width="none"
                                    data-height="none"
                                    data-whitespace="nowrap"
                                    data-frames='[{"delay":600,"speed":800,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-responsive_offset="on" 
                                    data-elementdelay="0" 
                                    style="z-index: 5; white-space: nowrap; letter-spacing: 0.08em; text-transform: uppercase; font-family:'Oswald', sans-serif;">
                                    {{ $pname }}
                                </div>

                                <a href="{{$urlDetail}}"
                                    class="tp-caption tp-resizeme rs-parallaxlevel-0" 
                                    data-x="['left','left','left','left']" data-hoffset="['68','50','45','30']" 
                                    data-y="['center','center','center','center']" data-voffset="['40','36','32','30']" 
                                    data-width="none"
                                    data-height="none"
                                    data-fontsize="['13','12','11','10']"
                                    data-fontweight="400"
                                    data-lineheight="['21','20','18','16']"
                                    data-color="#7e6f5c"
                                    data-whitespace="nowrap"
                                    data-frames='[{"delay":1000,"speed":800,"frame":"0","from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","to":"o:1;","ease":"Power2.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-responsive_offset="on" 
                                    style="z-index: 7; letter-spacing: 0.075em; text-transform: uppercase; text-decoration: underline;" href="category.html">
                                    Mua hàng
                                </a>

                                <div class="tp-caption tp-resizeme" 
                                    data-frames='[{"delay":600,"speed":1000,"frame":"0","from":"x:right;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":600,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'
                                    data-type="image" 
                                    data-x="['right','right','right','right']" data-hoffset="['110','90','80','60']" 
                                    data-y="['bottom','bottom','bottom','bottom']" data-voffset="['0','0','0','0']" 
                                    data-width="none"
                                    data-height="none"
                                ><img src="{{ $urlPic }}" style="width: 800px; height: 300px;" alt="Item" width="452" height="428" 
                                    data-ww="['452px', '380px', '500px', '240px']" data-hh="['467px', '359px', '331px', '227px']"></div>
                            </li>
                            @endforeach
                        </ul>
                        <div class="tp-bannertimer tp-bottom" style="display:none; height: 2px; background-color: rgba(0, 0, 0, 0.2);"></div>
                    </div><!-- End #rev_slider -->
                </div><!-- END REVOLUTION SLIDER -->
                <h3 class="carousel-title">Sản phẩm nổi bật</h3>
                <div class="owl-data-carousel owl-carousel"
                data-owl-settings='{ "items":4, "nav": true, "dots":false }'
                data-owl-responsive='{ "480": {"items": 2}, "768": {"items": 3}, "992": {"items": 3}, "1200": {"items": 4} }'>
                    @foreach ($item as $item)
                            @php
                                $pname      = $item->pname;
                                $picture    = $item->picture;
                                $discount   = $item->discount;
                                $price      = $item->price;
                                $urlPic     = "storage/app/public/files/".$picture;
                                $slug       = Str::slug($pname);
                                $id         = $item->pid;
                                $urlDetail  = route('shop.product',[$slug,$id]);
                            @endphp    
                    <div class="product">
                        <figure class="product-image-container">
                            <a href="{{$urlDetail}}" title="Product Name" class="product-image-link">
                                <img style="width: 200px;height: 250px;" class="owl-lazy" src="{{ $urlPic }}" data-src="{{ $urlPic}}" width="195" height="255" alt="Product Image">
                            </a>
                            <span class="product-label">-{{ $discount }}%</span>
                            <a href="#" class="btn-quick-view">Quick View</a>

                            <div class="product-action">
                                <a href="#" class="btn-product btn-wishlist" title="Add to Wishlist">
                                    <i class="icon-product icon-heart"></i>
                                </a>
                                <a href="" class="btn-product btn-add-cart" title="Add to Bag">
                                    <i class="icon-product icon-bag"></i>
                                    <span>Thêm vào giỏ hàng</span>
                                </a>
                                <a href="#" class="btn-product btn-compare" title="Add to Compare">
                                    <i class="icon-product icon-bar"></i>
                                </a>
                            </div><!-- End .product-action -->
                        </figure>
                        <h3 class="product-title">
                            <a href="product.html">{{ $pname }}</a>
                        </h3>
                        <div class="product-price-container">
                            <span class="product-price">{{number_format($price)}} đ</span>
                        </div><!-- Endd .product-price-container -->
                    </div><!-- End .product -->
                    @endforeach
                </div><!-- End .owl-data-carousel -->

                <div class="mb30 mb10-xs"></div><!-- margin -->
                
                <div class="row">
                    <div class="col-sm-6">
                        <h3 class="carousel-title">Sản phẩm giảm giá</h3>
                        <ul class="products-list">
                            @foreach ($itemSeller as $item)
                                @php
                                    $pname   =  $item->pname;
                                    $price   =  $item->price;
                                    $discount = $item->discount;
                                    $star = $item->star;
                                    $starAfter = $star * 20;
                                    $starWidth = "style = width:{$starAfter}%";
                                    $picture =  $item->picture;
                                    $urlPic     = "storage/app/public/files/".$picture;
                                    $slug       = Str::slug($pname);
                                    $id         = $item->pid;
                                    $urlDetail  = route('shop.product',[$slug,$id]);
                                @endphp
                            <li class="product">
                                <figure class="product-image-container">
                                    <a href="{{$urlDetail}}">
                                        <img src="{{$urlPic}}" alt="Product">
                                    </a>
                                </figure>
                                <div>
                                    <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" {{$starWidth}}></span><!-- End .ratings -->
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .ratings-container -->
                                    <h4 class="product-title">
                                        <a href="{{$urlDetail}}">{{$pname}}</a>
                                    </h4>
                                    <div class="product-price-container">
                                        <span class="product-price">{{number_format($price)}}</span>
                                    </div>
                                    <div class="product-price-container">
                                        <span class="product-price">-{{$discount}}%</span>
                                    </div>
                                    <!-- End .product-price-container -->
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- End .col-sm-4 -->
                    <div class="col-sm-6">
                        <h3 class="carousel-title">Sản phẩm giá thấp</h3>

                        <ul class="products-list">
                            @foreach ($itemSale as $item)
                                    @php
                                        $pname   =  $item->pname;
                                        $price   =  $item->price;
                                        $picture =  $item->picture;
                                        $star = $item->star;
                                        $starAfter = $star * 20;
                                        $starWidth = "style = width:{$starAfter}%";
                                        $urlPic     = "storage/app/public/files/".$picture;
                                        $slug       = Str::slug($pname);
                                        $id         = $item->pid;
                                        $urlDetail  = route('shop.product',[$slug,$id]);
                                    @endphp
                            <li class="product">
                                <figure class="product-image-container">
                                    <a href="{{$urlDetail}}">
                                        <img src="{{$urlPic}}" alt="Product">
                                    </a>
                                </figure>
                                <div>
                                <div class="ratings-container">
                                        <div class="product-ratings">
                                            <span class="ratings" {{$starWidth}}></span><!-- End .ratings -->
                                        </div><!-- End .product-ratings -->
                                    </div><!-- End .ratings-container -->
                                    <h4 class="product-title">
                                        <a href="{{$urlDetail}}">{{$pname}}</a>
                                    </h4>
                                    <div class="product-price-container">
                                        <span class="product-price">{{number_format($price)}}</span>
                                    </div><!-- End .product-price-container -->
                                </div>
                            </li>
                            @endforeach
                        </ul>
                    </div><!-- End .col-sm-4 -->
                </div><!-- End .row -->

                <div class="mb50 visible-sm visible-xs"></div><!-- margin -->
            </div><!-- End .col-md-9 -->
@stop