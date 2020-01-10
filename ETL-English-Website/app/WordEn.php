<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class WordEn extends Model
{
    protected $table = 'word_en';
    protected $primaryKey = 'word_id';
    public $timestamps = false;

    public static function getAllVocabularyOnceTopic($topic_id){
        $data = DB::table('word_en')
                ->join('topic','topic.topic_id','=','word_en.topic_id')
                ->where('word_en.topic_id','=',$topic_id)
                ->select('word_en.word_id',
                        'word',
                        'topic_name_vi',
                        'spelling',
                        'voice',
                        'word_en.image',
                        'example_sentence',
                        'meaning_1',
                        'meaning_2',
                        'meaning_3')
                ->get();

        return $data;
    }

    public static function getAllVocaRandomByLevel($level){
        $data = DB::table('word_en')
                ->join('topic','topic.topic_id','=','word_en.topic_id')
                ->where('topic.level','=',$level)
                ->select('word_en.word_id')
                ->inRandomOrder()
                ->get();

        return $data;
    }

    public static function getNumOfVoca(){
        $data = DB::table('word_en')->count('word_id');
        return $data;
    }

    public static function insertVoca($word, $topic_id, $spelling, $voice, $image, $meaning_1, $meaning_2, $meaning_3, $example_sentence){
        DB::table('word_en')->insert(['word'=>$word,
                                        'topic_id'=>$topic_id,
                                        'spelling'=>$spelling,
                                        'voice'=>$voice,
                                        'image'=>$image,
                                        'meaning_1'=>$meaning_1,
                                        'meaning_2'=>$meaning_2,
                                        'meaning_3'=>$meaning_3,
                                        'example_sentence'=>$example_sentence]);
    }

    public static function getNumOfVocaLearned($level){
        $data = DB::table('word_en')
                ->join('topic','topic.topic_id','=','word_en.topic_id')
                ->where('level','<',$level)
                ->count('word');

        return $data;
    }

    public static function getOneVocaInAllTopicRandom(){
        $data = DB::table('word_en')
                    ->inRandomOrder()
                    ->first();
        
        return $data;
    }

    public static function getVocaById($word_id){
        $data = DB::table('word_en')
                    ->join('topic', 'topic.topic_id', '=', 'word_en.topic_id')
                    ->where('word_id', '=', $word_id)
                    ->first();

        return $data;
    }

    public static function updateVocaWithImgAndSound($word_id ,$word, $topic_id, $spelling, $voice, $image, $meaning_1, $meaning_2, $meaning_3, $example_sentence){
        DB::table('word_en')->where('word_id','=',$word_id)
                            ->update(['word'=>$word,
                                        'topic_id'=>$topic_id,
                                        'spelling'=>$spelling,
                                        'voice'=>$voice,
                                        'image'=>$image,
                                        'meaning_1'=>$meaning_1,
                                        'meaning_2'=>$meaning_2,
                                        'meaning_3'=>$meaning_3,
                                        'example_sentence'=>$example_sentence]);
    }

    public static function updateVocaWithImg($word_id ,$word, $topic_id, $spelling, $image, $meaning_1, $meaning_2, $meaning_3, $example_sentence){
        DB::table('word_en')->where('word_id','=',$word_id)
                            ->update(['word'=>$word,
                                        'topic_id'=>$topic_id,
                                        'spelling'=>$spelling,
                                        'image'=>$image,
                                        'meaning_1'=>$meaning_1,
                                        'meaning_2'=>$meaning_2,
                                        'meaning_3'=>$meaning_3,
                                        'example_sentence'=>$example_sentence]);
    }

    public static function updateVocaWithSound($word_id ,$word, $topic_id, $spelling, $voice, $meaning_1, $meaning_2, $meaning_3, $example_sentence){
        DB::table('word_en')->where('word_id','=',$word_id)
                            ->update(['word'=>$word,
                                        'topic_id'=>$topic_id,
                                        'spelling'=>$spelling,
                                        'voice'=>$voice,
                                        'meaning_1'=>$meaning_1,
                                        'meaning_2'=>$meaning_2,
                                        'meaning_3'=>$meaning_3,
                                        'example_sentence'=>$example_sentence]);
    }

    public static function updateVocaNotWithImgAndSound($word_id ,$word, $topic_id, $spelling, $meaning_1, $meaning_2, $meaning_3, $example_sentence){
        DB::table('word_en')->where('word_id','=',$word_id)
                            ->update(['word'=>$word,
                                        'topic_id'=>$topic_id,
                                        'spelling'=>$spelling,
                                        'meaning_1'=>$meaning_1,
                                        'meaning_2'=>$meaning_2,
                                        'meaning_3'=>$meaning_3,
                                        'example_sentence'=>$example_sentence]);
    }
}
