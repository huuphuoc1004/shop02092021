@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
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
                                                    $urlPic     = "/storage/app/public/files/".$picture;
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
                                                Shop Now
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
                            </div>
                            <div class="banner banner-top">
                            </div>
                            <div class="category-header">
                                <h1>{{ $cname }}</h1>
                                <ol class="breadcrumb">
                                    <li><a href="#">{{ $cname }}</a></li>
                                    <li class="active">{{ $cname }}</li>
                                </ol>
                            </div>

                            <div class="shop-row">
                                <div class="shop-container max-col-4" data-layout="fitRows">
                                    @foreach ($itemCat as $item)
                                        @php
                                            $discount   = $item->discount;
                                            $pname      = $item->pname;
                                            $price      = $item->price;
                                            $picture    = $item->picture;
                                            $urlPic     = "/storage/app/public/files/".$picture;
                                            $slug       = Str::slug($pname);
                                            $id         = $item->pid;
                                            $urlDetail  = route('shop.product',[$slug,$id]);
                                        @endphp
                                    <div class="product-item">
                                        <div class="product">
                                            <figure class="product-image-container">
                                                <a href="{{ $urlDetail }}" title="Product Name" class="product-image-link">
                                                    <img src="{{$urlPic}}" alt="Product Image" style="width: 200px;height: 250px;" >
                                                </a>
                                                <span class="product-label">-{{ $discount }}%</span>
                                                <a href="{{ $urlDetail }}" class="btn-quick-view">Quick View</a>
                                            </figure>
                                            <h3 class="product-title">
                                                <a href="product.html">{{ $pname }}</a>
                                            </h3>
                                            <div class="product-price-container">
                                                <span class="product-price">{{number_format($price)}} đ</span>
                                            </div><!-- Endd .product-price-container -->
                                        </div><!-- End .product -->
                                    </div><!-- End .product-item -->
                                    @endforeach
                                </div><!-- End .shop-container -->
                            </div><!-- End .shop-row -->
                            <nav aria-label="Page Navigation">
                                    {{ $itemCat->links('vendor.pagination.default') }}
                            </nav>
                        </div><!-- End .col-md-9 -->
                        
@stop