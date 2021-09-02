@extends('template.shop.master')
@section('main_content')


<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            <div class="main">
                <div class="container">
                    <div class="row">
                        @if(Auth::check())
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Shopping Cart</h1>
                                <p>Your cart items</p>
                            </div><!-- End .page-header -->

                            <div class="table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Tên sản phẩm</th>
                                            <th>Giảm giá</th>
                                            <th>Giá</th>
                                            <th>Số lượng</th>
                                            <th>Tổng cộng</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $totalPrice = 0;
                                            $dem        = 0;
                                        @endphp
                                        @foreach ($itemCart as $item)
                                            @php 
                                                $cpid       =   $item->cpid;
                                                $pname      =   $item->pname;
                                                $picture    =   $item->picture;
                                                $urlPic     =   "/storage/app/public/files/".$picture;
                                                $price      =   $item->price;
                                                $discount   =   $item->discount;
                                                $quantity   =   $item->quantity;
                                                $total      =   ($price * (1 - $discount/100))*$quantity;
                                                $totalPrice +=  $total;
                                                $slug       =   Str::slug($pname);
                                                $id         =   $item->pid;
                                                $urlDetail  =   route('shop.product',[$slug,$id]);
                                                $dem        += $quantity;
                                            @endphp
                                        <tr>
                                            <td class="product-col">
                                                <div class="product">
                                                    <figure class="product-image-container">
                                                        <a href="{{$urlDetail}}">
                                                            <img src="{{$urlPic}}" alt="Product" style="width: 200px;height: 200px;">
                                                        </a>
                                                    </figure>
                                                    <h3 class="product-title">
                                                        <a href="{{$urlDetail}}">{{$pname}}</a>
                                                    </h3>
                                                </div><!-- End .product -->
                                            </td>
                                            <td class="price-col">{{$discount}}%</td>
                                            <td class="price-col">{{number_format($price)}} đ</td>
                                            <td class="price-col">
                                                <input class="cart-product-quantity form-control" type="text" value="{{$quantity}}">
                                            </td>
                                            <td class="total-col">{{number_format($total)}} đ</td>
                                            <td class="delete-col"><a href="{{ route('shop.delProduct',$cpid)}}" class="btn-delete" title="Delete product" role="button"></a></td>
                                        </tr>
                                        @endforeach
                                        @php
                                            if(isset($discount_price)){
                                                $totalVND   = $totalPrice - $discount_price;
                                            }
                                            else{
                                                $totalVND   = $totalPrice;
                                            }
                                            $totalPriceUSD = round($totalPrice/23000);
                                        @endphp
                                    </tbody>
                                </table>
                            </div><!-- End .table-responsive -->

                            <div class="row">
                                <div class="col-sm-7">
                                    <div class="cart-discount">
                                        <h3>Mã giảm giá</h3>
                                        <p>Nhập mã giảm giá nếu bạn có.</p>

                                        <form method="post" action="{{route("shop.cart")}}">
                                            @csrf
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="code" placeholder="Nhập mã giảm giá của bạn">
                                                <span class="input-group-btn">
                                                    <input type="submit" class="btn btn-accent pull-right min-width" value="ÁP DỤNG">
                                                </span>
                                            </div>
                                        </form>
                                    </div><!-- End .cart-discount -->
                                    @if (session('msgFail'))
                                                <div class="alert alert-danger">
                                                    <p style="text-align: center">{{ session('msgFail') }}</p>
                                                </div>
                                    @endif
                                    @if (!empty($msgSuccess))
                                                <div class="alert alert-success">
                                                    <p style="text-align: center">{{ $msgSuccess }}</p>
                                                </div>
                                    @endif
                                </div><!-- End .col-sm-7 -->
    <!-- Include the PayPal JavaScript SDK -->
                                <script src="https://www.paypal.com/sdk/js?client-id=sb&currency=USD"></script>

<script>
        // Render the PayPal button into #paypal-button-container
        paypal.Buttons({

            // Set up the transaction
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: {{$totalPriceUSD}}
                        }
                    }]
                })
            },

            // Finalize the transaction
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    // Show a success message to the buyer
                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                });
            }
 

        }).render('#paypal-button-container');
    </script>
                                <div class="col-sm-4 col-sm-offset-1">
                                    <div class="cart-proceed">
                                        <p class="cart-subtotal"><span>Số sản phẩm :</span> <span class="text-accent">{{$dem}} sản phẩm </span></p>
                                        <p class="cart-subtotal"><span>Tổng cộng :</span> <span class="text-accent">{{$totalPrice}} đ </span></p>
                                        <p class="cart-subtotal"><span>Giảm giá :</span> <span class="text-accent"><?php if(isset($discount_price)){
                                                                                                                            echo "-". number_format($discount_price);
                                                                                                                        }
                                                                                                                        else{
                                                                                                                            echo 0;
                                                                                                                        }?> đ</span></p>
                                        <p class="cart-total"><span>Số tiền phải trả :</span> <span class="text-accent">{{number_format($totalVND)}} đ</span></p>
                                        <div id="paypal-button-container"></div>
                                    </div><!-- Endd .cart-proceed -->
                                </div><!-- End .col-sm-4 -->
                            </div><!-- End .row -->
                        </div><!-- End .col-md-9 -->
                        @endif
                        @if(Auth::check() === false)
                            <h1 style="margin: 50px auto;width: 650px;">Bạn phải đăng nhập để mua hàng. Tiến hành <a style="color:red" href="{{route('auth.login')}}">đăng nhập</a></h1>
                        @endif
@stop




<!-- sb-zasgw3971038@personal.example.com
	sb-cekga3974056@business.example.com -->