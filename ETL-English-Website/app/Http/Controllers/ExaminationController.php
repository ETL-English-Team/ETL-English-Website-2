<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examination;
use App\ExaminationCategory;
use App\ExaminationPart;
use App\ExaminationQuestion;
use App\WordEn;
use App\User;
use App\LevelResult;
use App\CurrentlyLevel;
use App\LevelUpHistory;
use Session;

class ExaminationController extends Controller
{

    //Show view quy tắc phòng thi
    public function showExamRulesView($level){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);
        return view('user.examination-rules',['level_to_exam'=>$level,
                                                'user'=>$user]);
    }

    //Kiểm tra xem người dùng nhấn nút thi hay để sau
    public function acceptOrNotRules(Request $request){
        if($request->btn_accept){
            //Xác định level và lưu session level
            $level = $request->level_to_exam;
            Session::put('level_to_exam',$level);

            //Xác định user_id
            $user_id = session()->get('user_id');

            //Tạo exam và thêm vào cơ sở dữ liệu, lưu session exam_id
            $exam = new Examination;
            $exam->level = $level;
            $exam->user_id = $user_id;
            $exam->save();
            $exam_id_inserted = $exam->examination_id;
            Session::put('exam_id',$exam_id_inserted);

            //tạo exam part 1 cho exam và lưu session exam_part_id
            $this->insertExaminationPart('exam_id',1,'exam_part1_id');
            $this->insertExaminationPart('exam_id',2,'exam_part2_id');

            //tạo danh sách câu hỏi cho exam part
            $this->createQuestionListForExamPart('exam_part1_id');
            $this->createQuestionListForExamPart('exam_part2_id');

            //Lưu các session mặc định về số câu hỏi của exam part, số câu hỏi đúng=0, số câu hỏi sai=0, câu hỏi bắt đầu = 1 cho exam part
            $this->putSessionAboutNumOfQuestion('exam_part1_id', 1);
            $this->putSessionAboutNumOfQuestion('exam_part2_id', 2);

            //Set part hiện tại là 1
            Session::put('current_part',1);
            //trỏ sang địa chỉ bài bài kiểm tra phần 1
            return redirect('examination/');
        }
        if($request->btn_later){
            return redirect('home');
        }
    }

    //Lấy nội dung câu hỏi
    public static function getExamQuestion(){
        $current_part = session()->get('current_part');
        if ($current_part == 1){
            $exam_question_number = session()->get('exam_question_number_part1');
            $exam_part_id = session()->get('exam_part1_id');
            $exam_question = ExaminationQuestion::getQuestByPartIdAndQuestNum($exam_part_id, $exam_question_number);
            return $exam_question;
        }
        elseif ($current_part == 2){
            $exam_question_number = session()->get('exam_question_number_part2');
            $exam_part_id = session()->get('exam_part2_id');
            $exam_question = ExaminationQuestion::getQuestByPartIdAndQuestNum($exam_part_id, $exam_question_number);
            return $exam_question;
        }
    }

    //Hàm chạy khi truy cập route first-examination
    protected function showExamView(){
        $username = session()->get('username');
        $user_id = session()->get('user_id');
        $user = User::getUserByUsername($username);

        $current_part = session()->get('current_part');
        if($current_part<=2){
            $exam_question = $this->getExamQuestion();
            $first_exam = ExaminationCategory::getExamCategoryById($current_part);
            $num_of_question = session()->get('num_of_question_part'.$current_part);
            $num_of_true_question = session()->get('num_of_true_question_part'.$current_part);
            $num_of_false_question = session()->get('num_of_false_question_part'.$current_part);
            $level = session()->get('level_to_exam');
            
            if ($current_part==1){
                return view('user.first-examination',['first_exam'=>$first_exam,
                                                    'exam_question'=>$exam_question,
                                                    'num_of_question'=>$num_of_question,
                                                    'num_of_true_question'=>$num_of_true_question,
                                                    'num_of_false_question'=>$num_of_false_question,
                                                    'level'=>$level,
                                                    'user'=>$user]);
            }
            if($current_part==2){
                $num_of_question_total = session()->get('num_of_question_part'.($current_part-1)) + $num_of_question;
                $num_of_true_question_total = session()->get('num_of_true_question_part'.($current_part-1)) + $num_of_true_question;
                $num_of_false_question_total = session()->get('num_of_false_question_part'.($current_part-1)) + $num_of_false_question;
                return view('user.second-examination',['first_exam'=>$first_exam,
                                                    'exam_question'=>$exam_question,
                                                    'num_of_question'=>$num_of_question,
                                                    'num_of_true_question'=>$num_of_true_question,
                                                    'num_of_false_question'=>$num_of_false_question,
                                                    'level'=>$level,
                                                    'num_of_question_total'=>$num_of_question_total,
                                                    'num_of_true_question_total'=>$num_of_true_question_total,
                                                    'num_of_false_question_total'=>$num_of_false_question_total,
                                                    'user'=>$user]);
            }
        }
        else{
            $this->saveExamResult();
            $this->deleteExamData();
            return redirect('level-list');
        }
    }

    //Hàm insert vào examination part và lưu examination_part_id vừa insert vào session
    protected function insertExaminationPart($exam_id ,$examination_category_id, $session_name){
        $examination_id = session()->get($exam_id);
        $exam_part = new ExaminationPart;
        $exam_part->examination_id = $examination_id;
        $exam_part->examination_category_id = $examination_category_id;
        $exam_part->point = 0;
        $exam_part->save();
        $exam_part_id_inserted = $exam_part->examination_part_id;
        Session::put($session_name ,$exam_part_id_inserted);
    }

    //Hàm insert vào examination question
    protected function insertExaminationQuestion ($exam_part1_id, $question_number, $word_id){
        $exam_part1_id = session()->get($exam_part1_id);

        $exam_question = new ExaminationQuestion;
        $exam_question->examination_part_id = $exam_part1_id;
        $exam_question->question_number = $question_number;
        $exam_question->word_id = $word_id;
        $exam_question->save();
    }

    //Hàm tạo ra loạt danh sách câu hỏi cho examination part
    protected function createQuestionListForExamPart($exam_part_id_session_name){
        $level = session()->get('level_to_exam');
        $voca_random_list = WordEn::getAllVocaRandomByLevel($level);
        $question_number = 1;
        foreach($voca_random_list as $voca){
            $word_id = $voca->word_id;
            $this->insertExaminationQuestion($exam_part_id_session_name, $question_number, $word_id);
            $question_number++;
        }
    }

    //Hàm lưu các session mặc định liên quan tới số câu hỏi của exam part như số câu hỏi, số câu đúng=0, số câu sai=0, câu bắt đầu=1
    protected function putSessionAboutNumOfQuestion($exam_part_id_session_name, $part){
        $exam_part_id = session()->get($exam_part_id_session_name);
        $num_of_question = ExaminationQuestion::getNumOfQuestionForFirstExam($exam_part_id);
        Session::put('num_of_question_part'.$part, $num_of_question);
        Session::put('num_of_true_question_part'.$part, 0);
        Session::put('num_of_false_question_part'.$part, 0);
        Session::put('exam_question_number_part'.$part,1);
    }

    //Hàm kiểm tra câu trả lời
    protected function checkAnswer($answer){
        $current_part = session()->get('current_part');
        $question_number = session()->get('exam_question_number_part'.$current_part);
        $question_number = session()->get('exam_question_number_part'.$current_part);
        $num_of_question = session()->get('num_of_question_part'.$current_part);

        if ($current_part == 1){
            $exam_part_id = session()->get('exam_part1_id');
        }
        else{
            $exam_part_id = session()->get('exam_part2_id');
        }

        $exam_question = ExaminationQuestion::getQuestByPartIdAndQuestNum($exam_part_id, $question_number);

        //check câu trả lời
        //Khi số thứ tự câu hỏi nhỏ hơn số câu hỏi
        if($question_number<$num_of_question){
            //Show data and update session
            $this->checkAnswerAndUpdateSession($answer, $exam_question->word, $current_part, $exam_part_id, $question_number, '');
        }

        //Khi số thứ tự câu hỏi đã bằng số câu hỏi và current part =1
        else if (($question_number==$num_of_question) && ($current_part==1)){
            //Show data and update session
            if (strtolower($answer) == $exam_question->word){
                $num_of_true_question = session()->get('num_of_true_question_part1')+1;
                $num_of_false_question = session()->get('num_of_false_question_part1');
            }
            else{
                $num_of_true_question = session()->get('num_of_true_question_part1');
                $num_of_false_question = session()->get('num_of_false_question_part1')+1;
            }
            $data_more = '<br>Bạn đã hoàn thành phần 1 với '.$num_of_true_question.' câu trả lời đúng và '.$num_of_false_question.' câu trả lời sai.
                        <br>Hãy sẵn sàng cho phần thi tiếp theo nào !!!';
            $this->checkAnswerAndUpdateSession($answer, $exam_question->word, $current_part, $exam_part_id, $question_number, $data_more);
        }

        //Khi số thứ tự câu hỏi đã bằng số câu hỏi và current part =1
        else if (($question_number==$num_of_question) && ($current_part==2)){
            //Show data and update session
            if (strtolower($answer) == $exam_question->word){
                $num_of_true_question = session()->get('num_of_true_question_part2')+1;
                $num_of_false_question = session()->get('num_of_false_question_part2');
            }
            else{
                $num_of_true_question = session()->get('num_of_true_question_part2');
                $num_of_false_question = session()->get('num_of_false_question_part2')+1;
            }
            $num_of_true_question_total = session()->get('num_of_true_question_part1')+$num_of_true_question;
            $num_of_false_question_total = session()->get('num_of_false_question_part1')+$num_of_false_question;
            $num_of_question_total = session()->get('num_of_question_part1')+$num_of_question;
            $point = round($num_of_true_question_total/$num_of_question_total*100, 0, PHP_ROUND_HALF_UP);
            $result='<p style="color:green;">Đạt</p>';
            if ($point<80){
                $result = '<p style="color:red;">Chưa đạt</p>';
            }
            $data_more = '<br>Bạn đã hoàn thành bài thi với '.$num_of_true_question_total.' câu trả lời đúng và '.$num_of_false_question_total.' câu trả lời sai.
                        <br>Tổng điểm đạt được: '.$point.'/100
                        <br>Kết quả kiểm tra: '.$result.'
                        <br>Nhấn next để lưu kết quả lại nào !!!';
            $this->checkAnswerAndUpdateSession($answer, $exam_question->word, $current_part, $exam_part_id, $question_number, $data_more);
        }
    }

    //Hàm check answer là đúng hay sai so với đáp án câu hỏi (word), lưu lại các giá trị session và lưu kết quả lại vào cơ sở dữ liệu
    protected function checkAnswerAndUpdateSession($answer, $word, $part, $exam_part_id, $question_number, $data_more){
        $result = 0;
        if (strtolower($answer) == $word){
            $data_for_true_answer = 'Chúc mừng bạn! Bạn đã trả lời đúng. Đáp án câu '.$question_number.' là <b>'.$word.'</b>'.$data_more;
            echo $data_for_true_answer;
            $result = 1;
            Session::put('num_of_true_question_part'.$part ,session()->get('num_of_true_question_part'.$part)+1);
        }
        else{
            $data_for_false_answer = 'Rất tiếc! Bạn đã sai mất rồi. Đáp án của câu '.$question_number.' là <b>'.$word.'</b>. (Câu trả lời của bạn: '.$answer.')'.$data_more;
            echo $data_for_false_answer;
            Session::put('num_of_false_question_part'.$part ,session()->get('num_of_false_question_part'.$part)+1);
        }

        //Lưu kết quả câu hỏi vào cơ sở dữ liệu
        ExaminationQuestion::updateResultQuestion($exam_part_id, $question_number, $result);
    }

    protected function nextQuestion(){
        $current_part = session()->get('current_part');
        $num_of_question = session()->get('num_of_question_part'.$current_part);
        $question_number = session()->get('exam_question_number_part'.$current_part);
        if($question_number<$num_of_question && $current_part<=2){
            //Tăng số thứ tự câu hỏi lên
            $question_number=$question_number+1;
            Session::put('exam_question_number_part'.$current_part ,$question_number);
        }
        elseif($question_number==$num_of_question && $current_part==1){
            Session::put('current_part', 2);
        }
        elseif($question_number==$num_of_question && $current_part==2){
            Session::put('current_part', 3);
        }
    }

    protected function saveExamResult(){
        //Lấy level của bài kiểm tra
        $level_to_exam = session()->get('level_to_exam');

        //lấy exam id
        $exam_id = session()->get('exam_id');

        //lấy level hiện tại của người dùng
        $username = session()->get('username');
        $user = User::getUserByUsername($username);
        $user_level = User::getUserLevelByUsername($username);
        $user_id = $user->user_id;
        $old_point = LevelResult::getMaxPointByUserId($user_id, $level_to_exam);
        $current_level = $user_level->currently_level;

        //tính điểm
        $point_arr = $this->calculateExamPoint();
        $part1_point = $point_arr['part1_point'];
        $part2_point = $point_arr['part2_point'];
        $total_point = $point_arr['total_point'];
        $star = $this->calculateExamStar($total_point);
        
        //Lưu điểm
        $exam_part1_id = session()->get('exam_part1_id');
        $exam_part2_id = session()->get('exam_part2_id');
        ExaminationPart::updateExamPartPoint($exam_part1_id, $part1_point);
        ExaminationPart::updateExamPartPoint($exam_part2_id, $part2_point);
        Examination::updateExamPoint($exam_id, $total_point);
        
        if ($total_point>$old_point){
            //insert dữ liệu bài kiểm tra
            if ($level_to_exam<$current_level){
                LevelResult::updateLevelResult($user_id, $level_to_exam, $total_point, $star);
            }
            elseif ($level_to_exam==$current_level){
                LevelResult::updateLevelResult($user_id, $level_to_exam, $total_point, $star);
                if ($total_point>=80){
                    CurrentlyLevel::updateCurrentlyLevel($user_id, 1,$current_level+1);
                    LevelUpHistory::insertLevelUpHistory($user_id, 1, $current_level+1);
                }
            }
        }
    }

    protected static function calculateExamPoint(){
        //lấy kết quả kiểm tra
        $num_of_true_question_part1 = session()->get('num_of_true_question_part1');
        $num_of_true_question_part2 = session()->get('num_of_true_question_part2');
        $num_of_question_part1 = session()->get('num_of_question_part1');
        $num_of_question_part2 = session()->get('num_of_question_part2');
        $num_of_true_question_total = $num_of_true_question_part1+$num_of_true_question_part2;
        $num_of_question_total = $num_of_question_part1+$num_of_question_part2;

        $part1_point = round($num_of_true_question_part1/$num_of_question_part1*100, 0, PHP_ROUND_HALF_UP);
        $part2_point = round($num_of_true_question_part2/$num_of_question_part2*100, 0, PHP_ROUND_HALF_UP);
        $total_point = round($num_of_true_question_total/$num_of_question_total*100, 0, PHP_ROUND_HALF_UP);

        $point_arr = array("part1_point"=>$part1_point, "part2_point"=>$part2_point, "total_point"=>$total_point);
        return $point_arr;
    }

    protected static function calculateExamStar($total_point){
        $star = 0;
        if ($total_point==100){
            $star = 3;
        }
        elseif ($total_point>=90){
            $star = 2;
        }
        elseif ($total_point>=80){
            $star = 1;
        }
        else{
            $star =0;
        }

        return $star;
    }

    protected function deleteExamData(){
        $exam_id = session()->get('exam_id');
        $exam_part1_id = session()->get('exam_part1_id');
        $exam_part2_id = session()->get('exam_part2_id');

        //Xóa dữ liệu exam trong cơ sở dữ liệu
        ExaminationQuestion::deleteExamQuestion($exam_part1_id);
        ExaminationQuestion::deleteExamQuestion($exam_part2_id);
        // ExaminationPart::deleteExamPart($exam_id);
        // Examination::deleteExam($exam_id);

        //Xóa exam session
        Session::forget('exam_id');
        Session::forget('exam_part1_id');
        Session::forget('exam_part2_id');
        Session::forget('num_of_question_part1');
        Session::forget('num_of_question_part2');
        Session::forget('num_of_true_question_part1');
        Session::forget('num_of_true_question_part2');
        Session::forget('num_of_false_question_part1');
        Session::forget('num_of_false_question_part2');
        Session::forget('exam_question_number_part1');
        Session::forget('exam_question_number_part2');
        Session::forget('level_to_exam');
        Session::forget('current_part');
    }
}
