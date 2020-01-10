<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ExaminationQuestion extends Model
{
    protected $table = 'examination_question';
    protected $primaryKey = 'examination_question_id';
    public $timestamps = true;

    public static function getExamQuestionByExamPartId($examination_part_id){
        $data = DB::table('examination_question')
                ->where('examination_part','=',$examination_part_id)
                ->get();

        return $data;
    }

    //Lấy câu hỏi theo mã phần thi và số thứ tự câu hỏi
    public static function getQuestByPartIdAndQuestNum($examination_part_id, $question_number){
        $data = DB::table('examination_question')
                ->join('examination_part','examination_part.examination_part_id','=','examination_question.examination_part_id')
                ->join('word_en','word_en.word_id','=','examination_question.word_id')
                ->where('examination_question.examination_part_id','=',$examination_part_id)
                ->where('examination_question.question_number','=',$question_number)
                ->select('examination_question.word_id',
                        'examination_question.question_number',
                        'word',
                        'spelling',
                        'voice',
                        'image',
                        'meaning_1')
                ->first();

        return $data;
    }

    //Lấy số câu hỏi theo mã phần thi
    public static function getNumOfQuestionForFirstExam($examination_part_id){
        $data = DB::table('examination_question')
                ->join('examination_part','examination_part.examination_part_id','=','examination_question.examination_part_id')
                ->join('word_en','word_en.word_id','=','examination_question.word_id')
                ->where('examination_question.examination_part_id','=',$examination_part_id)
                ->count();

        return $data;
    }

    public static function updateResultQuestion($examination_part_id ,$question_number, $result){
        $examination_question = DB::table('examination_question')
                                ->where('examination_part_id','=',$examination_part_id)
                                ->where('question_number','=',$question_number)
                                ->update(['result'=>$result]);
    }

    public static function getNumOfTrueOrFalseQuestion($examination_part_id ,$question_number, $result){
        $data = DB::table('examination_question')
                                ->where('examination_part_id','=',$examination_part_id)
                                ->where('question_number','=',$question_number)
                                ->where('result','=',$result)
                                ->count();

        return $data;
    }

    public static function deleteExamQuestion($examination_part_id){
        DB::table('examination_question')->where('examination_part_id','=',$examination_part_id)->delete();
    }
}
