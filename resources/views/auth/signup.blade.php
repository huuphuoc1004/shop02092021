@extends('template.shop.master')
@section('main_content')
<div class="sidemenu-overlay"></div><!-- End .sidemenu-overlay -->
            
            <div class="main">
                <div class="container">
                    <div class="row">
                        <div class="col-md-9 col-md-push-3">
                            <div class="page-header text-center">
                                <h1>Sign Up</h1>
                                <p>Create a New Account</p>
                            </div><!-- End .page-header -->

                            <form  method="post" action="{{ route('auth.signup')}}" class="signup-form">
							@csrf
                                <div class="row">
                                	<div class="col-sm-4">
                                		<div class="form-group">
		                                    <label>FullName</label>
		                                    <input type="text" name="fullname" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-4 -->

                                	<div class="col-sm-4">
                                		<div class="form-group">
		                                    <label>Username</label>
		                                    <input type="text" name="username" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-4 -->
									<div class="col-sm-4">
                                		<div class="form-group">
		                                    <label>Password</label>
		                                    <input type="password" name="password" class="form-control" required>
		                                </div><!-- End .form-group -->
                                	</div><!-- End .col-sm-4 -->
                                </div><!-- End .row -->
								@if (Session::has('msg'))
										<p style="color:red">{{Session::get('msg')}}</p>
								@endif
                                <div class="clearfix form-action">
                                    <input type="submit" class="btn btn-primary min-width" value="SIGN Up">
                                </div><!-- End .form-action -->
                            </form>
                        </div><!-- End .col-md-9 -->

@stop