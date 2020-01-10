<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\LevelResult;

class CreateUserController extends Controller
{
    public function showUserSignUpView(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        return view('user.sign-up', ['user'=>$user]);
    }

    public function userSignUp(Request $request){
        if ($request->btn_sign_up){
            $this->validate($request,
                            ['email'=>'required',
                            'username'=>'required',
                            'password'=>'required',
                            'confirm_password'=>'required'],
                            
                            ['email.required'=>"Bạn chưa nhập email",
                            'username.required'=>'Bạn chưa nhập username',
                            'password.required'=>'Bạn chưa nhập password',
                            'confirm_password.required'=>'Bạn chưa nhập lại password']);

            $email = $request->email;
            $username = $request->username;
            $password = $request->password;
            $confirm_password = $request->confirm_password;
            $fullname = $request->fullname;
            $check_username = User::checkUsernameExistsOrNot($username);
            $avatar = 'assets/images/logo/logo.png';

            if ($password != $confirm_password){
                return redirect('sign-up')->with('thongbaoloi','Mật khẩu nhập lại không đúng');
            }
            elseif ($check_username != 0 ){
                return redirect('sign-up')->with('thongbaoloi','Username đã tồn tại, vui lòng chọn username khác');
            }
            else{
                $password_save = bcrypt($password);
                $user = new User;
                $user->username = $username;
                $user->password = $password_save;
                $user->admin = 0;
                $user->email = $email;
                $user->avatar = $avatar;
                $user->fullname = $fullname;
                $user->save();

                $user_id_inserted = $user->user_id;
                $max_level = 10;
                for($level = 1; $level<=$max_level; $level++){
                    LevelResult::insertLevelResult($user_id_inserted, $level);
                }

                return redirect('sign-up')->with('thongbao','Tạo tài khoản thành công!');
            }
        }
    }

    public function showViewCreateAdminAccount(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        return view('admin.create-admin-account',['user'=>$user]);
    }

    public function createAdminAccount(Request $request){
        if ($request->btn_create_account){
            $this->validate($request,
                            ['email'=>'required',
                            'username'=>'required',
                            'fullname'=>'required',
                            'birthday'=>'required'],
                            
                            ['email.required'=>"Bạn chưa nhập email",
                            'username.required'=>'Bạn chưa nhập username',
                            'fullname.required'=>'Bạn chưa nhập họ tên',
                            'birthday.required'=>'Bạn chưa nhập ngày sinh']);

            $email = $request->email;
            $username = $request->username;
            $password = bcrypt($username);
            $fullname = $request->fullname;
            $birthday = $request->birthday;
            $job = 'Nhân viên văn phòng';
            $working_at = 'ETL English Co';
            $check_username = User::checkUsernameExistsOrNot($username);
            $avatar = 'assets/images/logo/logo.png';

            if ($check_username != 0 ){
                return redirect('sign-up')->with('thongbaoloi','Username đã tồn tại, vui lòng chọn username khác');
            }
            else{
                $password_save = bcrypt($password);
                $user = new User;
                $user->username = $username;
                $user->password = $password;
                $user->admin = 1;
                $user->email = $email;
                $user->avatar = $avatar;
                $user->fullname = $fullname;
                $user->birthday = $birthday;
                $user->job = $job;
                $user->working_at = $working_at;
                $user->save();
                return redirect('admin/create-admin-account')->with('thongbao','Tạo tài khoản thành công!');
            }
        }
    }
}
