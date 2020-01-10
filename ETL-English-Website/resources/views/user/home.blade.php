@extends('user.master-layout')
@section('content')
<link href="assets/css/home.css" rel="stylesheet" type="text/css">
    <!-- Start content -->
<div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Trang chủ</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">ETL English</a></li>
                            <li class="active">Trang chủ</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                @if (session('thongbao'))
                    <div class="alert alert-success">
                        {{session('thongbao')}}
                    </div>
                @elseif (session('thongbaoloi'))
                    <div class="alert alert-danger">
                        {{session('thongbaoloi')}}
                    </div>
                @endif
            </div>

            <div class="row">
                <div class="hidden-xs col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Level hiện tại</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>Level {{$currently_level->currently_level}}</b></h3>
                            <p class="text-muted">Cấp độ hiện tại của bạn là <b>{{$currently_level->currently_level}}</b></p>
                        </div>
                    </div>
                </div>

                <div class="hidden-xs col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Số từ đã học</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$num_of_voca_learned}}</b></h3>
                            <p class="text-muted"><b>{{$num_of_voca_learned}}</b> từ học được trong {{$currently_level->currently_level-1}} chủ đề</p>
                        </div>
                    </div>
                </div>

                <div class="hidden-xs col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Tổng số danh hiệu</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$total_achievement}}</b></h3>
                            <p class="text-muted">Bạn đã đat được <b>{{$total_achievement}}</b> danh hiệu</p>
                        </div>
                    </div>
                </div>

                <div class="hidden-xs col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Kỷ lục cá nhân</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>0 điểm</b></h3>
                            <p class="text-muted">Kỉ lục trò "<b>Magic Sound Box</b>"</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <figure class="snip1104 red">
                        <img src="assets/images/HocTuVungTheoChuDe.jpg" style="width:100%; height:300px; margin-bottom:20px">
                        <figcaption>
                            <h2><span>Play now</span></h2>
                        </figcaption>
                        <a href="level-list"></a>
                    </figure>
                </div>

                <div class="col-sm-4">
                    <figure class="snip1104 blue">
                        <img src="assets/images/MagicSoundBox.jpg" style="width:100%; height:300px; margin-bottom:20px">
                        <figcaption>
                            <h2><span>Play now</span></h2>
                        </figcaption>
                        <a href="#"></a>
                    </figure>
                </div>

                <div class="col-sm-4">
                    <figure class="snip1104 yellow">
                        <img src="assets/images/MagicImageBox.jpg" style="width:100%; height:300px; margin-bottom:20px">
                        <figcaption>
                          <h2><span>Play now</span></h2>
                        </figcaption>
                        <a href="#"></a>
                    </figure>
                </div>
            </div>


            


        </div> <!-- container -->

    </div> <!-- content -->
@endsection