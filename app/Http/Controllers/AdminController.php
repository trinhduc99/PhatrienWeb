<?php

namespace App\Http\Controllers;

use App\MotelRoom;
use App\Report;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getIndex()
    {
        $total_users_active = User::where('status', 1)->get()->count();
        $total_users_deactive = User::where('status', 0)->get()->count();
        $total_rooms_approve = MotelRoom::where('approve', 1)->get()->count();
        $total_rooms_unapprove = MotelRoom::where('approve', 0)->get()->count();
        $reports = Report::all();
        return view('admin.index', [
            'total_users_active' => $total_users_active,
            'total_users_deactive' => $total_users_deactive,
            'total_rooms_approve' => $total_rooms_approve,
            'total_rooms_unapprove' => $total_rooms_unapprove,
            'total_report' => $reports->count(),
        ]);
    }

    public function getThongke()
    {
        $total_users_active = User::where('status', 1)->get()->count();
        $total_users_deactive = User::where('status', 0)->get()->count();
        $total_rooms_approve = MotelRoom::where('approve', 1)->get()->count();
        $total_rooms_unapprove = MotelRoom::where('approve', 0)->get()->count();
        $reports = Report::all();
        return view('admin.thongke', [
            'total_users_active' => $total_users_active,
            'total_users_deactive' => $total_users_deactive,
            'total_rooms_approve' => $total_rooms_approve,
            'total_rooms_unapprove' => $total_rooms_unapprove,
            'total_report' => $reports->count(),
        ]);
    }

    public function getReport()
    {
        $reports = Report::all()->count();
        $motels = Motelroom::all();
        return view('admin.report', [
            'motels' => $motels,
            'reports' => $reports
        ]);
    }

    public function getListUser()
    {
        $users = User::all();
        return view('admin.users.list', ['users' => $users]);
    }

    /* Motel room */
    public function getListMotel()
    {
        $motelrooms = MotelRoom::all();
        return view('admin.motelroom.list', ['motelrooms' => $motelrooms]);
    }

    public function ApproveMotelroom($id)
    {
        $room = MotelRoom::find($id);
        $room->approve = 1;
        $room->save();
        return redirect('admin/motelrooms/list')->with('thongbao', 'Đã kiểm duyệt bài đăng: ' . $room->acc_title);
    }

    public function UnApproveMotelroom($id)
    {
        $room = new MotelRoom();
        $room = $room::find($id);
        $room->approve = 0;
        $room->save();
        return redirect('admin/motelrooms/list')->with('thongbao', 'Đã bỏ kiểm duyệt bài đăng: ' . $room->title);
    }

    public function DelMotelroom($id)
    {
        $room = Motelroom::find($id);
        $room->delete();
        return redirect('admin/motelrooms/list')->with('thongbao', 'Đã xóa bài đăng');
    }

    /* user */
    public function getUpdateUser($id)
    {
        $user = User::find($id);
        return view('admin.users.edit', ['user' => $user]);
    }

    public function postUpdateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->right = $request->Quyen;
        $user->status = $request->status;
        $user->save();
        return redirect('admin/users/edit/' . $id)->with('thongbao', 'Chỉnh sửa thành công tài khoản ' . $request->username . ' .');
    }

    public function DeleteUser($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('admin/users/list')->with('thongbao', 'Đã xóa người dùng khỏi danh sách. Những bài đăng của người dùng này cũng bị xóa');
    }
}
