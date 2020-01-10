<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use Session;

class LoginController extends Controller
{
    public function userLoginView(){
        return view('user.login');
    }

    public function adminLoginView(){
        return view('admin.login');
    }

    public function userLogin(Request $request){
        if ($request->btn_login){
            $this->validate($request,
                        ['username'=>'required',
                        'password'=>"required"],
                        
                        ['username.required'=>"Bạn chưa nhập tên đăng nhập",
                        'password.required'=>'Bạn chưa nhập mật khẩu']);

            if (Auth::attempt(['username'=>$request->username,'password'=>$request->password])){
                Session::put('username',$request->username);
                $user = User::getUserByUsername($request->username);
                Session::put('user_id',$user->user_id);
                return redirect('home')->with("thongbao","Đăng nhập thành công");
            }
            else{
                return redirect('login')->with("thongbaoloi","Đăng nhập không thành công");
            }
        }
    }

    public function adminLogin(Request $request){
        if ($request->btn_login){
            $this->validate($request,
                        ['username'=>'required',
                        'password'=>"required"],
                        
                        ['username.required'=>"Bạn chưa nhập tên đăng nhập",
                        'password.required'=>'Bạn chưa nhập mật khẩu']);

            if (Auth::attempt(['username'=>$request->username,'password'=>$request->password, 'admin'=>1])){
                Session::put('username',$request->username);
                $user = User::getUserByUsername($request->username);
                Session::put('user_id',$user->user_id);
                return redirect('admin/home')->with("thongbao","Đăng nhập thành công");
            }
            else{
                return redirect('admin/login')->with("thongbao","Đăng nhập không thành công");
            }
        }
    }
}
