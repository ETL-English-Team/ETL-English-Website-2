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
                        <h4 class="pull-left page-title">Magic Sound Box - Hướng dẫn</h4>
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
                            <p class="text-muted">Bạn gì đó ơi, không được sử dụng tài liệu hay công cụ hỗ trợ nào khác đâu nhé, như thế là gian lận đấy. Game thôi mà !!! :))</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Cách chơi</h4>
                        </div>
                        <div class="panel-body">
                            <img src="assets/images/rules-image/guide.png" class="vocabulary-img" alt="">
                            <p class="text-muted">Ấn vào hình chiếc hộp để nghe từ tiếng Anh ẩn chứa bên trong, sau đó điền từ bạn nghe được vào ô trả lời và nhấn nút gửi</p>
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
                            <p class="text-muted">Hãy bật loa ngoài hoặc đeo tai nghe vào để có thể nghe được từ khóa mà chiếc hộp đưa ra nhé. Max volume thôi nào !!! :))</p>
                        </div>
                    </div>
                </div>

                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Tính điểm</h4>
                        </div>
                        <div class="panel-body">
                            <img src="assets/images/rules-image/point.png" class="vocabulary-img" alt="">
                            <p class="text-muted">Mỗi câu trả lời đúng, bạn sẽ được 1 điểm. Với số điểm đạt được, bạn có thể đua top tuần, top tháng cùng những người chơi khác</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row btn-exam-rules-row">
                <div class="hidden-xs col-sm-2 col-md-2 col-lg-4"></div>
                <form action="magic-sound-box-rules" method="post">
                    <input type="hidden" name="_token" value="{{csrf_token()}}">
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