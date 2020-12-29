<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang Quản Trị Phòng Trọ </title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet" type="text/css">
    <link href="{{asset('adminassets/assets/css/icons/icomoon/styles.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('adminassets/assets/css/bootstrap.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('adminassets/assets/css/core.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('adminassets/assets/css/components.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('adminassets/assets/css/colors.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('adminassets/assets/css/custom.css')}}" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/loaders/pace.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/core/libraries/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/core/libraries/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/loaders/blockui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/visualization/d3/d3.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/visualization/d3/d3_tooltip.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/forms/styling/switchery.min.js')}}"></script>
    <script src="{{asset('assets/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/forms/selects/bootstrap_multiselect.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/ui/moment/moment.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/pickers/daterangepicker.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/plugins/forms/styling/uniform.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/core/app.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/pages/dashboard.js')}}"></script>
    <script type="text/javascript" src="{{asset('adminassets/assets/js/pages/form_layouts.js')}}"></script>
    <script>
        $(function () {
            $('#logout').click(function () {
                if (confirm('Bạn có muốn đăng xuất không?')) {
                    document.getElementById('logout-form').submit();
                }
                return false;
            });
        });
    </script>
</head>
<body>
@include('admin.layout.nav')
<div class="page-container">
    <div class="page-content">
        @include('admin.layout.menu')
        @yield('content2')
    </div>
</div>
</body>
</html>
