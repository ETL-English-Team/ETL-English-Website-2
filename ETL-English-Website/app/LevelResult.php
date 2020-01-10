<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LevelResult extends Model
{
    protected $table = 'level_result';
    protected $primaryKey = 'user_id';
    public $timestamps = false;
    
    public static function getMaxPointByUserId($user_id, $level){
        $data = DB::table('level_result')
                    ->where('user_id','=',$user_id)
                    ->where('level','=',$level)
                    ->max('point');

        return $data;
    }

    public static function updateLevelResult($user_id, $level, $point, $star){
        DB::table('level_result')
            ->where('user_id','=',$user_id)
            ->where('level','=',$level)
            ->update(['point'=>$point, 'star'=>$star]);
    }

    public static function insertLevelResult($user_id, $level){
        DB::table('level_result')->insert(['user_id'=>$user_id,
                                            'level'=>$level,
                                            'point'=>0,
                                            'star'=>0]);
    }
}
