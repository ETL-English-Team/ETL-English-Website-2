<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CurrentlyLevel;
use App\WordEn;
use App\User;
use App\Achievement;
use App\Topic;
use Session;

class UserController extends Controller
{
    public function showViewUserHome(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        $total_achievement = Achievement::getTotalAchievementOfUser($user_id);
        $currently_level = CurrentlyLevel::getCurrentlyLevelById($user_id);
        $num_of_voca_learned = WordEn::getNumOfVocaLearned($currently_level->currently_level);
        return view ('user.home',['currently_level'=>$currently_level,
                                'num_of_voca_learned'=>$num_of_voca_learned,
                                'user'=>$user,
                                'total_achievement'=>$total_achievement]);
    }

    public function showViewAdminHome(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        $max_level = Topic::getMaxLevel();
        $num_of_voca = WordEn::getNumOfVoca();
        $num_of_user = User::getNumOfUser();
        return view ('admin.home', ['user'=>$user,
                                    'max_level'=>$max_level,
                                    'num_of_voca'=>$num_of_voca,
                                    'num_of_user'=>$num_of_user]);
    }

    public function showViewUserDevelopmentView(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        return view('user.development-view', ['user'=>$user]);
    }

    public function showViewAdminDevelopmentView(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        return view('admin.development-view', ['user'=>$user]);
    }

    public function userLogout(){
        session()->flush();
        return redirect('login');
    }

    public function adminLogout(){
        session()->flush();
        return redirect('admin/login');
    }
}
