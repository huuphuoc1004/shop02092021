@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Reset Password </h1>
                            </div><!-- End .page-header -->

                            <form class="signin-form"  method="post" action="{{route('mail.reset_password')}}" >
                                @csrf
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="text" name="email" class="form-control" required>
                                </div><!-- End .form-group -->
                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        <p>{{ session('error') }}</p>
                                    </div>
                                @endif
                                @if (session('errors'))
                                    <div class="alert alert-danger">
                                        <p>{{ session('error') }}</p>
                                    </div>
                                @endif
                                @if (session('message'))
                                    <div class="alert alert-success">
                                        <p>{{ session('message') }}</p>
                                    </div>
                                @endif
                                <div class="clearfix form-action">
                                    <input type="submit" class="btn btn-accent pull-right min-width" value="Submit">
                                </div><!-- End .form-action -->
                            </form>
                            
                        </div><!-- End .col-md-9 -->


@stop