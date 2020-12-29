@extends('admin.layout.master')
@section('content2')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Danh sách các phòng trọ</h4>
                </div>
            </div>
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.index')}}"><i class="icon-home2 position-left"></i> Trang chủ</a></li>
                    <li class="active">Trang quản lý danh sách phòng trọ</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="panel panel-flat">
                        <div class="panel-heading">
                            <h5 class="panel-title">Danh sách các phòng trọ <span class="badge badge-primary">{{$motelrooms->count()}}</span></h5>
                        </div>
                        <div class="panel-body">
                            Các <code>Tài khoản</code> được liệt kê tại đây. <strong>Dữ liệu đang cập nhật.</strong>
                        </div>
                        @if(session('thongbao'))
                            <div class="alert bg-success">
                                <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span></button>
                                <span class="text-semibold">Well done!</span>  {{session('thongbao')}}
                            </div>
                        @endif
                        <table class="table datatable-show-all">
                            <thead>
                            <tr class="bg-blue">
                                <th>ID</th>
                                <th>Tiêu đề</th>
                                <th>Danh mục</th>
                                <th>Giá phòng</th>
                                <th>Trạng thái</th>
                                <th class="text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($motelrooms as $room)
                                <tr>
                                    <td>{{$room->id}}</td>
                                    <td><a href="{{route('phongtro.view',['slug'=>$room->ac_title_slug])}}" target="_blank"> {!! substr($room->acc_title, 0, 40) . '...' !!}</a></td>
                                    <td>{{$room->category->name}}</td>

                                    <td>{{number_format($room->acc_price)}} vnđ</td>
                                    <td>
                                        @if($room->approve == 1)
                                            <span class="label label-success">Đã kiểm duyệt</span>
                                        @elseif($room->tinhtrang == 0)
                                            <span class="label label-danger">Chờ Phê Duyệt</span>
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <ul class="icons-list">
                                            <li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                                    <i class="icon-menu9"></i>
                                                </a>
                                                <ul class="dropdown-menu dropdown-menu-right">
                                                    @if($room->approve == 1)
                                                        <li><a href="{{url('admin/motelrooms/unapprove')}}/{{$room->id}}" onclick="return confirm('Bạn có muốn Ẩn bài viết này không?');"><i class="icon-file-pdf"></i> Ẩn bài viết</a></li>
                                                    @elseif($room->approve == 0)
                                                        <li><a href="{{url('admin/motelrooms/approve')}}/{{$room->id}}" onclick="return confirm('Bạn có muốn phê duyệt bài viết này không?');"><i class="icon-file-pdf" ></i> Kiểm duyệt</a></li>
                                                    @endif
                                                    <li><a href="{{url('admin/motelrooms/del')}}/{{$room->id}}" onclick="return confirm('Bạn có muốn xóa bài viết này không?');"><i class="icon-file-excel"></i> Xóa</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="footer text-muted">
                &copy; 2020. <a href="#">Project Phòng trọ </a> by <a href="" target="_blank">Phát triển ứng dụng web </a>
            </div>
        </div>
    </div>
@endsection
