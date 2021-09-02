@extends('template.admin.master')
@section('main_content')
            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Quản lý người dùng
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
                                <a style="float:left" href="{{route('admin.user.add')}}" class="btn btn-success btn-md">Thêm</a>
                            </div>
                            <div class="col-sm-5" style="text-align: right;">
                                    <form action="{{route('admin.user.search')}}" method="get">
                                    <input type="text" id="search" name="search" class="form-control input-sm" placeholder="Nhập dữ liệu" style="float:left; width: 300px;" />
                                        <input type="submit" name="submit" value="Tìm kiếm" class="btn btn-warning btn-sm" style="float:right" />
                                    </form><br />
                            </div>
                        </header>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Username</th>
                                <th>Fullname</th>
                                <th width="160px">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $items)
                                @php
                                    $id        = $items->id;
                                    $username   = $items->email;
                                    $fullname   = $items->name;
                                @endphp
                            <tr>
                                <td>{{ $id }}</td>
                                <td>{{ $username }}</td>
                                <td>{{ $fullname }}</td>
                                <td class="center">
                                    <a href="{{route('admin.user.edit', $items->id)}}" title="" class="btn btn-info"><i class="fa fa-edit "></i> Sửa</a>
                                    <a href="{{route('admin.user.del', $items->id)}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table><br/>
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