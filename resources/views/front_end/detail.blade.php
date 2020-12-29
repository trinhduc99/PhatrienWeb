@extends('layouts.front_end')
@section('content')
    <?php
    function time_elapsed_string($datetime, $full = false)
    {
        $now = new DateTime;
        $ago = new DateTime($datetime);
        $diff = $now->diff($ago);
        $diff->w = floor($diff->d / 7);
        $diff->d -= $diff->w * 7;
        $string = array(
            'y' => 'năm',
            'm' => 'tháng',
            'w' => 'tuần',
            'd' => 'ngày',
            'h' => 'giờ',
            'i' => 'phút',
            's' => 'giây',
        );
        foreach ($string as $k => &$v) {
            if ($diff->$k) {
                $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? '' : '');
            } else {
                unset($string[$k]);
            }
        }
        if (!$full) $string = array_slice($string, 0, 1);
        return $string ? implode(', ', $string) . ' trước' : 'Vừa xong';
    }
    ?>
    <div class="gap"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="/">Trang Chủ</a></li>
                    <li><a href="{{route('category.search',['slug'=>$motelroom->category->slug])}}">{{ ($motelroom->category->name)??"" }}</a></li>
                    <li class="active">{{ $motelroom->acc_title }}</li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h1 class="entry-title entry-prop">{{ $motelroom->acc_title }}</h1>
                <hr>
                <div class="row">
                    <div class="col-md-6">
                        <span class="price_area">{{ number_format($motelroom->acc_price) }} <span class="price_label">VND</span></span>
                    </div>
                    <div class="col-md-6">
					<span class="pull-right">Lượt xem: {{ $motelroom->count_view }} - <span>Ngày đăng: </span> <span
                            style="color: red; font-weight: bold;">
						<?php echo time_elapsed_string($motelroom->created_at); ?>
					</span></span>
                    </div>
                </div>
                <div id="map-detail"></div>

                <hr>
                <div class="detail">
                    <p><strong>Địa chỉ: {{ $motelroom->acc_address }}</strong><br></p>
                    <p>
                        <strong>Giá phòng: </strong><span
                            class="price_area"><?php echo number_format($motelroom->acc_price); ?>  <span
                                class="price_label">VND</span></span>
                        <strong><i class="fas fa-street-view"></i> Diện tích: </strong><span> {{$motelroom->acc_area}} m <sup>2</sup> </span>
                    </p>
                    <!-- Tiện ích -->
                    <?php $arrtienich = json_decode($motelroom->utilities, true); ?>
                    <div id="km-detail">
                        <div class="fs-dtslt">Tiện ích Phòng Trọ</div>
                        <div style="padding: 5px;">
                            @foreach($arrtienich as $tienich)
                                <span><i class="fas fa-check"></i> {{ $tienich }}</span>
                            @endforeach
                        </div>
                    </div>
                    <h4>Mô tả:</h4>
                    <pre>
                        <p class="pre">{!! $motelroom->acc_description !!}</p>
				</pre>
                </div>
                <?php
                $arrimg = json_decode($motelroom->images, true);
                ?>
                    @foreach($arrimg as $img)
                        <img src="uploads/images/<?php echo $img; ?>" width="50%"> <br><br>
                    @endforeach
                <div class="gap"></div>
            </div>
            <div class="col-md-4">
                <div class="contactpanel">
                    <div class="row">
                        <div class="col-md-4 text-center">
                            @if($motelroom->user->avatar)
                                <img src="uploads/avatars/<?php echo ($motelroom->user->avatar) ?? ""; ?>"
                                     class="img-circle" alt="Cinque Terre" width="100" height="100">
                            @else
                                <img src="images/no-avatar.jpg" class="img-circle" alt="Cinque Terre" width="100"
                                     height="100">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4>Thông tin người đăng</h4>
                            <strong>{{ ($motelroom->user->name)??"" }}</strong><br>
                            <i class="far fa-clock"></i> {{ ($motelroom->user->created_at)??"" }}

                        </div>
                    </div>
                </div>
                <div class="phone_btn">
                    <a id="show_phone_bnt" href="callto:{{ $motelroom->phone }}" class="btn btn-primary btn-block"
                       style="font-weight: bold !important;
				font-size: 14px;">
                        <i class="fas fa-phone-square" style="font-size: 20px"></i>
                        <span>SĐT: {{ $motelroom->phone }}</span></a>
                </div>
                <div class="gap"></div>
                @if(session('thongbao'))
                    <div class="alert bg-success">
                        <button type="button" class="close" data-dismiss="alert"><span>×</span><span class="sr-only">Close</span>
                        </button>
                        <span class="text-semibold">Well done!</span> {{session('thongbao')}}
                    </div>
                @else
                    <div class="report">
                        <h4>BÁO CÁO</h4>
                        <form action="{{ route('user.report',['id'=> $motelroom->id]) }}">
                            @can('report', $motelroom->user_id)
                                <label class="radio" style="margin-right:15px"> Đã cho thuê
                                    <input type="radio" checked="checked" name="baocao" value="1">
                                    <span class="checkround"></span>
                                </label>
                            @else
                                <label class="radio"> Sai thông tin
                                    <input type="radio" name="baocao" value="2">
                                    <span class="checkround"></span>
                                </label>
                            @endcan
                            <br>
                            <button class="btn btn-danger">Gửi báo cáo</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script type="text/javascript">
        $(document).ready(function () {
            var slider = $('.pgwSlider').pgwSlider();
            slider.previousSlide();
        });
    </script>
    <script>

        var map;

        function initMap() {
            map = new google.maps.Map(document.getElementById('map-detail'), {
                center: {lat: 16.067011, lng: 108.214388},
                zoom: 15,
                draggable: true
            });
            /* Get latlng vị trí phòng trọ */
            <?php
                $arrmergeLatln = array();

                $arrlatlng = json_decode($motelroom->latlng, true);

                $arrmergeLatln[] = ["lat" => $arrlatlng[0], "lng" => $arrlatlng[1], "title" => $motelroom->title, "address" => $motelroom->address, "phone" => $motelroom->phone, "slug" => $motelroom->slug];
                $js_array = json_encode($arrmergeLatln);
                echo "var javascript_array = " . $js_array . ";\n";

                ?>
                for (i in javascript_array) {
                var data = javascript_array[i];
                var latlng = new google.maps.LatLng(data.lat, data.lng);
                var phongtro = new google.maps.Marker({
                    position: latlng,
                    map: map,
                    title: data.title,
                    icon: "images/gps.png",
                    content: 'dgfdgfdg'
                });
                var infowindow = new google.maps.InfoWindow();
                (function (phongtro, data) {
                    var content = '<div id="iw-container">' +
                        '<a href="phongtro/' + data.slug + '"><div class="iw-title">' + data.title + '</div></a>' +
                        '<p><i class="fas fa-map-marker" style="color:#003352"></i> ' + data.address + '<br>' +
                        '<br>Phone. ' + data.phone + '</div>';
                    infowindow.setContent(content);
                    infowindow.open(map, phongtro);
                    google.maps.event.addListener(phongtro, "click", function (e) {

                        infowindow.setContent(content);
                        infowindow.open(map, phongtro);
                        // alert(data.title);
                    });
                })(phongtro, data);

            }
            google.maps.event.addListener(map, 'mousemove', function (e) {
                document.getElementById("flat").innerHTML = e.latLng.lat().toFixed(6);
                document.getElementById("lng").innerHTML = e.latLng.lng().toFixed(6);

            });


        }

    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap"
            async defer></script>
@endsection
