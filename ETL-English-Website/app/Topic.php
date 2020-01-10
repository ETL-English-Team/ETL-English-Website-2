<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Topic extends Model
{
    protected $table = 'topic';
    protected $primaryKey = 'topic_id';
    public $timestamps = false;

    public static function getAllTopic(){
        $data = DB::table('topic')->orderBy('level', 'asc')->get();
        return $data;
    }

    public static function getAllTopicUnlocked($level, $user_id){
        $data = DB::table('topic')
                ->join('level_result', 'level_result.level', '=', 'topic.level')
                ->where('topic.level','<=',$level)
                ->where('level_result.user_id', '=', $user_id)
                ->orderBy('topic.level', 'asc')
                ->get();

        return $data;
    }

    public static function getTopicForCurrentlyLevel($level){
        $data = DB::table('topic')
                ->where('topic.level','=',$level)
                ->first();

        return $data;
    }

    public static function getTopicById($topic_id){
        $data = DB::table('topic')
                ->where('topic.topic_id','=',$topic_id)
                ->first();

        return $data;
    }

    public static function getMaxLevel(){
        $data = DB::table('topic')->max('level');
        return $data;
    }

    public static function insertTopic($topic_name_en, $topic_name_vi, $image, $level){
        DB::table('topic')->insert(['topic_name_en'=>$topic_name_en,
                                    'topic_name_vi'=>$topic_name_vi,
                                    'image'=>$image,
                                    'level'=>$level]);
    }

    public static function updateTopicWithImg($topic_id, $topic_name_en, $topic_name_vi, $image){
        DB::table('topic')->where('topic_id', '=', $topic_id)
                        ->update(['topic_name_en'=>$topic_name_en,
                                    'topic_name_vi'=>$topic_name_vi,
                                    'image'=>$image]);
    }

    public static function updateTopicNotWithImg($topic_id, $topic_name_en, $topic_name_vi){
        DB::table('topic')->where('topic_id', '=', $topic_id)
                        ->update(['topic_name_en'=>$topic_name_en,
                                    'topic_name_vi'=>$topic_name_vi]);
    }
}
