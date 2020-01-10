@extends('user.master-layout')
@section('content')
<link href="assets/css/vocabulary.css" rel="stylesheet" type="text/css">
    <!-- Start content -->
<div class="content">
        <div class="container"><div class="list-items-box">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Nội quy phòng thi</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="home">Trở về</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            

            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Không sử dụng tài liệu</h4>
                        </div>
                        <div class="panel-body">
                            <img src="assets/images/rules-image/no.png" class="vocabulary-img" alt="">
                            <p class="text-muted">Để dánh giá được khả năng thực sự của bản thân, đừng nên sử dụng tài liệu trong lúc làm bài thi bạn nhé!</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Lên cấp</h4>
                        </div>
                        <div class="panel-body">
                            <img src="assets/images/rules-image/level-up.png" class="vocabulary-img" alt="">
                            <p class="text-muted">Để lên cấp thành công, bạn cần dạt trên 80% số điểm của bài kiểm tra level hiện tại của bạn</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Bật âm thanh</h4>
                        </div>
                        <div class="panel-body">
                            <img src="assets/images/rules-image/headphone.png" class="vocabulary-img" alt="">
                            <p class="text-muted">Hãy bật loa ngoài hoặc đeo tai nghe vào để có thể hoàn thành phần thi thứ 2 bạn nhé</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Không tự ý rời phòng thi</h4>
                        </div>
                        <div class="panel-body">
                            <img src="assets/images/rules-image/dont-give-up.png" class="vocabulary-img" alt="">
                            <p class="text-muted">Bỏ thi ngang là sẽ bị đánh sai toàn bộ các câu còn lại. Đừng để bài thi bị điểm kém bạn nhé.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row btn-exam-rules-row">
                <div class="hidden-xs col-sm-2 col-md-2 col-lg-4"></div>
                <form action="examination-rules" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
                    <input type="hidden" name="level_to_exam" value="{{$level_to_exam}}">
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                        <input type="submit" class="btn-exam-rules btn-success" name="btn_accept" value="Tôi đã sẵn sàng">
                    </div>
                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                        <input type="submit" class="btn-exam-rules btn-warning" name="btn_later" value="Để lần sau">
                    </div>
                </form>
                <div class="hidden-xs col-sm-2 col-md-2 col-lg-4"></div>
            </div>
        </div></div> <!-- container -->

    </div> <!-- content -->


@endsection