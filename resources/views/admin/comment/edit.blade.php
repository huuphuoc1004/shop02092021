
@extends('template.admin.master')
@section('main_content')
<div id="page-wrapper" style="margin-left: 20px;">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa bình luận</h2>
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
                                <form role="form" method="post" action="{{ route('admin.comment.edit',$product->cmt_id)}}">
                                	@csrf
                                    <div class="form-group">
                                        <label>Sản phẩm</label>
                                        <select class="form-control" name="cname">
                                            @foreach ($productAll as $item)
                                        		@php
                                        			$select = '';
                                        			$pid    = $item->pid;
                                        			$pname = $item->pname;
                                        		@endphp
                                        		@if ($pid == $product->pid)
                                        			@php
                                        				$select = 'selected = "selected"';
                                        			@endphp
                                        		@endif
                                                <option value="{{$pid}}" {{$select}}>{{$pname}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Comment</label>
                                        <input type="text" name="comment" class="form-control" value="{{$product->comment}}" />
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
                                    <button type="submit" name="submit"  class="btn btn-success btn-md">Sửa</button>
                                </form>

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