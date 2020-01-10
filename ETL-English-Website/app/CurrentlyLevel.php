<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class CurrentlyLevel extends Model
{
    protected $table = 'currently_level';
    protected $primaryKey ='user_id';
    public $timestamp = false;

    public static function updateCurrentlyLevel($user_id, $field_id, $level){
        DB::table('currently_level')
            ->where('user_id','=',$user_id)
            ->where('field_id','=',$field_id)
            ->update(['currently_level'=>$level]);
    }

    public static function getCurrentlyLevelById($user_id){
        $data = DB::table('currently_level')
                ->where('user_id','=',$user_id)
                ->select('currently_level')
                ->first();

        return $data;
    }

}
