@extends('template.admin.master')
@section('main_content')
<div id="page-wrapper" style="margin-left: 20px;">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm bình luận</h2>
            </div>
        </div>
        <!-- /. ROW  -->
        <hr />
        <div class="row">
            <div class="col-md-12">
                <!-- Form Elements -->
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="row">
                           <div class="col-md-12">
							@if ($errors->any())
							    <div class="alert alert-danger">
							        <ul>
							            @foreach ($errors->all() as $error)
							                <li>{{ $error }}</li>
							            @endforeach
							        </ul>
							    </div>
							@endif
                                <form role="form" method="post" action="{{ route('admin.comment.add')}}">
                                	@csrf
                                    <div class="form-group">
                                        <label><h3>Sản phẩm</h3></label>
                                        <select class="form-control" name="cname">
                                        	@foreach ($items as $item)
                                        		@php
                                        			$pid    = $item->pid;
                                        			$pname  = $item->pname;
                                        		@endphp
                                                <option value="{{$pid}}">{{$pname}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <input type="text" name="comment" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Rating</label>
                                        <select class="form-control" name="rating">
                                            <option value="0.5">0.5</option>
                                            <option value="1">1</option>
                                            <option value="1.5">1.5</option>
                                            <option value="2.5">2</option>
                                            <option value="3">3</option>
                                            <option value="3.5">3.5</option>
                                            <option value="4">4</option>
                                            <option value="4.5">4.5</option>
                                            <option value="5" selected = "selected">5</option>
                                        </select>
                                    </div>
                                    <button type="submit" name="submit"  class="btn btn-success btn-md">Thêm</button>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End Form Elements -->
            </div>
        </div>
        <!-- /. ROW  -->
    </div>
    <!-- /. PAGE INNER  -->
</div>
<!-- /. PAGE WRAPPER  -->
@stop