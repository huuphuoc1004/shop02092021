@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            @php
                                $ratingWidth    = "style = width:{$rating}%";
                                $pname          = $itemProduct->pname;
                                $slug           = Str::slug($pname);
                                $price          = $itemProduct->price;
                                $discount       = $itemProduct->discount;
                                $pricing        = $price * (1 - $discount/100);
                                $picture        = $itemProduct->picture;
                                $urlPic         = "/storage/app/public/files/".$picture;
                                $description    = $itemProduct->description;
                            @endphp
                            <div class="row">
                                <div class="product-gallery-container">
                                    <div class="product-zoom-wrapper">
                                        <div class="product-zoom-container">
                                        <img style="width: 500px;height: 700px" class="xzoom" id="product-zoom" src="{{ $urlPic }}" data-xoriginal="{{ $urlPic }}" alt="Zoom image"/>
                                        </div><!-- End .product-zoom-container -->
                                    </div><!-- End .product-zoom-wrapper -->
                                </div><!-- End .product-gallery-container -->

                                <div class="product-details">
                                    <h2 class="product-title">{{ $pname }}</h2>
                                    
                                    <div class="product-meta-row">
                                        <div class="product-price-container">
                                            <span class="product-price">{{number_format($pricing)}} đ</span>
                                        </div><!-- Endd .product-price-container -->
                                                    
                                        <div class="product-ratings-wrapper">
                                            <div class="ratings-container">
                                                <div class="product-ratings">
                                                    <span class="ratings" {{$ratingWidth}}></span><!-- End .ratings -->
                                                </div><!-- End .product-ratings -->{{round($rating/20,1)}}
                                            </div><!-- End .ratings-container -->
                                            <a class="ratings-link" href="#reviews" title="Reviews">{{$dem}} Reviews</a>
                                        </div><!-- End .product-ratings-wrapper -->
                                    </div><!-- End .product-meta-row -->

                                    <div class="product-action">
                                        <div class="product-quantity">
                                        <form role="form" method="post" action="{{route('shop.addtobag',['id'=>$id])}}">
                                	    @csrf
                                            <label>Số lượng:</label>
                                            <input class="single-product-quantity form-control" name="quantity" type="text"><br/>
                                            @if(Auth::check())
                                            <input type="submit" class="btn btn-accent btn-addtobag" value="Thêm vào giỏ hàng"></a>
                                            @endif
                                        </form>
                                        </div><!-- end .product-quantity -->
                                        
                                        
                                    </div><!-- End .product-action -->
                                </div><!-- End .product-details -->
                            </div><!-- End .row -->

                            <div class="product-details-tab">
                                <!-- Nav tabs -->
                                <ul class="nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Mô tả</a></li>
                                    <li role="presentation"><a href="#reviews" aria-controls="reviews" role="tab" data-toggle="tab">Đánh giá</a></li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="description">
                                        {!!$description!!}
                                    </div><!-- End .tab-pane -->
                                    <div role="tabpanel" class="tab-pane" id="reviews">
                                        <div class="product-reviews comments">
                                            <ul class="comments-list media-list">
                                                <li class="media">
                                                @if (Session::has('msg'))
                                                    <h4 style = 'color: red'>{{Session::get('msg')}}</h4>
                                                @endif

                                                @foreach ($commentProduct as $commentP)
                                                @php
                                                    $username   = $commentP->email;
                                                    $comment    = $commentP->comment;
                                                    $rating     = ($commentP->rating) * 20;
                                                    $ratingWidth = "style = width:{$rating}%"
                                                @endphp
                                                    <div class="comment">
                                                        <div class="media-left">
                                                            <img class="media-object" src="{{ $publicUrl }}/images/blog/user.png" alt="User">
                                                        </div><!-- End .media-left -->
                                                        <div class="media-body">
                                                            <h4 class="media-heading">{{$username}}</h4>
                                                            <div class="ratings-container">
                                                                <div class="product-ratings">
                                                                    <span class="ratings" {{$ratingWidth}}></span><!-- End .ratings -->
                                                                </div><!-- End .product-ratings -->
                                                            </div><!-- End .ratings-container -->
                                                            <p>{{$comment}}</p>
                                                        </div><!-- End .media-body -->
                                                    </div><!-- End .comment -->
                                                @endforeach
                                                </li>
                                            </ul>
                                        </div><!-- End .comments -->
                                        <div class="review-form-container">
                                            <h3>Đánh giá của bạn</h3>
                                            <form action="{{ route('shop.product',[$slug,$id]) }}" method="post">
                                                @csrf
                                                <label>Đánh giá sao</label>
                                                <div class="form-group clearfix">
                                                    <fieldset class="rate-field">
                                                        <input type="radio" id="star5" name="rating" value="5" >
                                                        <label for="star5" title="5 stars"></label>

                                                        <input type="radio" id="star4" name="rating" value="4" checked>
                                                        <label for="star4" title="4 stars"></label>

                                                        <input type="radio" id="star3" name="rating" value="3">
                                                        <label for="star3" title="3 stars"></label>

                                                        <input type="radio" id="star2" name="rating" value="2">
                                                        <label for="star2" title="2 stars"></label>

                                                        <input type="radio" id="star1" name="rating" value="1">
                                                        <label for="star1" title="1 star"></label>
                                                    </fieldset>
                                                </div><!-- End .form-group -->

                                                <div class="form-group mb20">
                                                    <label>Bình luận</label>
                                                    <textarea cols="30" rows="5" name="comment" class="form-control"></textarea>
                                                </div>

                                                <div class="text-right">
                                                @if(Auth::check())
                                                    <input type="submit" class="btn btn-accent min-width" value="Submit">
                                                @endif
                                                @if(Auth::check()===false)
                                                    <h2 style="color: red">Bạn phải đăng nhập để có thể bình luận</h2>
                                                @endif
                                                </div>
                                            </form>
                                        </div><!-- End #respond -->
                                    </div><!-- End .tab-pane -->
                                </div>
                            </div><!-- End .product-details-tab -->
                            
                            <h3 class="carousel-title">Also Purchased</h3>
                            <div class="owl-data-carousel owl-carousel"
                            data-owl-settings='{ "items":4, "nav": true, "dots":false }'
                            data-owl-responsive='{ "480": {"items": 2}, "768": {"items": 3}, "992": {"items": 3}, "1200": {"items": 4} }'>
                                @foreach ($itemAlsoProduct as $item)
                                    @php 
                                        $pictureAlso    = $item->picture;
                                        $urlPicAlso     = "/storage/app/public/files/".$pictureAlso;
                                        $discountAlso   = $item->discount;
                                        $pnameAlso      = $item->pname;
                                        $priceAlso      = $item->price;
                                        $slug           = Str::slug($pnameAlso);
                                        $id             = $item->pid;
                                        $urlDetail      = route('shop.product',[$slug,$id]);
                                    @endphp
                                <div class="product">
                                    <figure class="product-image-container">
                                        <a href="{{$urlDetail}}" title="Product Name" class="product-image-link">
                                            <img class="owl-lazy" style="width: 200px;height: 250px;" src="{{$urlPicAlso}}" data-src="{{$urlPicAlso}}" alt="Product Image">
                                        </a>
                                        <span class="product-label">-{{$discountAlso}}%</span>
                                        <a href="#" class="btn-quick-view">Quick View</a>

                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-wishlist" title="Add to Wishlist">
                                                <i class="icon-product icon-heart"></i>
                                            </a>
                                            <a href="#" class="btn-product btn-add-cart" title="Add to Bag">
                                                <i class="icon-product icon-bag"></i>
                                                <span>Add to Bag</span>
                                            </a>
                                            <a href="#" class="btn-product btn-compare" title="Add to Compare">
                                                <i class="icon-product icon-bar"></i>
                                            </a>
                                        </div><!-- End .product-action -->
                                    </figure>
                                    <h3 class="product-title">
                                        <a href="product.html">{{$pnameAlso}}</a>
                                    </h3>
                                    <div class="product-price-container">
                                        <span class="product-price">{{number_format($priceAlso)}} đ</span>
                                    </div><!-- Endd .product-price-container -->
                                </div><!-- End .product -->
                                @endforeach
                            </div><!-- End .owl-data-carousel -->

                            <div class="mb50"></div><!-- margin -->
                        </div><!-- End .col-md-9 -->
@stop