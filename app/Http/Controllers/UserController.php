<?php

namespace App\Http\Controllers;

use App\Category;
use App\MotelRoom;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getprofile()
    {
        $categories = Category::all();
        $mypost = MotelRoom::where('user_id',Auth::user()->id)->get();
        return view('front_end.profile',compact('mypost','categories'));
    }

    public function getEditprofile()
    {
        $categories = Category::all();
        $user = User::find(Auth::user()->id);
        return view('front_end.edit_profile',compact('user','categories'));
    }

    public function postEditprofile(Request  $request)
    {
        $user = User::find(Auth::user()->id);
        if ($request->hasFile('avtuser')){
            $file = $request->file('avtuser');
            $exten = $file->getClientOriginalExtension();
            if($exten != 'jpg' && $exten != 'png' && $exten !='jpeg' && $exten != 'JPG' && $exten != 'PNG' && $exten !='JPEG' )
                return redirect()->route('profile.edit')->with('thongbao','Bạn chỉ được upload hình ảnh có định dạng JPG,JPEG hoặc PNG');
            $Hinh = 'avatar-'.$user->username.'-'.time().'.'.$exten;
            while (file_exists('uploads/avatars/'.$Hinh)) {
                $Hinh = 'avatar-'.$user->name.'-'.time().'.'.$exten;
            }
            if(file_exists('uploads/avatars/'.$user->avatar))
                unlink('uploads/avatars/'.$user->avatar);

            $file->move('uploads/avatars',$Hinh);
            $user->avatar = $Hinh;
        }
        $this->validate($request,[
            'txtname' => 'min:3|max:20'
        ],[
            'txtname.min' => 'Tên phải lớn hơn 3 và nhỏ hơn 20 kí tự',
            'txtname.max' => 'Tên phải lớn hơn 3 và nhỏ hơn 20 kí tự'
        ]);
        if(($request->txtpass != '' ) || ($request->retxtpass != '')){
            $this->validate($request,[
                'txtpass' => 'min:3|max:32',
                'retxtpass' => 'same:txtpass',
            ],[
                'txtpass.min' => 'password phải lớn hơn 3 và nhỏ hơn 32 kí tự',
                'txtpass.max' => 'password phải lớn hơn 3 và nhỏ hơn 32 kí tự',
                'retxtpass.same' => 'Nhập lại mật khẩu không đúng',
                'retxtpass.required' => 'Vui lòng nhập lại mật khẩu',
            ]);
            $user->password = Hash::make($request->txtpass);
        }

        $user->name = $request->txtname;
        $user->save();
        return redirect()->route('profile.edit')->with('thongbao','Cập nhật thông tin thành công');

    }
}
