<?php

use Illuminate\Database\Seeder;

class MotelRoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $limit = 10;
        for ($i = 0; $i < $limit; $i++) {
            DB::table('motel_rooms')->insert([

                'province_id' => 'HoChiMinh',
                'district_id' => 'Quan1',
                'acc_address' => '120 Hoàng Minh Thảo, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam',
                'acc_title' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'ac_title_slug' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'acc_description' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'phone' => '0988746131',
                'acc_price' => '7989782',
                'acc_area' => '22',
                'approve' => '1',
                'latlng' => '{"0":"16.0493471","1":"108.1604605"}',
                'utilities' => '{"0":"3","1":"5","2":"6","3":"8","4":"9"}',
                'images' => '{"0":"phongtro-lT95D-calendar.png","1":"phongtro-0jvHw-logo_app_chat.png","2":"phongtro-dAOUR-j51o63kilxm51.jpg","3":"phongtro-jY2LM-fv76x3dse1m51.jpg"}',
                'count_view' => '20',
                'user_id' => '2',
                'category_id' => '2',
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('motel_rooms')->insert([

                'province_id' => 'Ha Noi',
                'district_id' => 'Ba DINH',
                'acc_address' => '120 Hoàng Minh Thảo, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam',
                'acc_title' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'ac_title_slug' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'acc_description' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'phone' => '09887461331',
                'acc_price' => '7982282',
                'acc_area' => '222',
                'approve' => '0',
                'latlng' => '{"0":"16.0493471","1":"108.1604605"}',
                'utilities' => '{"0":"3","1":"5","2":"6","3":"8","4":"9"}',
                'images' => '{"0":"phongtro-lT95D-calendar.png","1":"phongtro-0jvHw-logo_app_chat.png","2":"phongtro-dAOUR-j51o63kilxm51.jpg","3":"phongtro-jY2LM-fv76x3dse1m51.jpg"}',
                'count_view' => '20',
                'user_id' => '2',
                'category_id' => '2',
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('motel_rooms')->insert([

                'province_id' => 'Da Nang',
                'district_id' => 'Liên Chiểu',
                'acc_address' => '120 Hoàng Minh Thảo, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam',
                'acc_title' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'ac_title_slug' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'acc_description' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'phone' => '0988746131',
                'acc_price' => '7989782',
                'acc_area' => '22',
                'approve' => '1',
                'latlng' => '{"0":"16.0493471","1":"108.1604605"}',
                'utilities' => '{"0":"3","1":"5","2":"6","3":"8","4":"9"}',
                'images' => '{"0":"phongtro-lT95D-calendar.png","1":"phongtro-0jvHw-logo_app_chat.png","2":"phongtro-dAOUR-j51o63kilxm51.jpg","3":"phongtro-jY2LM-fv76x3dse1m51.jpg"}',
                'count_view' => '20',
                'user_id' => '2',
                'category_id' => '2',
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('motel_rooms')->insert([

                'province_id' => 'HoChiMinh',
                'district_id' => 'Quan2',
                'acc_address' => '120 Hoàng Minh Thảo, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam',
                'acc_title' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'ac_title_slug' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'acc_description' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'phone' => '0988746131',
                'acc_price' => '7989782',
                'acc_area' => '22',
                'approve' => '1',
                'latlng' => '{"0":"16.0493471","1":"108.1604605"}',
                'utilities' => '{"0":"3","1":"5","2":"6","3":"8","4":"9"}',
                'images' => '{"0":"phongtro-lT95D-calendar.png","1":"phongtro-0jvHw-logo_app_chat.png","2":"phongtro-dAOUR-j51o63kilxm51.jpg","3":"phongtro-jY2LM-fv76x3dse1m51.jpg"}',
                'count_view' => '20',
                'user_id' => '2',
                'category_id' => '2',
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('motel_rooms')->insert([

                'province_id' => 'HoChiMinh',
                'district_id' => 'Quan3',
                'acc_address' => '120 Hoàng Minh Thảo, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam',
                'acc_title' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'ac_title_slug' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'acc_description' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'phone' => '0988746131',
                'acc_price' => '7989782',
                'acc_area' => '22',
                'approve' => '1',
                'latlng' => '{"0":"16.0493471","1":"108.1604605"}',
                'utilities' => '{"0":"3","1":"5","2":"6","3":"8","4":"9"}',
                'images' => '{"0":"phongtro-lT95D-calendar.png","1":"phongtro-0jvHw-logo_app_chat.png","2":"phongtro-dAOUR-j51o63kilxm51.jpg","3":"phongtro-jY2LM-fv76x3dse1m51.jpg"}',
                'count_view' => '10',
                'user_id' => '2',
                'category_id' => '2',
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('motel_rooms')->insert([

                'province_id' => 'Ha Noi',
                'district_id' => 'Cau Giay',
                'acc_address' => '120 Hoàng Minh Thảo, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam',
                'acc_title' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'ac_title_slug' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'acc_description' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'phone' => '0988746131',
                'acc_price' => '7989782',
                'acc_area' => '22',
                'approve' => '0',
                'latlng' => '{"0":"16.0493471","1":"108.1604605"}',
                'utilities' => '{"0":"3","1":"5","2":"6","3":"8","4":"9"}',
                'images' => '{"0":"phongtro-lT95D-calendar.png","1":"phongtro-0jvHw-logo_app_chat.png","2":"phongtro-dAOUR-j51o63kilxm51.jpg","3":"phongtro-jY2LM-fv76x3dse1m51.jpg"}',
                'count_view' => '40',
                'user_id' => '2',
                'category_id' => '2',
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('motel_rooms')->insert([

                'province_id' => 'HoChiMinh',
                'district_id' => 'Quan4',
                'acc_address' => '120 Hoàng Minh Thảo, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam',
                'acc_title' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'ac_title_slug' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'acc_description' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'phone' => '0988746131',
                'acc_price' => '7989782',
                'acc_area' => '22',
                'approve' => '1',
                'latlng' => '{"0":"16.0493471","1":"108.1604605"}',
                'utilities' => '{"0":"3","1":"5","2":"6","3":"8","4":"9"}',
                'images' => '{"0":"phongtro-lT95D-calendar.png","1":"phongtro-0jvHw-logo_app_chat.png","2":"phongtro-dAOUR-j51o63kilxm51.jpg","3":"phongtro-jY2LM-fv76x3dse1m51.jpg"}',
                'count_view' => '20',
                'user_id' => '2',
                'category_id' => '2',
            ]);
        }
        for ($i = 0; $i < $limit; $i++) {
            DB::table('motel_rooms')->insert([

                'province_id' => 'HaNoi',
                'district_id' => 'Me Tri',
                'acc_address' => '120 Hoàng Minh Thảo, Hòa Khánh Nam, Liên Chiểu, Đà Nẵng, Việt Nam',
                'acc_title' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'ac_title_slug' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'acc_description' => 'Phòng full nội thất: giá từ:2tr_4tr. Đc: 918A Tạ Quang Bửu, P5, Q.8. LH:0903970791 gặp A Lộc',
                'phone' => '0988746131',
                'acc_price' => '7989782',
                'acc_area' => '22',
                'approve' => '1',
                'latlng' => '{"0":"16.0493471","1":"108.1604605"}',
                'utilities' => '{"0":"3","1":"5","2":"6","3":"8","4":"9"}',
                'images' => '{"0":"phongtro-lT95D-calendar.png","1":"phongtro-0jvHw-logo_app_chat.png","2":"phongtro-dAOUR-j51o63kilxm51.jpg","3":"phongtro-jY2LM-fv76x3dse1m51.jpg"}',
                'count_view' => '30',
                'user_id' => '2',
                'category_id' => '2',
            ]);
        }
    }
}
