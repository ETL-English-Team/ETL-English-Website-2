<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurrentlyLevel;
use App\User;

class ProfileController extends Controller
{
    public function showViewUserProfile(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        $currently_level = CurrentlyLevel::getCurrentlyLevelById($user_id);
        return view('user.profile', ['user'=>$user,
                                    'currently_level'=>$currently_level]);
    }
}
