@extends('template.admin.master')
@section('main_content')
<div id="page-wrapper" style="margin-left: 20px;">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Thêm sản phẩm</h2>
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
                                <form style="padding-bottom: 50px;" role="form" method="post" action="{{route('admin.product.add')}}" enctype='multipart/form-data'>
                                	@csrf
                                    <div class="form-group">
                                        <label>Tên sản phẩm</label>
                                        <input type="text" name="name" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Mô tả</label>
                                        <textarea name="description" id="description" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label><h3>Loại hàng</h3></label>
                                        <select class="form-control" name="type">
                                        	@foreach ($items as $item)
                                        		@php
                                        			$cid    = $item->cid;
                                        			$cname  = $item->cname;
                                        		@endphp
                                                <option value="{{$cid}}">{{$cname}}</option>
                                            @endforeach
                                            </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Giá sản phẩm</label>
                                        <input type="text" name="price" class="form-control" />
                                    </div>
                                    <div class="form-group">
                                        <label>Giảm giá</label>
                                        <input type="text" name="discount" class="form-control" />
                                    </div>
                                     <div class="form-group">
                                        <label>Hình ảnh</label>
                                        <input type="file" name="hinhanh" class="form-control" multiple="multiple"/>
                                    </div>
                                    <button type="submit" name="submit"  class="btn btn-success btn-md">Thêm</button>
                                </form>
                                <script>
										 CKEDITOR.replace( 'description',
											{
												filebrowserBrowseUrl : '{{ $adminUrl }}/ckfinder/ckfinder.html',
												filebrowserImageBrowseUrl : '{{ $adminUrl }}/ckfinder/ckfinder.html?type=Images',
												filebrowserFlashBrowseUrl : '{{ $adminUrl }}/ckfinder/ckfinder.html?type=Flash',
												filebrowserUploadUrl : '{{ $adminUrl }}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
												filebrowserImageUploadUrl : '{{ $adminUrl }}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
												filebrowserFlashUploadUrl : '{{ $adminUrl }}/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
											});
								</script>
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