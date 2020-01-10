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
                        <h4 class="pull-left page-title">Trò chơi "Magic Sound Box"</h4>
                        <ol class="breadcrumb pull-right">
                            <button type="submit" class="btn-link">Dừng chơi</button>
                        </ol>
                        <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                    {{-- Begin of charts --}}
                    <div class="hidden-xs hidden-sm col-md-4 col-lg-4">
                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h4 class="panel-title">Top 10 tháng 12/2019</h4>
                                </div>
                                <div class="panel-body" style="padding: 0px">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <table class="table table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>Top</th>
                                                        <th>username</th>
                                                        <th>Điểm</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr style="background-color:#66FFFF">
                                                        <td>1<img class="top-chart-img" src="assets/images/gold-medal.png" alt=""></td>
                                                        <td>nguyenhoangphuc</td>
                                                        <td>30</td>
                                                    </tr>
                                                    <tr style="background-color:#99FFFF">
                                                        <td>2<img class="top-chart-img" src="assets/images/silver-medal.png" alt=""></td>
                                                        <td>lethanhson</td>
                                                        <td>26</td>
                                                    </tr>
                                                    <tr style="background-color:#CCFFFF">
                                                        <td>3<img class="top-chart-img" src="assets/images/bronze-medal.png" alt=""></td>
                                                        <td>tranthanhtam</td>
                                                        <td>24</td>
                                                    </tr>
                                                    <tr>
                                                        <td>4</td>
                                                        <td>lebachi</td>
                                                        <td>23</td>
                                                    </tr>
                                                    <tr>
                                                        <td>5</td>
                                                        <td>hoangvinh98</td>
                                                        <td>22</td>
                                                    </tr>
                                                    <tr>
                                                        <td>6</td>
                                                        <td>ngocanh</td>
                                                        <td>18</td>
                                                    </tr>
                                                    <tr>
                                                        <td>7</td>
                                                        <td>phuctoan0302</td>
                                                        <td>18</td>
                                                    </tr>
                                                    <tr>
                                                        <td>8</td>
                                                        <td>hoangtansinh</td>
                                                        <td>15</td>
                                                    </tr>
                                                    <tr>
                                                        <td>9</td>
                                                        <td>tranthuthao</td>
                                                        <td>15</td>
                                                    </tr>
                                                    <tr>
                                                        <td>10</td>
                                                        <td>lenam98</td>
                                                        <td>13</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- End of charts --}}


                {{-- Begin of examination box --}}
                <div class="col-xs-12 col-sm-6 col-md-5 col-lg-5 examination-question">
                    <div class="panel panel-primary text-center vocabulary-box">
                        <div class="panel-heading">
                            <h4 class="panel-title">Câu số {{$MSB_question_number}}</h4>
                        </div>
                        <div class="panel-body">
                            <img onclick="playAudio('{{$MSB_question->voice}}')" src="assets/images/MagicSoundBox.jpg" class="question-img" style="cursor:pointer" alt="">
                            <div class="question-content">
                                <b>Ấn vào chiếc hộp</b> để nghe từ khóa ẩn chứa bên trong nào.<br>
                                Hãy cho chúng tôi biết bạn nghe thấy gì bằng cách <b>điền từ đó</b> vào ô bên dưới nhé<br><br>
                                <div class="row">
                                    <input type="text" class="form-control" required placeholder="Câu trả lời">
                                    <button type="button" class="btn-success btn-send-answer">Gửi câu trả lời</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of examination box --}}

                {{-- Begin of result frame --}}
                <div class="hidden-xs col-sm-6 col-md-3 col-lg-3 result-frame">
                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Điểm số hiện tại của bạn</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$MSB_question_number-1}} điểm</b></h3>
                            <p class="text-muted">Bạn đang đạt <b>{{$MSB_question_number-1}} điểm</b> trong lần thi này</p>
                        </div>
                    </div>

                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Kỉ lục của bạn</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$MSB_question_number-1}} điểm</b></h3>
                            <p class="text-muted"><b>{{$MSB_question_number-1}}</b> là điểm số cao nhất bạn đạt được trong trò chơi này. Phá vỡ nó nào !</p>
                        </div>
                    </div>
                </div>
                {{-- End of result frame --}}

            </div>

            {{-- Mobile view --}}
            <div class="row">
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Điểm hiện tại</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$MSB_question_number-1}}</b></h3>
                            <p class="text-muted"><b>Bạn đang đạt {{$MSB_question_number-1}} điểm</b> trong lần thi này</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Kỷ lục của bạn</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$MSB_question_number-1}} điểm</b></h3>
                            <p class="text-muted"><b>{{$MSB_question_number-1}}</b> là số điểm cao nhất bạn đạt được trong trò chơi này. Phá vỡ nó nào !</p>
                        </div>
                    </div>
                </div>
            </div>
            {{-- End Mobile view --}}
        </div></div> <!-- container -->

    </div> <!-- content -->
    <script src="assets/js/magic-sound-box.js"></script>
    <script src="assets/js/play-audio.js"></script>
@endsection