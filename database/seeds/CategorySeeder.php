<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['id' => 1, 'name' => 'Phòng trọ cho thuê','slug' => \Illuminate\Support\Str::slug('Phòng trọ cho thuê')],
            ['id' => 2, 'name' => 'Ở ghép','slug' => \Illuminate\Support\Str::slug('Ở ghép')],
            ['id' => 3, 'name' => 'Nhà nguyên căn','slug' => \Illuminate\Support\Str::slug('Nhà nguyên căn')],
            ['id' => 4, 'name' => 'Chung cư mini','slug' => \Illuminate\Support\Str::slug('Chung cư mini')],

        ];
        foreach ($categories as $item) {
            \App\Category::updateOrCreate(['id' => $item['id']], $item);
        }
    }
}
