@extends('template.admin.master')
@section('main_content')
            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Quản lý danh mục
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
            @if (session('msg'))
                <div class="alert alert-success">
                    <p>{{ session('msg') }}</p>
                </div>
            @endif
            @if (session('msg1'))
                <div class="alert alert-t-dark">
                    <p>{{ session('msg1') }}</p>
                </div>
            @endif
            <div class="row">
                <div class="col-sm-12">
                    <section class="panel">
                        <header class="panel-heading head-border">
                            <div class="col-sm-7" style="text-align: left;">
                                <a style="float:left" href="{{route('admin.cat.add')}}" class="btn btn-success btn-md">Thêm</a>
                            </div>
                            <div class="col-sm-5" style="text-align: right;">
                                    <form action="{{route('admin.cat.search')}}" method="get">
                                    <input type="text" id="search" name="search" class="form-control input-sm" placeholder="Nhập dữ liệu" style="float:left; width: 300px;" />
                                        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                    </form><br />
                            </div>
                        </header>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Tên</th>
                                <th width="160px">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $item)
                                @php
									$cid 	= $item->cid;
									$cname	= $item->cname;
								@endphp
                            <tr>
                                <td>{{ $cid }}</td>
                                <td>{{ $cname }}</td>
                                <td class="center">
                                    <a href="{{route('admin.cat.edit', $item->cid)}}" title="" class="btn btn-info"><i class="fa fa-edit "></i> Sửa</a>
                                    <a href="{{route('admin.cat.del', $item->cid)}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </section>
                </div>
                <nav aria-label="Page Navigation">
                    {{ $items->links('vendor.pagination.default') }}
                </nav>
            </div>
        </div>
            <!--body wrapper end-->
@stop