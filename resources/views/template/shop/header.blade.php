<!-- HEADER -->
<!DOCTYPE html>
<html>
    
<!-- Mirrored from obest.org/html/shopo/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 17 Sep 2018 06:38:00 GMT -->
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1"> <!-- Ensures optimal rendering on mobile devices. -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" /> <!-- Optimal Internet Explorer compatibility -->
        <title>Shopo - eCommerce Template</title>
        <meta name="description" content="Premium eCommerce Template">

        <!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Google Fonts -->
        <link href="http://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700%7COswald:300,400,500,600,700" rel="stylesheet">
        <link rel="stylesheet" href="{{ $publicUrl }}/css/plugins.min.css">
        <link rel="stylesheet" href="{{ $publicUrl }}/css/style.css">
        
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ $publicUrl }}/images/icons/favicon.png">

        <!-- Modernizr -->
        <script src="{{ $publicUrl }}/js/modernizr.js"></script>
    </head>
    <body>
        <script src="https://www.paypal.com/sdk/js?client-id=SB_CLIENT_ID"> // Required. Replace SB_CLIENT_ID with your sandbox client ID.
        </script>
        <div id="wrapper">
            <header class="header sticky-header">
                <div class="container">
                    <a href="{{route('shop.index')}}" class="site-logo" title="Shopo - eCommerce Template">
                        <img src="{{ $publicUrl }}/images/logo.png" alt="Logo">
                        <span class="sr-only">Shopo - eCommerce Template</span>
                    </a>

                    <div class="header-dropdowns">
                        <div class="dropdown header-dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                USD
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" title="Euro">EUR</a></li>
                                <li><a href="#" title="Pound">PND</a></li>
                                <li><a href="#" title="Yen">YEN</a></li>
                            </ul>
                        </div><!-- End .dropddown -->

                        <div class="dropdown header-dropdown">
                            <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                ENG
                                <i class="fa fa-caret-down"></i>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="#" title="Spanish">SPA</a></li>
                                <li><a href="#" title="Turkish">TUR</a></li>
                                <li><a href="#" title="German">GER</a></li>
                            </ul>
                        </div><!-- End .dropddown -->
                    </div><!-- End .header-dropdowns -->

                    <div class="search-form-container">
                        <a href="#" class="search-form-toggle" title="Toggle Search"><i class="fa fa-search"></i></a>
                        <form action="#">
                            <div class="dropdown search-dropdown">
                                <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                                   Danh mục
                                    <i class="fa fa-caret-down"></i>
                                </a>
                                <ul class="dropdown-menu">
                                    @foreach($itemsCat as $item)
                                            @php
                                                $id = $item->cid;
                                                $cname = $item->cname;
                                                $slug  = Str::slug($cname);
                                                $urlCat  = route('shop.cat',[$slug,$id]);
                                            @endphp
                                    <li><a href="{{$urlCat}}">{{$cname}}</a></li>
                                    @endforeach
                                </ul>
                            </div><!-- End .dropddown -->
                            <input type="search" class="form-control" placeholder="Tìm kiếm" required>
                            <button type="submit" title="Search" class="btn"><i class="fa fa-search"></i></button>
                        </form>
                    </div><!-- End .search-form-container -->

                    <ul class="top-links">
                    @php
                        if(Auth::check()){
                            $user 		= Auth::user();
                            $username 	= $user->email;
                            $fullname 	= $user->name;
                            $hello      = 'Xin chào, '.$fullname;
                            $text 		= "Đăng xuất";
                            $url  		= route('auth.logout');
                        }else{
                            $hello 	    = "";
                            $text 		= "Đăng nhập";
                            $url  		= route('auth.login');
                        }
                    @endphp
                        <li>{{$hello}} </li>
                        <li><a href="{{route('shop.cart')}}">Giỏ hàng</a></li>
                    </ul>

                    <div class="dropdown cart-dropdown">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false">
                            <span class="cart-icon">
                                <img src="{{ $publicUrl }}/images/bag.png" alt="Cart">
                                <span class="cart-count">{{$countCart}}</span>
                            </span>
                            <i class="fa fa-caret-down"></i>
                        </a>
                        @if(Auth::check())
                        <div class="dropdown-menu dropdown-menu-right">
                            <p class="dropdown-cart-info">Bạn có {{$countCart}} sản phẩm trong giỏ hàng.</p>
                            <div class="dropdown-menu-wrapper">
                                        @php
                                            $totalPrice = 0;
                                        @endphp
                                @foreach ($itemCart as $item)
                                    @php
                                        $cpid           = $item->cpid;
                                        $pname       =  $item->pname;
                                        $price          =  $item->price;
                                        $quantity       =  $item->quantity;
                                        $discount       =   $item->discount;
                                        $total           =   ($price * (1 - $discount/100))*$quantity;
                                        $totalPrice     +=  $total;
                                        $picture    =  $item->picture;
                                        $urlPic     = "/storage/app/public/files/".$picture;
                                        $slug       = Str::slug($pname);
                                        $id         = $item->pid;
                                        $urlDetail  = route('shop.product',[$slug,$id]);
                                    @endphp
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="{{$urlDetail}}" title="Product Name">
                                            <img src="{{ $urlPic }}" alt="Product Image">
                                        </a>
                                    </figure>

                                    <div>
                                        <a href="{{route('shop.delProduct',$cpid)}}" class="btn-delete" title="Delete product" role="button"></a>
                                        <h4 class="product-title"><a href="{{$urlDetail}}">{{$pname}}</a></h4>
                                        <div class="product-price-container">
                                            <span class="product-price">{{$price}}</span>
                                        </div>
                                        <div class="product-qty">x{{$quantity}}</div><!-- End .product-qty -->
                                    </div><!-- End .product-image-container -->
                                </div><!-- End .product- -->
                                @endforeach
                            </div><!-- End .droopdowm-menu-wrapper -->

                            <div class="cart-dropdowm-action">
                                <div class="dropdowm-cart-total"><span>TOTAL:</span> {{number_format($totalPrice)}} đ</div>
                                <a href="{{route('shop.cart')}}" class="btn btn-primary">Checkout</a>
                            </div><!-- End .cart-dropdown-action -->
                        </div><!-- End .dropdown-menu -->
                        @endif
                    </div><!-- End .cart-dropddown -->

                    <a href="#" class="sidemenu-btn" title="Menu Toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </div><!-- End .container-fluid -->
            </header><!-- End .header -->
            <aside class="sidemenu">

                <div class="sidemenu-wrapper">
                    <div class="sidemenu-header">
                        <a href="index.html" class="sidemenu-logo">
                            <img src="{{ $publicUrl }}/images/logo.png" alt="logo">
                        </a>
                    </div><!-- End .sidemenu-header -->

                    <ul class="metismenu">
                        <li><a href="{{route('shop.index')}}">Trang chủ</a></li>
                        <li>
                            <a href="#" aria-expanded="false">Giới thiệu <span class="sidemenu-icon"></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{route('shop.about')}}">Giới thiệu</a></li>
                                <li><a href="{{route('shop.error')}}">404 Page</a></li>
                                <li><a href="{{route('shop.contact')}}">Liên hệ</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" aria-expanded="false">Cửa hàng <span class="sidemenu-icon"></span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/danh-muc/ao-quan_1">Danh mục</a></li>
                                <li><a href="{{route('shop.cart')}}">Giỏ hàng</a></li>
                                @if(Auth::check() === false)
                                <li><a href="{{route('auth.login')}}">Đăng nhập</a></li>
                                <li><a href="{{route('auth.signup')}}">Đăng ký</a></li>
                                @endif
                            </ul>
                        </li>
                        <li><a href="{{route('shop.blog')}}">Blog</a></li>
                        <li><a href="{{$url}}">{{$text}}</a></li>
                    </ul>
                </div><!-- End .sidemenu-wrapper -->
            </aside><!-- End .sidemenu -->


<!-- ENDHEADER -->