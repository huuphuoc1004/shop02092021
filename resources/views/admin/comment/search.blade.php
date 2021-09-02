@extends('template.admin.master')
@section('main_content')
            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Quản lý bình luận
                </h3>
                <!--<span class="sub-title">Welcome to Static Table</span>-->
                <div class="state-information">
                    <ol class="breadcrumb m-b-less bg-less">
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Data Table</a></li>
                        <li class="active">Static Table</li>
                    </ol>
                </div>
            </div>
            <!-- page head end-->

            <!--body wrapper start-->
            <div class="wrapper">

            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading head-border">
                            <div class="col-sm-7" style="text-align: left;">
                                <a style="float:left" href="{{route('admin.comment.add')}}" class="btn btn-success btn-md">Thêm</a>
                            </div>
                            <div class="col-sm-5" style="text-align: right;">
                                    <form action="{{route('admin.comment.search')}}" method="get">
                                    <input type="text" id="search" name="search" class="form-control input-sm" placeholder="Nhập dữ liệu" style="float:left; width: 300px;" />
                                        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                    </form><br />
                            </div>
                        </header>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Bình luận</th>
                                <th>Sản phẩm</th>
                                <th>Email</th>
                                <th>Đánh giá sao</th>
                                <th width="160px">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($items as $items)
                                @php 
                                    $cmt_id     = $items->cmt_id;
                                    $comment    = $items->comment;
                                    $pname      = $items->pname;
                                    $rating     = $items->rating;
                                @endphp
                                <tr>
                                    <td>{{ $cmt_id }}</td>
                                    <td>{{ $comment }}</td>
                                    <td>{{ $pname }}</td>
                                    <td>{{ $rating }}</td>
                                    <td class="center">
                                        <a href="{{route('admin.comment.edit', $items->cmt_id)}}" title="" class="btn btn-info"><i class="fa fa-edit "></i> Sửa</a>
                                        <a href="{{route('admin.comment.del', $items->cmt_id)}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if ($count == 0)
                            <div class="alert alert-success">
                                <p style="text-align: center">Không tìm thấy dữ liệu phù hợp</p>
                            </div>
                        @endif
                    </section>
                </div>
            </div>
        </div>
            <!--body wrapper end-->
@stop