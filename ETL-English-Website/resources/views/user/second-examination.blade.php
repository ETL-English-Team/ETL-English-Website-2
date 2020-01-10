@extends('user.master-layout')
@section('content')
<link href="assets/css/examination.css" rel="stylesheet" type="text/css">
    <!-- Start content -->
<div class="content">
        <div class="container"><div class="list-items-box">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Bài kiểm tra level {{$level}}</h4>
                        <ol class="hidden-xs breadcrumb pull-right">
                            <button type="submit" class="btn-link">Hủy bài kiểm tra</button>
                        </ol>
                        <div class="clearfix"></div>

                        {{-- button bắt đầu kiểm tra --}}
                        <div class="row hidden-sm hidden-md hidden-lg">
                            <div class="col-xs-3"></div>
                            <button type="submit" class="btn-success col-xs-6 btn-begin-test">Hủy bài kiểm tra</button>
                            <div class="col-xs-3"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-8 col-sm-4 col-md-3 col-lg-3">
                    <div class="modal fade" id="modal-result" data-backdrop="static" data-keyboard="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    ETL English thông báo kết quả
                                </div>
                                <div class="modal-body"></div>
                                <div class="modal-footer">
                                    <button type="button" onclick="nextQuestion()" class="btn-success btn-next-question">Next</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                {{-- Begin of examination box --}}
                <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8 examination-question">
                    <div class="panel panel-primary text-center vocabulary-box">
                        <div class="panel-heading">
                            <h4 class="panel-title">Phần {{$first_exam->examination_category_id}}. {{$first_exam->examination_category_name}} - Câu {{$exam_question->question_number}}</h4>
                        </div>
                        <div class="panel-body">
                            <img onclick="playAudio('{{$exam_question->voice}}')" src="assets/images/icon-sound.png" class="question-img" style="cursor:pointer" alt="">
                            <div class="question-content">
                                <b>Bấm chọn</b> vào ảnh trên để nghe từ của câu hỏi.<br>
                                Sau đó <b>điền từ nghe được</b> vào ô đáp án bên dưới !<br><br>
                                <div class="row">
                                    <input id="answer" type="text" class="form-control" required placeholder="Câu trả lời">
                                    <button onclick="sendAnswer()" class="btn-success btn-send-answer" data-toggle="modal" data-target="#modal-result">Gửi câu trả lời</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of examination box --}}

                {{-- Begin of result frame --}}
                <div class="hidden-xs col-sm-6 col-md-4 col-lg-4 result-frame">
                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Tổng số câu</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$num_of_question}}</b></h3>
                            <p class="text-muted">Tổng số câu hỏi trong phần này: <b>{{$num_of_question}} câu</b></p>
                        </div>
                    </div>

                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title num-true-false-title">Số câu trả lời đúng - sai</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class="num-true-false-content"><b>{{$num_of_true_question}} - {{$num_of_false_question}}</b></h3>
                            <p class="text-muted num-true-false-detail">Bạn đã trả lời <b>đúng {{$num_of_true_question}} câu</b> và <b>sai {{$num_of_false_question}} câu</b></p>
                        </div>
                    </div>

                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title num-true-false-title">Tổng 2 phần</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class="num-true-false-content"><b>{{$num_of_true_question_total}} - {{$num_of_false_question_total}} / {{$num_of_question_total}}</b></h3>
                            <p class="text-muted num-true-false-detail">Bạn đã trả lời <b>đúng {{$num_of_true_question_total}} câu</b> và <b>sai {{$num_of_false_question_total}} câu trên tổng <b>{{$num_of_question_total}}</b> câu của 2 phần thi.</b></p>
                        </div>
                    </div>
                </div>
                {{-- End of result frame --}}

            </div>

            {{-- begin of result panel mobile --}}
            <div class="row">
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Kết quả của bạn</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$num_of_true_question}} - {{$num_of_false_question}} / {{$num_of_question}}</b></h3>
                            <p class="text-muted">Đúng <b>{{$num_of_true_question}}</b> - Sai <b>{{$num_of_false_question}}</b> trên tổng <b>{{$num_of_question}} câu</b></p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- end of result panel mobile --}}

        </div></div> <!-- container -->

    </div> <!-- content -->

    <script src="assets/js/examination.js"></script>
    <script src="assets/js/play-audio.js"></script>
@endsection