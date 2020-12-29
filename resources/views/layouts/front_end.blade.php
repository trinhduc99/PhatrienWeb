<!DOCTYPE html>
<html lang="en">
<head>
    <title>Project Phòng Trọ</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <base href="{{asset('')}}">
    <link rel="stylesheet" href="{{asset('assets/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/style.css')}}">
    <link rel="stylesheet" href="{{asset('assets/awesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('assets/toast/toastr.min.css')}}">
    <script src="{{asset('assets/jquery.min.js')}}"></script>
    <script src="{{asset('assets/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('assets/myjs.js')}}"></script>
    <link rel="stylesheet" href="{{asset('assets/selectize.default.css')}}" data-theme="default">
    <script src="{{asset('assets/js/fileinput/fileinput.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/fileinput/vi.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset('assets/fileinput.css')}}">
    <script src="{{asset('assets/pgwslider/pgwslider.min.js')}}" type="text/javascript"></script>
    <link rel="stylesheet" href="{{asset('assets/pgwslider/pgwslider.min.css')}}">

    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.8/js/plugins/sortable.min.js" type="text/javascript"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-fileinput/4.4.8/js/plugins/purify.min.js" type="text/javascript"></script> -->
    <link rel="stylesheet" href="{{asset('assets/bootstrap/bootstrap-select.min.css')}}">
@yield('css_profile')
<!-- Latest compiled and minified JavaScript -->
    <script src="{{asset('assets/bootstrap/bootstrap-select.min.js')}}"></script>
</head>
<body>
@php
 $categories = \App\Category::all();
@endphp
<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
            <ul class="nav navbar-nav">
                <li><a href="{{url('/')}}">Trang Chủ</a></li>
               @foreach($categories as $category)
                    <li><a href="category/{{$category->slug}}">{{ $category->name }}</a></li>
                @endforeach
            </ul>
            @if(Auth::user())
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="btn-dangtin" href="{{route('post.index')}}"><i class="fas fa-edit"></i> Đăng tin ngay</a>
                    </li>
                    <li class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Xin chào! {{Auth::user()->name}}
                            <span class="caret"></span></a>
                        <ul class="dropdown-menu">
                            <li><a href="{{route('profile.index')}}">Thông tin tài khoản</a></li>
                            <li><a href="{{route('post.index')}}">Đăng tin</a></li>
                            <li><a  href="#" id="logout"><i data-feather="log-out"></i>Đăng xuất</a></li>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                  style="display: none;">
                                @csrf
                            </form>
                        </ul>
                    </li>
                </ul>
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="{{ route('login') }}"><i class="fas fa-user-circle"></i> Đăng Nhập</a></li>
                    <li><a href="{{ route('register') }}"><i class="fas fa-sign-in-alt"></i> Đăng Kí</a></li>
                </ul>
            @endif
        </div>
    </div>
</nav>
@yield('content')

@include('part_front_end.footer')
<script type="text/javascript" src="{{asset('assets/toast/toastr.min.js')}}"></script>
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
</body>
</html>
