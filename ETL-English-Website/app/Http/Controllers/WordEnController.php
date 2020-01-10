<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WordEn;
use App\Topic;
use App\User;

class WordEnController extends Controller
{
    public function showView($id){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        $vocabulary_list = WordEn::getAllVocabularyOnceTopic($id);
        $topic = Topic::getTopicById($id);

        return view('user.vocabulary',['vocabulary_list'=>$vocabulary_list,
                                        'topic'=>$topic,
                                        'user'=>$user]);
    }

    public function showViewVocaList($id){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);

        $voca_list = WordEn::getAllVocabularyOnceTopic($id);
        $max_level = Topic::getMaxLevel();
        $num_of_voca = WordEn::getNumOfVoca();
        $topic = Topic::getTopicById($id);
        return view('admin.vocabulary-list',['voca_list'=>$voca_list,
                                            'max_level'=>$max_level+1,
                                            'num_of_voca'=>$num_of_voca,
                                            'topic'=>$topic,
                                            'user'=>$user ]);
    }

    public function showViewInsertVoca($id){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);

        $topic = Topic::getTopicById($id);
        $max_level = Topic::getMaxLevel();
        $num_of_voca = WordEn::getNumOfVoca();
        return view('admin.insert-vocabulary', ['topic'=>$topic,
                                            'max_level'=>$max_level+1,
                                            'num_of_voca'=>$num_of_voca,
                                            'user'=>$user]);
    }

    public function showViewUpdateVocabulary($id){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);

        $voca = WordEn::getVocaById($id);
        $max_level = Topic::getMaxLevel();
        $num_of_voca = WordEn::getNumOfVoca();
        return view('admin.update-vocabulary', ['voca'=>$voca,
                                            'max_level'=>$max_level+1,
                                            'num_of_voca'=>$num_of_voca,
                                            'user'=>$user]);
    }

    public function clickButtonEvent(Request $request){
        if ($request->btn_add_voca){
            $topic_name_en = $request->topic_name_en;
            $input_file_image_name = 'voca_img';
            $input_file_sound_name = 'voca_sound';
            $image_file = $request->file($input_file_image_name);
            $sound_file = $request->file($input_file_sound_name);
            $image_extension = $image_file->getClientOriginalExtension($input_file_image_name);
            $sound_extension = $sound_file->getClientOriginalExtension($input_file_sound_name);
            $image_name = $request->word.'.png';
            $sound_name = $request->word.'.mp3';
            $image_path = 'assets/images/toeic/'.$topic_name_en.'/'.$image_name;
            $sound_path = 'assets/sound/toeic/'.$topic_name_en.'/'.$sound_name;
            if (($image_extension!='png' && $image_extension!='jpg') && $sound_extension!='mp3'){
                return redirect('admin/insert-topic')->with('thongbaoloi','Sai định dạng file (chỉ nhận file .jpg và .png đối với hình ảnh, .p3 đối với âm thanh). Vui lòng kiểm tra lại');
            }
            else{
                $this->insertVoca($request, $image_path, $sound_path);
                $image_file->move('assets/images/toeic/'.$topic_name_en.'/',$image_name);
                $sound_file->move('assets/sound/toeic/'.$topic_name_en.'/',$sound_name);
                return redirect('admin/insert-vocabulary/'.$request->topic_id)->with('thongbao','Thêm thành công');
            }
        }

        if ($request->btn_update_voca){
            $topic_name_en = $request->topic_name_en;
            $input_file_image_name = 'voca_img';
            $input_file_sound_name = 'voca_sound';
            if ($request->voca_img && $request->voca_sound){
                $image_file = $request->file($input_file_image_name);
                $sound_file = $request->file($input_file_sound_name);
                $image_extension = $image_file->getClientOriginalExtension($input_file_image_name);
                $sound_extension = $sound_file->getClientOriginalExtension($input_file_sound_name);
                $image_name = $request->word.'.png';
                $sound_name = $request->word.'.mp3';
                $image_path = 'assets/images/toeic/'.$topic_name_en.'/'.$image_name;
                $sound_path = 'assets/sound/toeic/'.$topic_name_en.'/'.$sound_name;
                if (($image_extension!='png' && $image_extension!='jpg') && $sound_extension!='mp3'){
                    return redirect('admin/update-vocabulary/'.$request->word_id)->with('thongbaoloi','Sai định dạng file (chỉ nhận file .jpg và .png đối với hình ảnh, .p3 đối với âm thanh). Vui lòng kiểm tra lại');
                }
                else{
                    $this->updateVoca($request, $image_path, $sound_path);
                    $image_file->move('assets/images/toeic/'.$topic_name_en.'/',$image_name);
                    $sound_file->move('assets/sound/toeic/'.$topic_name_en.'/',$sound_name);
                    return redirect('admin/update-vocabulary/'.$request->word_id)->with('thongbao','Cập nhật thành công');
                }
            }
            elseif($request->voca_img){
                $image_file = $request->file($input_file_image_name);
                $image_extension = $image_file->getClientOriginalExtension($input_file_image_name);
                $image_name = $request->word.'.png';
                $image_path = 'assets/images/toeic/'.$topic_name_en.'/'.$image_name;
                if ($image_extension!='png' && $image_extension!='jpg'){
                    return redirect('admin/update-vocabulary/'.$request->word_id)->with('thongbaoloi','Sai định dạng file (chỉ nhận file .jpg và .png đối với hình ảnh, .p3 đối với âm thanh). Vui lòng kiểm tra lại');
                }
                else{
                    $this->updateVoca($request, $image_path, null);
                    $image_file->move('assets/images/toeic/'.$topic_name_en.'/',$image_name);
                    return redirect('admin/update-vocabulary/'.$request->word_id)->with('thongbao','Cập nhật thành công');
                }
            }
            elseif($request->voca_sound){
                $sound_file = $request->file($input_file_sound_name);
                $sound_extension = $sound_file->getClientOriginalExtension($input_file_sound_name);
                $sound_name = $request->word.'.mp3';
                $sound_path = 'assets/sound/toeic/'.$topic_name_en.'/'.$sound_name;
                if ($sound_extension!='mp3'){
                    return redirect('admin/update-vocabulary/'.$request->word_id)->with('thongbaoloi','Sai định dạng file (chỉ nhận file .jpg và .png đối với hình ảnh, .p3 đối với âm thanh). Vui lòng kiểm tra lại');
                }
                else{
                    $this->updateVoca($request, null, $sound_path);
                    $sound_file->move('assets/sound/toeic/'.$topic_name_en.'/',$sound_name);
                    return redirect('admin/update-vocabulary/'.$request->word_id)->with('thongbao','Cập nhật thành công');
                }
            }
            else{
                $this->updateVoca($request, null, null);
                return redirect('admin/update-vocabulary/'.$request->word_id)->with('thongbao','Cập nhật thành công');
            }
        }
    }
    
    public function insertVoca($request, $image_name, $sound_name){
        $this->validate($request,
                        ['spelling'=>'required',
                        'voca_sound'=>'required',
                        'voca_img'=>'required',
                        'meaning_1'=>'required',
                        'example_sentence'=>'required',
                        'word'=>'required'],
                        
                        ['spelling.required'=>"Bạn chưa nhập phiên âm của từ",
                        'voice.required'=>'Bạn chưa chọn file phát âm cho từ',
                        'image.required'=>'Bạn chưa chọn hình ảnh',
                        'meaning_1.required'=>'Bạn chưa nhập nghĩa 1 cho từ',
                        'example_sentence.required'=>'Bạn chưa nhập câu ví dụ cho từ',
                        'word.required'=>'Bạn chưa nhập từ']);

        WordEn::insertVoca($request->word, 
                        $request->topic_id, 
                        $request->spelling, 
                        $sound_name,
                        $image_name,
                        $request->meaning_1,
                        $request->meaning_2,
                        $request->meaning_3,
                        $request->example_sentence);
    }

    public function updateVoca($request, $image_name, $sound_name){
        $this->validate($request,
                        ['spelling'=>'required',
                        'meaning_1'=>'required',
                        'example_sentence'=>'required',
                        'word'=>'required'],
                        
                        ['spelling.required'=>"Bạn chưa nhập phiên âm của từ",
                        'meaning_1.required'=>'Bạn chưa nhập nghĩa 1 cho từ',
                        'example_sentence.required'=>'Bạn chưa nhập câu ví dụ cho từ',
                        'word.required'=>'Bạn chưa nhập từ']);

        if ($request->voca_img && $request->voca_sound){
            WordEn::updateVocaWithImgAndSound(
                        $request->word_id,
                        $request->word, 
                        $request->topic_id, 
                        $request->spelling, 
                        $sound_name,
                        $image_name,
                        $request->meaning_1,
                        $request->meaning_2,
                        $request->meaning_3,
                        $request->example_sentence);
        }
        elseif ($request->voca_img){
            WordEn::updateVocaWithImg(
                        $request->word_id,
                        $request->word, 
                        $request->topic_id, 
                        $request->spelling,
                        $image_name,
                        $request->meaning_1,
                        $request->meaning_2,
                        $request->meaning_3,
                        $request->example_sentence);
        }
        elseif ($request->voca_sound){
            WordEn::updateVocaWithSound(
                        $request->word_id,
                        $request->word, 
                        $request->topic_id, 
                        $request->spelling, 
                        $sound_name,
                        $request->meaning_1,
                        $request->meaning_2,
                        $request->meaning_3,
                        $request->example_sentence);
        }
        else{
            WordEn::updateVocaNotWithImgAndSound(
                        $request->word_id,
                        $request->word, 
                        $request->topic_id, 
                        $request->spelling,
                        $request->meaning_1,
                        $request->meaning_2,
                        $request->meaning_3,
                        $request->example_sentence);
        }
    }
}
