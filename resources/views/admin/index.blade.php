@extends('template.admin.master')
@section('main_content')
            <!-- page head start-->
            <div class="page-head">
                <h3>
                    Dashboard
                </h3>
                {{__("Hello")}}
                {{__("DATA TABLE")}}
                <span class="sub-title">Welcome to SlickLab dashboard</span>
                <div class="state-information">
                    <div class="state-graph">
                        <div id="balance" class="chart"></div>
                        <div class="info">Balance $ 2,317</div>
                    </div>
                    <div class="state-graph">
                        <div id="item-sold" class="chart"></div>
                        <div class="info">Item Sold 1230</div>
                    </div>
                </div>
            </div>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">
                <!--state overview start-->
                <div class="row state-overview">
                    <a href="{{ route('admin.cat.index') }}"">
                        <div class="col-lg-3 col-sm-6">
                            <section class="panel purple">
                                <div class="symbol">
                                    <i class="fa fa-send"></i>
                                </div>
                                <div class="value white">
                                    <h1 class="timer" data-from="0" data-to="{{$countCat}}"
                                        data-speed="1000">
                                        <!--320-->
                                    </h1>
                                    <p>Danh mục</p>
                                </div>
                            </section>
                        </div>
                     </a>
                     <a href="{{ route('admin.product.index') }}"">
                        <div class="col-lg-3 col-sm-6">
                            <section class="panel ">
                                <div class="symbol purple-color">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="value gray">
                                    <h1 class="purple-color timer" data-from="0" data-to="{{$countProduct}}"
                                        data-speed="1000">
                                        <!--123-->
                                    </h1>
                                    <p>Sản phẩm</p>
                                </div>
                            </section>
                        </div>
                     </a>
                     <a href="{{ route('admin.user.index') }}"">
                        <div class="col-lg-3 col-sm-6">
                            <section class="panel green">
                                <div class="symbol ">
                                    <i class="fa fa-cloud-upload"></i>
                                </div>
                                <div class="value white">
                                    <h1 class="timer" data-from="0" data-to="{{$countUser}}"
                                        data-speed="1000">
                                        <!--432-->
                                    </h1>
                                    <p>Người dùng</p>
                                </div>
                            </section>
                        </div>
                     </a>
                    <a href="{{ route('admin.comment.index') }}"">
                        <div class="col-lg-3 col-sm-6">
                            <section class="panel">
                                <div class="symbol green-color">
                                    <i class="fa fa-bullseye"></i>
                                </div>
                                <div class="value gray">
                                    <h1 class="green-color timer" data-from="0" data-to="{{$countComment}}"
                                        data-speed="3000">
                                        <!--2345-->
                                    </h1>
                                    <p>Bình luận</p>
                                </div>
                            </section>
                        </div>
                    </a>
                </div>
                <!--state overview end-->
            </div>
            <!--body wrapper end-->
@stop