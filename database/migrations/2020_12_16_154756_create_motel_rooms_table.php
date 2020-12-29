<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMotelRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('motel_rooms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->comment('ten nguoi tao bai viet')->unsigned();
            $table->unsignedBigInteger('category_id')->comment('danh muc bai viet')->unsigned();
            $table->string('images');
            $table->string('acc_address')->comment('dia chi chinh xac');
            $table->string('acc_title')->comment('ten bai viet');
            $table->string('ac_title_slug')->comment('slug cua tieu de bai viet');
            $table->longText('acc_description')->comment('Mo ta bai viet');
            $table->string('phone')->comment('so dien thoai');
            $table->string('acc_price')->comment('gia bai viet');
            $table->double('acc_area', 13, 2)->comment('dien tich phong tro');
            $table->boolean('is_booked')->default(0)->comment('bai viet co nguoi thue');
            $table->integer('approve')->default('0');
            $table->string('latlng')->nullable();
            $table->string('utilities')->nullable();
            $table->unsignedInteger('count_view')->default(0)->comment('so luong nguoi xem bai viet');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('motel_rooms');
    }
}
