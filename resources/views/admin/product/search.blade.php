@extends('template.admin.master')
@section('main_content')
            <!-- page head start-->
            <div class="page-head">
                <h3 class="m-b-less">
                    Quản lý sản phẩm
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
                                <a style="float:left" href="{{route('admin.product.add')}}" class="btn btn-success btn-md">Thêm</a>
                            </div>
                            <div class="col-sm-5" style="text-align: right;">
                                    <form action="{{route('admin.product.search')}}" method="get">
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
                                <th>Loại</th>
                                <th>Mô tả</th>
                                <th>Giá</th>
                                <th>Giảm giá</th>
                                <th>Hình ảnh</th>
                                <th width="160px">Chức năng</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($items as $items)
                                @php
									$pid 			    = $items->pid;
                                    $pname				= $items->pname;
                                    $cname              = $items->cname;
                                    $description        = $items->description;
                                    $price              = $items->price;
                                    $discount           = $items->discount;
                                    $picture            = $items->picture;
                                    $urlPic             = "/storage/app/public/files/".$picture;
								@endphp
                            <tr>
                                <td>{{ $pid }}</td>
                                <td>{{ $pname }}</td>
                                <td>{{ $cname }}</td>
                                <td>{{ $description }}</td>
                                <td>{{ $price }}</td>
                                <td>{{ $discount }}</td>
                                <td><img src="{{$urlPic}}" style="width: 150px;height: 150;"/></td>
                                <td class="center">
                                    <a href="{{ route('admin.product.edit',$items->pid)}}" title="" class="btn btn-success"><i class="fa fa-edit "></i> Sửa</a>
                                    <a href="{{ route('admin.product.del',$items->pid)}}" title="" class="btn btn-danger"><i class="fa fa-pencil"></i> Xóa</a>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        @if (count($items) == 0)
                               <h3 style="color:red; text-align: center;">Không tìm thấy dữ liệu phù hợp</h3>
                        @endif
                    </section>
                </div>
            </div>
        </div>
            <!--body wrapper end-->
@stop