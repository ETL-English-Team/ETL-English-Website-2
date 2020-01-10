<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckFileController extends Controller
{
    public static function checkFormatFile($value, $accept_type_arr){
        $result = false;
        foreach ($accept_type_arr as $type){
            if ($value == $type){
                $result = true;
                break;
            }
        }
        return $result;
    }

    public function checkTopicImageUpload($value){
        $accept_type_arr = array('png','jpg');
        $result = $this->checkFormatFile($value, $accept_type_arr);
        if ($result == false){
            echo '<div class="col-xs-3 col-sm-2 col-md-3 col-lg-2"></div>
                <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                    <div style="float:left">Chọn file hình ảnh sai định dạng. Vui lòng kiểm tra lại (File cho phép: .png , .jpg)</div>
                </div>';
        }
    }

    public function checkVocaSoundUpload($value){
        $accept_type_arr = array('mp3');
        $result = $this->checkFormatFile($value, $accept_type_arr);
        if ($result == false){
            echo '<div class="col-xs-3 col-sm-2 col-md-3 col-lg-2"></div>
                <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                    <div style="float:left">Chọn file âm thanh sai định dạng. Vui lòng kiểm tra lại (File cho phép: .mp3)</div>
                </div>';
        }
    }
}
