@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Nhập mật khẩu mới </h1>
                            </div><!-- End .page-header -->
                            <?php
                                $email = $_GET['email'];
                                $token = $_GET['token'];
                            ?>
                            <form class="signin-form"  method="post" action="" >
                                @csrf
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                    <input type="hidden" name="email" class="form-control" value="{{$email}}" required>
                                    <input type="hidden" name="token" class="form-control" value="{{$token}}" required>
                                </div><!-- End .form-group -->
                                <div class="clearfix form-action">
                                    <input type="submit" class="btn btn-accent pull-right min-width" value="Đổi mật khẩu">
                                </div><!-- End .form-action -->
                            </form>
                        </div><!-- End .col-md-9 -->


@stop