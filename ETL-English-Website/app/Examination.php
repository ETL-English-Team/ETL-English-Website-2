<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Examination extends Model
{
    protected $table = 'examination';
    protected $primaryKey = 'examination_id';
    public $timestamps = true;

    public static function deleteExam($examination_id){
        DB::table('examination')->where('examination_id','=',$examination_id)->delete();
    }

    public static function updateExamPoint($examination_id, $point){
        DB::table('examination')->where('examination_id','=',$examination_id)->update(['point'=>$point]);
    }
}
