<!-- Main sidebar -->
<div class="sidebar sidebar-main">
    <div class="sidebar-content">
        <!-- User menu -->
        <div class="sidebar-user">
            <div class="category-content">
                <div class="media">
                    <div class="media-body pt-5">
                        <span class="media-heading text-semibold">{{ Auth::user()->name }}</span>
                        <div class="text-size-mini text-muted">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /user menu -->
        <!-- Main navigation -->
        <div class="sidebar-category sidebar-category-visible">
            <div class="category-content no-padding">
                <ul class="navigation navigation-main navigation-accordion">
                    <!-- Main -->
                    <li class="navigation-header"><span>QUẢN TRỊ</span> <i class="icon-menu" title="Main pages"></i></li>
                    <li><a href="{{url('admin/motelrooms/list')}}"><i class="icon-home4"></i> <span>Danh sách Phòng trọ</span></a></li>
                    <li><a href="{{url('admin/users/lis')}}t"><i class="icon-user-check"></i><span> Danh sách người dùng</span></a></li>
                    <li><a href="{{route('admin.report')}}"><i class="icon-bubble-notification"></i><span> Báo cáo nội dung</span></a></li>
                    <li><a href="{{route('admin.thongke')}}"><i class="icon-pie-chart8"></i><span> Thống kê</span></a></li>
                    <li><a href="{{url('/')}}"><i class="icon-home2"></i><span> Xem Trang chủ</span></a></li>
                </ul>
            </div>
        </div>
    </div>
</div>
