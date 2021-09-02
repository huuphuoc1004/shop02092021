@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Sign in</h1>
                                <p>Signin To Your Account</p>
                            </div><!-- End .page-header -->
                            <form class="signin-form"  method="post" action="{{route('auth.login')}}" >
                                @csrf
                                @if (session('message'))
                                <div class="alert alert-success">
                                    <p>{{ session('message') }}</p>
                                </div>
                                @endif
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div><!-- End .form-group -->

                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" name="password" class="form-control" required>
                                </div><!-- End .form-group -->
                                @if (Session::has('msg'))
										<span style="color:red">{{Session::get('msg')}}</span><br/>
								@endif
                                @if (Session::has('msg1'))
										<span style="color:red">{{Session::get('msg1')}}</span><br/>
								@endif
                                <br/>
                                <div class="clearfix form-more">
                                    <div class="checkbox pull-left">
                                        <label>
                                            <input type="checkbox" name="remember">
                                            <span class="checkbox-box"><span class="check"></span></span>
                                            Remember Me 
                                        </label>
                                    </div><!-- End .checkbox -->
                                    <div class="checkbox pull-right">
                                        <label>
                                            <a href="{{route('mail.forget_password')}}">Quên mật khẩu</a>
                                        </label>
                                    </div><!-- End .checkbox -->
                                    <!-- <a href="#" class="help-link">LOST YOUR PASSWORD?</a> -->
                                </div><!-- End .form-more -->

                                <div class="clearfix form-action">
                                    <a href="{{route('auth.signup')}}" class="btn btn-primary pull-left min-width">CREATE ACCOUNT</a>

                                    <input type="submit" class="btn btn-accent pull-right min-width" value="SIGN IN">
                                </div><!-- End .form-action -->
                            </form>
                        </div><!-- End .col-md-9 -->
@stop