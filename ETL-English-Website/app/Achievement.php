<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Achievement extends Model
{
    protected $table = 'achievement_category';
    protected $primaryKey = 'achievement_id';
    public $timestamps = false;

    public static function getTotalAchievementOfuser($user_id){
        $data = DB::table('achieved_detail')
                ->where('user_id','=',$user_id)
                ->count();

        return $data;
    }
}
