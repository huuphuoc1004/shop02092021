@extends('template.admin.master')
@section('main_content')
<div id="page-wrapper" style="margin-left: 20px;">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h2>Sửa phòng</h2>
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
                                <form role="form" method="post" action="{{ route('admin.cat.edit',$catName->cid) }}">
                                	@csrf
                                    <div class="form-group">
                                        <label>Tên loại phòng</label>
                                        <input type="text" name="ten" class="form-control" value="{{$catName->cname}}" />
                                    </div>
                                    <button type="submit" name="submit"  class="btn btn-success btn-md">Sửa</button>
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