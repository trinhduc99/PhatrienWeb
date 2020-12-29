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
    <div class="container-fluid" style="padding-left: 0px;padding-right: 0px;">
        <div class="search-map hidden-xs">
            <div id="map"></div>
            <div class="box-search">
                <form method="post" action="{{route('search.list')}}">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <select class="selectpicker" data-live-search="true" id="province" name="province">
                                @foreach($provinces as $province)
                                    <option value="{{ $province->_name }}">{{ $province->_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select class="form-control" id="district" name="district">
                                <option value="">Chọn quận huyện</option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select class="selectpicker" data-live-search="true" name="category" id="selectcategory">
                                @foreach($categories as $category)
                                    <option data-tokens="{{ $category->slug}}"
                                            value="{{ $category->id}}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-xs-4">
                            <select class="selectpicker" name="price" id="selectprice" data-live-search="true">
                                <option value="">Khoảng giá</option>
                                <option value="500000">Từ 500.000
                                    VNĐ - 1.000.000 VNĐ
                                </option>
                                <option value="1000000">Từ
                                    1.000.000 VNĐ - 1.500.000 VNĐ
                                </option>
                                <option value="1500000">Từ
                                    1.500.000 VNĐ - 3.000.000 VNĐ
                                </option>
                                <option value="5000000">Từ
                                    3.000.000 VNĐ - 5.000.000 VNĐ
                                </option>
                                <option value="5000000">Trên 5.000.000
                                    VNĐ
                                </option>
                            </select>
                        </div>
                        <div class="col-xs-4">
                            <select class="selectpicker" name="area" id="selectprice" data-live-search="true">
                                <option value="">Diện tích</option>
                                <option value="1">
                                    Dưới 10 m2
                                </option>
                                <option value="10">Từ
                                    Từ 10 đến 20m2
                                </option>
                                <option value="20">Từ
                                    Từ 20 đến 30m2
                                </option>
                                <option value="30">Từ
                                    Từ 30 đến 40m2
                                </option>
                                <option value="40m2">Từ
                                    Trên 40m2
                                </option>

                            </select>
                        </div>
                        <div class="col-xs-4">
                            <button class="btn btn-success">Tìm kiếm ngay</button>
                        </div>
                    </div>

                    <form>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row" style="margin-top: 10px; margin-bottom: 10px">
            <div class="col-md-6">
                <div class="asks-first">
                    <div class="asks-first-circle">
                        <span class="fa fa-search"></span>
                    </div>
                    <div class="asks-first-info">
                        <h2>Giải pháp tìm kiếm mới</h2>
                        <p>Tiết kiệm nhiều thời gian cho bạn với giải pháp và công nghệ mới</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="asks-first2">
                    <div class="asks-first-circle">
                        <span class="fas fa-hourglass-start"></span>

                    </div>
                    <div class="asks-first-info">
                        <h2>An Toàn - Nhanh chóng</h2>
                        <p>Với đội ngũ Quản trị viên kiểm duyệt hiệu quả, Chất Lượng đem lại sự tin tưởng.</p>
                    </div>
                </div>
            </div>
        </div>
        <h3 class="title-comm"><span class="title-holder">PHÒNG TRỌ XEM NHIỀU NHẤT</span></h3>
        <div class="row room-hot">
            @foreach($hot_motelroom as $room)
                <?php
                $img_thumb = json_decode($room->images, true)
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="room-item">
                        <div class="wrap-img"
                             style="background: url(uploads/images/<?php echo $img_thumb[0]; ?>) center;     background-size: cover;">
                            <img src="" class="lazyload img-responsive">
                            <div class="category">
                                <a href="category/{{ ($room->category()->id)??"" }}">{{ ($room->category()->name)??"" }}</a>
                            </div>
                        </div>
                        <div class="room-detail">
                            <h4><a href="phongtro/{{ $room->ac_title_slug }}">{!! substr($room->acc_description, 0, 33) . '...' !!}</a></h4>
                            <div class="room-meta">
                                <span><i class="fas fa-user-circle"></i> Người đăng: <a
                                        href="/"> {{ ($room->user->name)??"" }}</a></span>
                                <span class="pull-right"><i class="far fa-clock"></i>
											<?php
                                    echo time_elapsed_string($room->created_at);
                                    ?>
										</span>
                            </div>
                            <div class="room-description"><i class="fas fa-audio-description"></i>
                                    {!! substr($room->acc_description, 0, 33) . '...' !!}
                            </div>
                            <div class="room-info">
                                <span><i
                                        class="far fa-stop-circle"></i> Diện tích: <b>{{ $room->acc_area }} m<sup>2</sup></b></span>
                                <span class="pull-right"><i
                                        class="fas fa-eye"></i> Lượt xem: <b>{{ $room->count_view }}</b></span>
                                <div><i class="fas fa-map-marker"></i> Địa chỉ: {{ $room->acc_address }}</div>
                                <div style="color: #e74c3c"><i class="far fa-money-bill-alt"></i> Giá thuê:
                                    <b>{{ number_format($room->acc_price) }} VNĐ</b></div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="title-comm"><span class="title-holder">PHÒNG TRỌ KHU VỰC HÀ NỘI</span></h3>
        <div class="row room-hot">
            @foreach($hanoi_motelroom as $room)
                <?php
                $img_thumb = json_decode($room->images, true)
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="room-item">
                        <div class="wrap-img"
                             style="background: url(uploads/images/<?php echo $img_thumb[0]; ?>) center;     background-size: cover;">
                            <img src="" class="lazyload img-responsive">
                            <div class="category">
                                <a href="category/{{ ($room->category()->id)??"" }}">{{ ($room->category()->name)??"" }}</a>
                            </div>
                        </div>
                        <div class="room-detail">
                            <h4><a href="phongtro/{{ $room->ac_title_slug }}">{!! substr($room->acc_title, 0, 33) . '...' !!}</a></h4>
                            <div class="room-meta">
                                <span><i class="fas fa-user-circle"></i> Người đăng: <a
                                        href="/"> {{ ($room->user->name)??"" }}</a></span>
                                <span class="pull-right"><i class="far fa-clock"></i>
											<?php
                                    echo time_elapsed_string($room->created_at);
                                    ?>
										</span>
                            </div>
                            <div class="room-description"><i class="fas fa-audio-description"></i>
                                {!! substr($room->acc_description, 0, 33) . '...' !!}
                            </div>
                            <div class="room-info">
                                <span><i
                                        class="far fa-stop-circle"></i> Diện tích: <b>{{ $room->acc_area }} m<sup>2</sup></b></span>
                                <span class="pull-right"><i
                                        class="fas fa-eye"></i> Lượt xem: <b>{{ $room->count_view }}</b></span>
                                <div><i class="fas fa-map-marker"></i> Địa chỉ: {{ $room->acc_address }}</div>
                                <div style="color: #e74c3c"><i class="far fa-money-bill-alt"></i> Giá thuê:
                                    <b>{{ number_format($room->acc_price) }} VNĐ</b></div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="title-comm"><span class="title-holder">PHÒNG TRỌ KHU VỰC HCM</span></h3>
        <div class="row room-hot">
            @foreach($hcm_motelroom as $room)
                <?php
                $img_thumb = json_decode($room->images, true)
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="room-item">
                        <div class="wrap-img"
                             style="background: url(uploads/images/<?php echo $img_thumb[0]; ?>) center;     background-size: cover;">
                            <img src="" class="lazyload img-responsive">
                            <div class="category">
                                <a href="category/{{ ($room->category()->id)??"" }}">{{ ($room->category()->name)??"" }}</a>
                            </div>
                        </div>
                        <div class="room-detail">
                            <h4><a href="phongtro/{{ $room->ac_title_slug }}">{!! substr($room->acc_title, 0, 33) . '...' !!}</a></h4>
                            <div class="room-meta">
                                <span><i class="fas fa-user-circle"></i> Người đăng: <a
                                        href="/"> {{ ($room->user->name)??"" }}</a></span>
                                <span class="pull-right"><i class="far fa-clock"></i>
											<?php
                                    echo time_elapsed_string($room->created_at);
                                    ?>
										</span>
                            </div>
                            <div class="room-description"><i class="fas fa-audio-description"></i>
                                {!! substr($room->acc_description, 0, 33) . '...' !!}
                            </div>
                            <div class="room-info">
                                <span><i
                                        class="far fa-stop-circle"></i> Diện tích: <b>{{ $room->acc_area }} m<sup>2</sup></b></span>
                                <span class="pull-right"><i
                                        class="fas fa-eye"></i> Lượt xem: <b>{{ $room->count_view }}</b></span>
                                <div><i class="fas fa-map-marker"></i> Địa chỉ: {{ $room->acc_address }}</div>
                                <div style="color: #e74c3c"><i class="far fa-money-bill-alt"></i> Giá thuê:
                                    <b>{{ number_format($room->acc_price) }} VNĐ</b></div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
        <h3 class="title-comm"><span class="title-holder">PHÒNG TRỌ KHU VỰC ĐÀ NẴNG</span></h3>
        <div class="row room-hot">
            @foreach($danang_motelroom as $room)
                <?php
                $img_thumb = json_decode($room->images, true)
                ?>
                <div class="col-md-4 col-sm-6">
                    <div class="room-item">
                        <div class="wrap-img"
                             style="background: url(uploads/images/<?php echo $img_thumb[0]; ?>) center;     background-size: cover;">
                            <img src="" class="lazyload img-responsive">
                            <div class="category">
                                <a href="category/{{ ($room->category()->id)??"" }}">{{ ($room->category()->name)??"" }}</a>
                            </div>
                        </div>
                        <div class="room-detail">
                            <h4><a href="phongtro/{{ $room->ac_title_slug }}">{!! substr($room->acc_t, 0, 33) . '...' !!}</a></h4>
                            <div class="room-meta">
                                <span><i class="fas fa-user-circle"></i> Người đăng: <a
                                        href="/"> {{ ($room->user->name)??"" }}</a></span>
                                <span class="pull-right"><i class="far fa-clock"></i>
											<?php
                                    echo time_elapsed_string($room->created_at);
                                    ?>
										</span>
                            </div>
                            <div class="room-description"><i class="fas fa-audio-description"></i>
                                {!! substr($room->acc_description, 0, 33) . '...' !!}
                            </div>
                            <div class="room-info">
                                <span><i
                                        class="far fa-stop-circle"></i> Diện tích: <b>{{ $room->acc_area }} m<sup>2</sup></b></span>
                                <span class="pull-right"><i
                                        class="fas fa-eye"></i> Lượt xem: <b>{{ $room->count_view }}</b></span>
                                <div><i class="fas fa-map-marker"></i> Địa chỉ: {{ $room->acc_address }}</div>
                                <div style="color: #e74c3c"><i class="far fa-money-bill-alt"></i> Giá thuê:
                                    <b>{{ number_format($room->acc_price) }} VNĐ</b></div>
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <div class="container">
        <h3 class="title-comm"><span class="title-holder">PHÒNG TRỌ ĐĂNG GẦN NHẤT</span></h3>
        <div class="row">
            <div class="col-md-8">
                @foreach($latest_motelroom as $room)
                    <?php
                    $img_thumb = json_decode($room->images, true);
                    ?>
                    <div class="room-item-vertical">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="wrap-img-vertical"
                                     style="background: url(uploads/images/<?php echo $img_thumb[0]; ?>) center;     background-size: cover;">

                                    <div class="category">
                                        <a href="category/{{ ($room->category->id)??"" }}">{{ ($room->category()->name)??"" }}</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="room-detail">
                                    <h4><a href="phongtro/{{ $room->ac_title_slug }}">{!! substr($room->acc_title, 0,33) . '...' !!}</a></h4>
                                    <div class="room-meta">
                                        <span><i class="fas fa-user-circle"></i> Người đăng: {{ ($room->user->name)??"" }}</span>
                                        <span class="pull-right"><i class="far fa-clock"></i> <?php
                                            echo time_elapsed_string($room->created_at);
                                            ?></span>
                                    </div>

                                    <div class="room-info">
                                        <span><i
                                                class="far fa-stop-circle"></i> Diện tích: <b>{{ $room->acc_area }} m<sup>2</sup></b></span>
                                        <span class="pull-right"><i
                                                class="fas fa-eye"></i> Lượt xem: <b>{{ $room->count_view }}</b></span>
                                        <div><i class="fas fa-map-marker"></i> Địa chỉ: {{ $room->acc_address }}</div>
                                        <div style="color: #e74c3c"><i class="far fa-money-bill-alt"></i> Giá thuê:
                                            <b>{{ number_format($room->acc_price) }}</b></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                <ul class="pagination pull-right">
                    @if($listmotelroom->currentPage() != 1)
                        <li><a href="{{ $listmotelroom->url($listmotelroom->currentPage() -1) }}">Trước</a></li>
                    @endif
                    @for($i= 1 ; $i<= $listmotelroom->lastPage(); $i++)
                        <li class=" {{ ($listmotelroom->currentPage() == $i )? 'active':''}}">
                            <a href="{{ $listmotelroom->url($i) }}">{{ $i }}</a>
                        </li>
                    @endfor
                    @if($listmotelroom->currentPage() != $listmotelroom->lastPage())
                        <li><a href="{{ $listmotelroom->url($listmotelroom->currentPage() +1) }}">Sau</a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>

    <script>
        var map;
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: 16.070372, lng: 108.214388},
                zoom: 15,
                draggable: true
            });
            /* Get latlng list phòng trọ */
            <?php
            $arrmergeLatln = array();
            foreach ($map_motelroom as $room) {
                $arrlatlng = json_decode($room->latlng, true);
                $arrImg = json_decode($room->images, true);
                $arrmergeLatln[] = ["slug" => $room->slug, "lat" => $arrlatlng[0], "lng" => $arrlatlng[1], "title" => $room->title, "address" => $room->address, "image" => $arrImg[0], "phone" => $room->phone];
            }
            $js_array = json_encode($arrmergeLatln);
            echo "var javascript_array = " . $js_array . ";\n";

            ?>
            /* ---------------  */

            var listphongtro = [
                {
                    lat: 16.067011,
                    lng: 108.214388,
                    title: '33 Hoàng diệu',
                    content: 'bbbb'
                },
                {
                    lat: 16.066330603904397,
                    lng: 108.2066632380371,
                    title: '33 Hoàng diệu',
                    content: 'bbbb'
                }
            ];

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
                        '<img height="200px" width="300" src="uploads/images/' + data.image + '">' +
                        '<a href="phongtro/' + data.slug + '"><div class="iw-title">' + data.title + '</div></a>' +
                        '<p><i class="fas fa-map-marker" style="color:#003352"></i> ' + data.address + '<br>' +
                        '<br>Phone. ' + data.phone + '</div>';

                    google.maps.event.addListener(phongtro, "click", function (e) {
                        infowindow.setContent(content);
                        infowindow.open(map, phongtro);
                    });
                })(phongtro, data);
            }
        }
    </script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCzlVX517mZWArHv4Dt3_JVG0aPmbSE5mE&callback=initMap"
            async defer></script>
    <script>
        $(document).ready(function () {
            $('#province').change(function () {
                let province_id = $("#province option:selected").val();
                if (province_id) {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: "get-districts-by-provinces/" + province_id,
                    }).done(function (res) {
                        if (res) {
                            $("#district").empty().append('<option value="">Chọn quận huyện</option>');
                            $.each(res, function (key, value) {
                                $("#district").append('<option value="' + value._name + '">' + value._name + '</option>');
                            });
                        }
                    })
                }
            });
        })
    </script>
@endsection
