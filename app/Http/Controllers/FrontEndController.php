<?php

namespace App\Http\Controllers;

use App\Category;
use App\MotelRoom;
use App\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class FrontEndController extends Controller
{
    public function index()
    {
        $provinces = DB::table("province")->get(["_name", "id"]);
        $categories = Category::all();
        $hot_motelroom = MotelRoom::where('approve', 1)->limit(6)->orderBy('count_view', 'desc')->get();
        $latest_motelroom = MotelRoom::where('approve', 1)->limit(6)->orderBy('created_at', 'desc')->get();
        $hanoi_motelroom = MotelRoom::where('approve', 1)->where('acc_address', 'LIKE', '%Hà Nội%')->limit(6)->orderBy('created_at', 'desc')->get();
        $hcm_motelroom = MotelRoom::where('approve', 1)->where('acc_address', 'LIKE', '%Hồ Chí Minh%')->limit(6)->orderBy('created_at', 'desc')->get();
        $danang_motelroom = MotelRoom::where('approve', 1)->where('acc_address', 'LIKE', '%Đà Nẵng%')->limit(6)->orderBy('created_at', 'desc')->get();
        $map_motelroom = MotelRoom::where('approve', 1)->get();
        $listmotelroom = MotelRoom::where('approve', 1)->paginate(4);
        return view('front_end.index', [
            'provinces' => $provinces,
            'categories' => $categories,
            'hot_motelroom' => $hot_motelroom,
            'latest_motelroom' => $latest_motelroom,
            'hanoi_motelroom' => $hanoi_motelroom,
            'hcm_motelroom' => $hcm_motelroom,
            'danang_motelroom' => $danang_motelroom,
            'map_motelroom' => $map_motelroom,
            'listmotelroom' => $listmotelroom
        ]);
    }

    public function searchList(Request $request)
    {

        $getmotel = Motelroom::where([
            ['acc_address', 'LIKE', "%$request->district%"],
//            ['acc_price', '>=', $request->price],
//            ['acc_price', '<=', $request->price+500000],
//            ['acc_area','>=',$request->area],
//            ['acc_area','<=',$request->area+10],
            ['approve',1]])->get();
        $Categories = Category::all();
        return view('front_end.search', ['listmotel' => $getmotel, 'categories' => $Categories]);
    }

    public function getDistrict($id)
    {
        $province_id = DB::table('province')->where('_name', $id)->first()->id;
        $districts = DB::table('district')->where('_province_id', $province_id)->get(["_name", "id"]);
        return response()->json($districts);
    }

    public function phongtro($slug)
    {
        abort_if(Gate::denies('viewUser', $slug), Response::HTTP_FORBIDDEN, '404 Not Found');
        $room = MotelRoom::where('ac_title_slug', $slug)->first();
        $room->count_view = $room->count_view + 1;
        $room->save();
        $categories = Category::all();
        return view('front_end.detail', ['motelroom' => $room, 'categories' => $categories]);
    }


    public function userReport($id, Request $request)
    {
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        $report = new Report;
        $report->ip_address = $ipaddress;
        $report->motel_room_id = $id;
        $report->status = $request->baocao;
        $report->save();
        $getmotel = MotelRoom::find($id);
        return redirect('phongtro/' . $getmotel->ac_title_slug)->with('thongbao', 'Cảm ơn bạn đã báo cáo, đội ngũ chúng tôi sẽ xem xét');
    }

    public function getMotelByCategoryId($slug)
    {

        $categoryId = Category::where('slug', $slug)->first()->id;
        $getmotel = MotelRoom::where([['category_id', $categoryId], ['approve', 1]])->paginate();
        $Categories = Category::all();
        return view('front_end.category', ['listmotel' => $getmotel, 'categories' => $Categories]);
    }
}
