<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Topic;
use App\WordEn;
use App\User;
use App\CurrentlyLevel;

class TopicController extends Controller
{
    public function showView(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        $currently_level = CurrentlyLevel::getCurrentlyLevelById($user_id);
        $unlocked_topic_list = Topic::getAllTopicUnlocked($currently_level->currently_level, $user_id);
        $currently_topic = Topic::getTopicForCurrentlyLevel($currently_level->currently_level);
        return view('user.level-list',['unlocked_topic_list'=>$unlocked_topic_list,
                                        'currently_topic'=>$currently_topic,
                                        'user'=>$user]);
    }

    public function showViewTopicList(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);

        $topic_list = Topic::getAllTopic();
        $max_level = Topic::getMaxLevel();
        $num_of_voca = WordEn::getNumOfVoca();
        return view('admin.topic-list',['topic_list'=>$topic_list,
                                        'max_level'=>$max_level+1,
                                        'num_of_voca'=>$num_of_voca,
                                        'user'=>$user]);
    }

    public function showViewInsertTopic(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);

        $max_level = Topic::getMaxLevel();
        $num_of_voca = WordEn::getNumOfVoca();
        return view('admin.insert-topic',['max_level'=>$max_level+1,
                                        'num_of_voca'=>$num_of_voca,
                                        'user'=>$user]);
    }

    public function showViewUpdateTopic($id){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);

        $max_level = Topic::getMaxLevel();
        $num_of_voca = WordEn::getNumOfVoca();

        $topic = Topic::getTopicById($id);

        return view('admin.update-topic', ['max_level'=>$max_level+1,
                                            'num_of_voca'=>$num_of_voca,
                                            'user'=>$user,
                                            'topic'=>$topic]);
    }

    public function clickButtonEvent(Request $request){
        if ($request->btn_add_topic){
            $input_file_name = 'topic_img';
            $file = $request->file($input_file_name);
            $extension = $file->getClientOriginalExtension($input_file_name);
            $file_name = $request->topic_name_en.'.png';
            $path = 'assets/images/topic/'.$file_name;
            if ($extension!='png' && $extension!='jpg'){
                return redirect('admin/insert-topic')->with('thongbaoloi','Sai định dạng file (chỉ nhận file .jpg và .png). Vui lòng kiểm tra lại');
            }
            else{
                $this->insertTopic($request, $path);
                $file->move('assets/images/topic',$file_name);
                return redirect('admin/insert-topic')->with('thongbao','Thêm thành công');
            }
        }

        if($request->btn_see_voca_list){
            $topic_id = $request->topic_id;
            return redirect('admin/vocabulary-list/'.$topic_id);
        }

        if ($request->btn_update_topic){
            if ($request->topic_img){
                $input_file_name = 'topic_img';
                $file = $request->file($input_file_name);
                $extension = $file->getClientOriginalExtension($input_file_name);
                $file_name = $request->topic_name_en.'.png';
                $path = 'assets/images/topic/'.$file_name;
                if ($extension!='png' && $extension!='jpg'){
                    return redirect('admin/insert-topic')->with('thongbaoloi','Sai định dạng file (chỉ nhận file .jpg và .png). Vui lòng kiểm tra lại');
                }
                else{
                    $this->updateTopic($request, $path);
                    $file->move('assets/images/topic',$file_name);
                    return redirect('admin/update-topic/'.$request->topic_id)->with('thongbao', 'Cập nhật thành công');
                }
            }
            else{
                $this->updateTopic($request, null);
                return redirect('admin/update-topic/'.$request->topic_id)->with('thongbao', 'Cập nhật thành công');
            }
        }
    }

    public function insertTopic($request, $image_name){
        $this->validate($request,
                        ['topic_name_en'=>'required',
                        'topic_name_vi'=>'required',
                        'topic_img'=>'required'],
                        
                        ['topic_name_en.required'=>"Bạn chưa nhập tên chủ đề (English)",
                        'topic_name_vi.required'=>'Bạn chưa nhập tên chủ đề (Vietnamese)',
                        'topic_img.required'=>'Bạn chưa chọn hình ảnh']);

        Topic::insertTopic($request->topic_name_en, $request->topic_name_vi, $image_name, $request->level);
    }

    public function updateTopic($request, $image_name){
        $this->validate($request,
                        ['topic_name_en'=>'required',
                        'topic_name_vi'=>'required'],
                        
                        ['topic_name_en.required'=>"Bạn chưa nhập tên chủ đề (English)",
                        'topic_name_vi.required'=>'Bạn chưa nhập tên chủ đề (Vietnamese)']);

        if ($request->topic_img){
            Topic::updateTopicWithImg($request->topic_id, $request->topic_name_en, $request->topic_name_vi, $image_name);
        }
        else{
            Topic::updateTopicNotWithImg($request->topic_id, $request->topic_name_en, $request->topic_name_vi);
        }
    }
}
