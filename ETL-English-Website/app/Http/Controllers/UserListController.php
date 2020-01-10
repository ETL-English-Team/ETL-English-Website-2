<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserListController extends Controller
{
    public function showViewAdminListTable(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        $admin_list = User::getAdminList();
        return view('admin.admin-list-table', ['user'=>$user,
                                                'admin_list'=>$admin_list]);
    }

    public function showViewUserListTable(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        $user_list = User::getUserList();
        return view('admin.user-list-table', ['user'=>$user,
                                                'user_list'=>$user_list]);
    }
}
