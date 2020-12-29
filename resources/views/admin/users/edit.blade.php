@extends('admin.layout.master')
@section('content2')
    <!-- Main content -->
    <div class="content-wrapper">
        <!-- Page header -->
        <div class="page-header page-header-default">
            <div class="page-header-content">
                <div class="page-title">
                    <h4><i class="icon-arrow-left52 position-left"></i> <span class="text-semibold">Home</span> - Trang
                        Chỉnh sửa thông tin thành viên</h4>
                </div>
            </div>
            <div class="breadcrumb-line">
                <ul class="breadcrumb">
                    <li><a href="{{route('admin.index')}}"><i class="icon-home2 position-left"></i> Trang chủ</a></li>
                    <li><a href="{{route('admin.users.list')}}">Danh sách thành viên</a></li>
                    <li class="active">Trang Chỉnh sửa thông tin thành viên</li>
                </ul>
            </div>
        </div>
        <!-- /page header -->
        <div class="content">
            <div class="row">
                <div class="col-md-8">
                    <div class="content-group border-top-lg border-top-primary">
                        <!-- Basic datatable -->
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span class="badge badge-primary">{{$user->name}}</span> Chỉnh
                                    sửa Tài Khoản </h5>
                            </div>
                            <div class="panel-body">

                                <div style="margin-bottom:10px; "></div>
                                @if(count($errors)>0)
                                    <div class="alert bg-danger">
                                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                                class="sr-only">Close</span></button>
                                        <span class="text-semibold">Lỗi!</span><br>
                                        @foreach($errors->all() as $err)
                                            {{$err}}<br>
                                        @endforeach
                                    </div>
                                @endif
                                @if(session('thongbao'))
                                    <div class="alert bg-success">
                                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span
                                                class="sr-only">Close</span></button>
                                        <span class="text-semibold">Well done!</span> {{session('thongbao')}}
                                    </div>
                                @endif
                                <form action="{{ route('admin.user.edit', ['id'=> $user->id])}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Email</label>
                                            <div class="col-lg-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="icon-git-pull-request"></i></span>
                                                    <input type="email" readonly="" value="{{$user->email}}"
                                                           name="email" class="form-control" placeholder="Nhập email">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label col-lg-2">Name</label>
                                            <div class="col-lg-10">
                                                <div class="input-group">
                                                    <span class="input-group-addon"><i
                                                            class="icon-git-pull-request"></i></span>
                                                    <input type="text" readonly="" value="{{$user->name}}" name="email"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Chọn quyền:</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" name="Quyen">
                                                    <option
                                                        @if($user->right == 1)
                                                        selected=""
                                                        @endif
                                                        value="1">Quản trị viên
                                                    </option>
                                                    <option
                                                        @if($user->right == 0)
                                                        selected=""
                                                        @endif
                                                        value="0">Người dùng
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-lg-2 control-label">Trạng thái:</label>
                                            <div class="col-lg-10">
                                                <select class="form-control" name="status">
                                                    <option
                                                        @if($user->status == 1)
                                                        selected=""
                                                        @endif
                                                        value="1">Kích hoạt
                                                    </option>
                                                    <option
                                                        @if($user->status == 0)
                                                        selected=""
                                                        @endif
                                                        value="0">Tạm khóa
                                                    </option>
                                                </select>
                                            </div>
                                        </div>
                                        <input type="submit" style="margin-top:20px" value="Chỉnh sửa"
                                               class="btn btn-success btn-rounded">
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="content-group border-top-lg border-top-danger">
                        <div class="panel panel-flat">
                            <div class="panel-heading">
                                <h5 class="panel-title"><span class="badge badge-primary"></span> Chú ý </h5>
                                <div class="heading-elements">
                                    <ul class="icons-list">
                                        <li><a data-action="collapse"></a></li>
                                        <li><a data-action="reload"></a></li>
                                        <li><a data-action="close"></a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-body">
                                <span class="badge badge-success" style="margin-bottom: 5px">Admin co quyen la quan tri vien</span>
                                <span class="badge badge-danger" style="margin-bottom: 5px">User quyen la nguoi dung</span>
                                <span
                                    class="badge badge-primary">Nếu tài khoản vi phạm hãy khóa lại</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer -->
            <div class="footer text-muted">
                &copy; 2020. <a href="#">Project Phòng trọ </a> by <a href="" target="_blank">Du an </a>
            </div>
            <!-- /footer -->
        </div>
    </div>
@endsection
