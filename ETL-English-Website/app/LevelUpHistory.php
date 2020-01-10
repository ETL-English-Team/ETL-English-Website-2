<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class LevelUpHistory extends Model
{
    protected $table = 'level_up_history';
    protected $primaryKey = 'user_id';
    public $timestamps = true;

    public static function insertLevelUpHistory($user_id, $field_id, $level_up_to){
        DB::table('level_up_history')
            ->insert(['user_id'=>$user_id,
                        'field_id'=>$field_id,
                        'level_up_to'=>$level_up_to,
                        'level_up_at'=>now()]);
    }
}
