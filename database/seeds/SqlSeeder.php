<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $province = base_path() . '/database/seeds/local/province.sql';
        $district = base_path() . '/database/seeds/local/district.sql';
        $sql_province = file_get_contents($province);
        $sql_district = file_get_contents($district);
        DB::unprepared($sql_province);
        DB::unprepared($sql_district);
    }
}
