@extends('admin.master-layout')
@section('content')
<link href="assets/css/insert-vocabulary.css" rel="stylesheet" type="text/css">
    <!-- Start content -->
<div class="content">
        <div class="container"><div class="list-items-box">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Cập nhật từ vựng</h4>
                        <ol class="breadcrumb pull-right">
                            <button type="submit" class="btn-link">Về danh sách từ vựng</button>
                        </ol>
                        <div class="clearfix"></div>
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
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">

                {{-- Begin of examination box --}}
                <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 examination-question">
                    <div class="panel panel-primary text-center vocabulary-box">
                        <div class="panel-heading">
                            <h4 class="panel-title">Cập nhật từ vựng</h4>
                        </div>
                        <div class="panel-body">
                            <form action="admin/insert-vocabulary" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="_token" value={{csrf_token()}}>
                                @if (count($errors)>0)
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $err)
                                        {{$err}}<br>
                                    @endforeach
                                </div>
                                @endif
                    
                                @if (session('thongbao'))
                                    <div class="alert alert-success">
                                        {{session('thongbao')}}
                                    </div>
                                @elseif(session('thongbaoloi'))
                                    <div class="alert alert-danger">
                                        {{session('thongbaoloi')}}
                                    </div>
                                @endif
                                <input id="answer" type="hidden" class="form-control" name="topic_name_en" value="{{$voca->topic_name_en}}" required placeholder="Level">
                                <input id="answer" type="hidden" class="form-control" name="topic_id" value="{{$voca->topic_id}}" required placeholder="Level">
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Mã từ vựng</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="word_id" value="{{$voca->word_id}}" required placeholder="Level" readonly>
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Từ vựng</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="word" value="{{$voca->word}}"  required placeholder="Nhập từ vựng bạn muốn thêm">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Phiên âm</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="spelling" value="{{$voca->spelling}}" required placeholder="Nhập phiên âm của từ">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Nghĩa 1</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="meaning_1" value="{{$voca->meaning_1}}"  required placeholder="Nhập nghĩa của từ (Ví dụ: (n) gia đình)">
                                    </div>
                                </div>
                                 <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Nghĩa 2</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="meaning_2" value="{{$voca->meaning_2}}" placeholder="Nhập nghĩa thứ 2 của từ (nếu có)">
                                    </div>
                                </div>
                                 <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Nghĩa 3</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="meaning_3" value="{{$voca->meaning_3}}" placeholder="Nhập nghĩa thứ 3 của từ (nếu có)">
                                    </div>
                                </div>
                                 <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Câu ví dụ</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="example_sentence" value="{{$voca->example_sentence}}"  required placeholder="Nhập câu ví dụ tiếng anh cho từ">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Hình ảnh</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="file-upload" type="file" class="form-control" name="voca_img" onchange="checkVocaImageUpload()">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Phát âm</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="file-sound-upload" type="file" class="form-control" name="voca_sound" onchange="checkVocaSoundUpload()">
                                    </div>
                                </div>
                                <div class="row input-row format-warning"></div>
                                <div class="row input-row format-sound-warning"></div>
                                <div class="row input-row">
                                    <div class="hidden-xs col-sm-2 col-md-2 col-lg-4"></div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                                        <input type="submit" class="btn-insert-topic btn-success" name="btn_update_voca" value="Lưu">
                                    </div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                                        <input type="submit" class="btn-insert-topic btn-info" value="Trở về">
                                    </div>
                                    <div class="hidden-xs col-sm-2 col-md-2 col-lg-4"></div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                {{-- End of examination box --}}

                {{-- Begin of result frame --}}
                <div class="hidden-xs hidden-sm col-md-4 col-lg-4 result-frame">
                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Tổng số chủ đề</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$max_level-1}}</b></h3>
                            <p class="text-muted">Hiện tại có <b>{{$max_level-1}}</b> chủ đề trên hệ thống</p>
                        </div>
                    </div>

                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title num-true-false-title">Số từ vựng</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$num_of_voca}}</b></h3>
                            <p class="text-muted">Hiện tại có <b>{{$num_of_voca}}</b> từ vựng trên hệ thống</p>
                        </div>
                    </div>
                </div>
                {{-- End of result frame --}}

            </div>

        </div></div> <!-- container -->

    </div> <!-- content -->
    <script src="assets/js/check-file.js"></script>
@endsection