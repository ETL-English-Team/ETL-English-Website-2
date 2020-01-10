<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class ExaminationCategory extends Model
{
    protected $table = 'examination_category';
    protected $primaryKey = 'examination_category_id';
    public $timestamps = false;

    public static function getAllExamCategory(){
        $data = DB::table('examination_category')
                ->get();

        return $data;
    }

    public static function getExamCategoryById($examination_category_id){
        $data = DB::table('examination_category')
                ->where('examination_category_id','=',$examination_category_id)
                ->first();

        return $data;
    }
}
