<?php

use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            ['id' =>  'Có chung chủ', 'name' => 'Có chung chủ'],
            ['id' => 'Không chung chủ', 'name' => 'Không chung chủ'],
            ['id' => 'Có cửa sổ', 'name' => ''],
            ['id' => 'Có camera', 'name' => ''],
            ['id' => 'Có máy giặt', 'name' => ''],
            ['id' => 'Có điều hoà', 'name' => ''],
            ['id' => 'Có tủ lạnh', 'name' => ''],
            ['id' => 'Có Tivi', 'name' => ''],
            ['id' => 'Có bình nóng lạnh', 'name' => ''],
            ['id' =>'Có Internet', 'name' => 'Có Internet'],
            ['id' => 'Có giường ngủ', 'name' => ''],
            ['id' => 'Có đệm', 'name' => ''],
            ['id' => 'Có chỗ nấu ăn', 'name' => ''],
            ['id' => 'Có bàn làm việc', 'name' => ''],
            ['id' => 'Có tủ đựng quần áo', 'name' => 'Có tủ đựng quần áo'],
            ['id' => 'Sàn gỗ', 'name' => 'Sàn gỗ'],
            ['id' => 'Có ban công', 'name' => ''],
            ['id' => 'Có sân phơi', 'name' => ''],
            ['id' => 'Dv dọn vệ sinh hàng tuần', 'name' => ''],
            ['id' => 'Có chỗ để xe', 'name' => ''],
            ['id' => 'Gần phòng tập Gym', 'name' => ''],
            ['id' => 'Gần trung tâm thương mại', 'name' => ''],
            ['id' => 'Gần chợ', 'name' => ''],
            ['id' => 'Gần công viên', 'name' => ''],
            ['id' => 'Có gác xếp', 'name' => ''],
            ['id' => 'Giờ giấc tự do', 'name' => ''],
            ['id' => 'Vệ sinh chung', 'name' => ''],
            ['id' => 'Vệ sinh riêng', 'name' => 'Vệ sinh riêng'],
            ['id' => 'Không yêu cầu đặt cọc', 'name' => ''],
            ['id' => '', 'name' => ''],
        ];
        foreach ($items as $item) {
            \App\Item::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
