<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\MotelRoomRequest;
use App\Item;
use App\MotelRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class MotelRoomController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $provinces = DB::table("province")->get(["_name", "id"]);
        $categories = Category::all();
        $items = Item::all();
        return view('front_end.post', compact('categories', 'provinces', 'items'));
    }

    public function edit($id)
    {
        $provinces = DB::table("province")->get(["_name", "id"]);
        $categories = Category::all();
        $items = Item::all();
        $motelRooms = MotelRoom::where('id', $id)->first();
        return view('front_end.edit', compact('categories', 'provinces', 'items', 'motelRooms'));
    }

    public function update(Request $request, $id): \Illuminate\Http\RedirectResponse
    {
        $json_img = "";
        if ($request->hasFile('image')) {
            $arr_images = array();
            $inputfile = $request->file('image');
            foreach ($inputfile as $fileimage) {
                $namefile = "phongtro-" . Str::random(5) . "-" . $fileimage->getClientOriginalName();
                while (file_exists('uploads/images' . $namefile)) {
                    $namefile = "phongtro-" . Str::random(5) . "-" . $fileimage->getClientOriginalName();
                }
                $arr_images[] = $namefile;
                $fileimage->move('uploads/images', $namefile);
            }
            $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
        } else {
            $arr_images[] = "no_img_room.png";
            $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
        }
        /* tiện ích*/
        $json_tienich = json_encode($request->acc_item, JSON_FORCE_OBJECT);
        /* ----*/
        /* get LatLng google map */
        $arrlatlng = array();
        $arrlatlng[] = $request->acc_tlat;
        $arrlatlng[] = $request->acc_lng;
        $json_latlng = json_encode($arrlatlng, JSON_FORCE_OBJECT);

        /* --- */
        /* New Phòng trọ */
        $motel = new MotelRoom();
        $motel = $motel->find($id);
        $motel->acc_title = $request->acc_title;
        $motel->ac_title_slug = Str::slug($request->acc_title);
        $motel->acc_description = $request->acc_description;
        $motel->acc_price = $request->acc_price;
        $motel->acc_area = $request->acc_area;
        $motel->count_view = 0;
        $motel->acc_address = $request->acc_address;
        $motel->latlng = $json_latlng;
        $motel->utilities = $json_tienich;
        $motel->images = $json_img;
        $motel->user_id = Auth::user()->id;
        $motel->category_id = $request->category_id;
        $motel->phone = $request->phone;
        $oke = $motel->update();
        return redirect()->route('post.index')->with('success', 'Đăng tin thành công. Vui lòng đợi Admin kiểm duyệt');
    }

    public function delete($id)
    {
        if (!Auth::check()) {
            return redirect('user/login');
        } else {
            $getmotel = MotelRoom::find($id);
            if (Auth::id() != $getmotel->user_id)
                return redirect()->route('profile.index')->with('thongbao', 'Bạn không có quyền xóa bài đăng không phải là của bạn!');
            else {
                $getmotel->delete();
                return redirect()->route('profile.index')->with('thongbao', 'Đã xóa bài đăng của bạn');
            }
        }
    }

    public function getDistrict($id)
    {
        $districts = DB::table('district')->where('_province_id', $id)->get(["_name", "id"]);
        return response()->json($districts);
    }

    public function create(MotelRoomRequest $request)
    {
        $json_img = "";
        if ($request->hasFile('image')) {
            $arr_images = array();
            $inputfile = $request->file('image');
            foreach ($inputfile as $fileimage) {
                $namefile = "phongtro-" . Str::random(5) . "-" . $fileimage->getClientOriginalName();
                while (file_exists('uploads/images' . $namefile)) {
                    $namefile = "phongtro-" . Str::random(5) . "-" . $fileimage->getClientOriginalName();
                }
                $arr_images[] = $namefile;
                $fileimage->move('uploads/images', $namefile);
            }
            $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
        } else {
            $arr_images[] = "no_img_room.png";
            $json_img = json_encode($arr_images, JSON_FORCE_OBJECT);
        }
        /* tiện ích*/
        $json_tienich = json_encode($request->acc_item, JSON_FORCE_OBJECT);
        /* ----*/
        /* get LatLng google map */
        $arrlatlng = array();
        $arrlatlng[] = $request->acc_tlat;
        $arrlatlng[] = $request->acc_lng;
        $json_latlng = json_encode($arrlatlng, JSON_FORCE_OBJECT);

        /* --- */
        /* New Phòng trọ */
        $motel = new MotelRoom();
        $motel->acc_title = $request->acc_title;
        $motel->ac_title_slug = Str::slug($request->acc_title);
        $motel->acc_description = $request->acc_description;
        $motel->acc_price = $request->acc_price;
        $motel->acc_area = $request->acc_area;
        $motel->count_view = 0;
        $motel->acc_address = $request->acc_address;
        $motel->latlng = $json_latlng;
        $motel->utilities = $json_tienich;
        $motel->images = $json_img;
        $motel->user_id = Auth::user()->id;
        $motel->category_id = $request->category_id;
        $motel->phone = $request->phone;
        $motel->save();
        return redirect()->route('post.index')->with('success', 'Đăng tin thành công. Vui lòng đợi Admin kiểm duyệt');
    }
}
