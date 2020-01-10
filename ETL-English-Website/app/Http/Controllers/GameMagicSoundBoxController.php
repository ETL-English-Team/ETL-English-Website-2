<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\WordEn;
use Session;

class GameMagicSoundBoxController extends Controller
{
    protected function showViewMagicSoundBoxRules(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        return view ('user.magic-sound-box-rules', ['user'=>$user]);
    }

    protected function showViewMagicSoundBox(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        $MSB_question = $this->getMSBQuestion();
        $MSB_question_number = session()->get('MSB_question_number');
        return view('user.magic-sound-box', ['user'=>$user,
                                            'MSB_question'=> $MSB_question,
                                            'MSB_question_number'=> $MSB_question_number]);
    }

    protected static function getMSBQuestion(){
        $MSB_question = WordEn::getOneVocaInAllTopicRandom();
        Session::put('MSB_question_answer', $MSB_question->word);
        return $MSB_question;
    }

    protected function increaseMSBQuestionNumber(){
        $MSB_question_number = session()->get('MSB_question_number');
        Session::put('MSB_question_number', $MSB_question_number+1);
    }

    protected static function acceptOrNotRules(Request $request){
        if ($request->btn_accept){
            Session::put('MSB_question_number', 1);
            return redirect('magic-sound-box');
        }
        if ($request->btn_later){
            return redirect('home');
        }
    }
}
