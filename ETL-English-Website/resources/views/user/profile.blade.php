@extends('user.master-layout')
@section('content')
<link href="assets/css/profile.css" rel="stylesheet" type="text/css">
    <!-- Start content -->
<div class="content">
        <div class="container"><div class="list-items-box">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Thông tin người chơi</h4>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">

                {{-- Begin of profile panel MOBILE VIEW--}}
                <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
                    <div class="panel panel-primary text-center vocabulary-box">
                        <div class="panel-heading">
                            <h4 class="panel-title">Thông tin người chơi</h4>
                        </div>
                        <div class="panel-body">
                            <div class="col-xs-12">
                                <img src="{{$user->avatar}}" class="profile-img" alt="">
                            </div>
                            <div class="col-xs-12  profile-info-mobile">
                                <div class="row">
                                    <div class="col-xs-6 profile-info-label"><b>username:</b></div>
                                    <div class="col-xs-6 profile-info-content">{{$user->username}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 profile-info-label"><b>Họ và tên:</b></div>
                                    <div class="col-xs-6 profile-info-content">{{$user->fullname}}</div>
                                </div> 
                                <div class="row">
                                    <div class="col-xs-6 profile-info-label"><b>Ngày sinh:</b></div>
                                    <div class="col-xs-6 profile-info-content">{{$user->birthday}}</div>
                                </div>     
                                <div class="row">
                                    <div class="col-xs-6 profile-info-label"><b>Ngày tạo tài khoản:</b></div>
                                    <div class="col-xs-6 profile-info-content">{{$user->created_at}}</div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-6 profile-info-label"><b>Level hiện tại:</b></div>
                                    <div class="col-xs-6 profile-info-content">{{$currently_level->currently_level}}</div>
                                </div>  
                                <div class="row">
                                    <div class="col-xs-6 profile-info-label"><b>Công việc hiện tại:</b></div>
                                    <div class="col-xs-6 profile-info-content">{{$user->job}}</div>
                                </div>      
                                <div class="row">
                                    <div class="col-xs-6 profile-info-label"><b>Đang làm việc tại:</b></div>
                                    <div class="col-xs-6 profile-info-content">{{$user->working_at}}</div>
                                </div>
                            </div>
                            <div class="col-xs-12 archievement-panel">
                                <div class="row">
                                    <h4>Thành tựu đạt được</h4>
                                </div>
                                <div class="row achievement-row">
                                    <div class="col-xs-6">
                                        <img src="assets/images/achievement/gold-medal.png" alt="" class="achievement-img-mobile">
                                        <div class="achievement-name">
                                            <h5>1st xếp hạng tuần</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <img src="assets/images/achievement/silver-medal.png" alt="" class="achievement-img-mobile">
                                        <div class="achievement-name">
                                            <h5>2nd xếp hạng tuần</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row achievement-row">
                                    <div class="col-xs-6">
                                        <img src="assets/images/achievement/bronze-medal.png" alt="" class="achievement-img-mobile">
                                        <div class="achievement-name">
                                            <h5>3rd xếp hạng tuần</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <img src="assets/images/achievement/top-10-weekly.png" alt="" class="achievement-img-mobile">
                                        <div class="achievement-name">
                                            <h5>Top 10 XH tuần</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row achievement-row">
                                    <div class="col-xs-6">
                                        <img src="assets/images/achievement/gold-cup.png" alt="" class="achievement-img-mobile">
                                        <div class="achievement-name">
                                            <h5>1st xếp hạng tháng</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <img src="assets/images/achievement/silver-cup.png" alt="" class="achievement-img-mobile">
                                        <div class="achievement-name">
                                            <h5>2nd xếp hạng tháng</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row achievement-row">
                                    <div class="col-xs-6">
                                        <img src="assets/images/achievement/bronze-cup.png" alt="" class="achievement-img-mobile">
                                        <div class="achievement-name">
                                            <h5>3rd xếp hạng tháng</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-xs-6">
                                        <img src="assets/images/achievement/top-10-monthly.png" alt="" class="achievement-img-mobile">
                                        <div class="achievement-name">
                                            <h5>Top 10 XH tháng</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of profile panel MOBILE VIEW--}}

                
                {{-- Begin of profile panel DESKTOP VIEW--}}
                <div class="hidden-xs col-sm-12 col-md-12 col-lg-9 examination-question">
                    <div class="panel panel-primary text-center vocabulary-box">
                        <div class="panel-heading">
                            <h4 class="panel-title">Thông tin người chơi</h4>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <img src="{{$user->avatar}}" class="profile-img" alt="">
                                </div>
                                <div class="col-sm-8">
                                    <div class="profile-info">
                                        <div class="row">
                                            <div class="col-sm-4 profile-info-label"><b>username:</b></div>
                                            <div class="col-sm-8 profile-info-content">{{$user->username}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 profile-info-label"><b>Họ và tên:</b></div>
                                            <div class="col-sm-8 profile-info-content">{{$user->fullname}}</div>
                                        </div> 
                                        <div class="row">
                                            <div class="col-sm-4 profile-info-label"><b>Ngày sinh:</b></div>
                                            <div class="col-sm-8 profile-info-content">{{$user->birthday}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 profile-info-label"><b>Email:</b></div>
                                            <div class="col-sm-8 profile-info-content">{{$user->email}}</div>
                                        </div>     
                                        <div class="row">
                                            <div class="col-sm-4 profile-info-label"><b>Ngày tạo tài khoản:</b></div>
                                            <div class="col-sm-8 profile-info-content">{{$user->created_at}}</div>
                                        </div>
                                        <div class="row">
                                            <div class="col-sm-4 profile-info-label"><b>Level hiện tại:</b></div>
                                            <div class="col-sm-8 profile-info-content">Level {{$currently_level->currently_level}}</div>
                                        </div>  
                                        <div class="row">
                                            <div class="col-sm-4 profile-info-label"><b>Công việc hiện tại:</b></div>
                                            <div class="col-sm-8 profile-info-content">{{$user->job}}</div>
                                        </div>      
                                        <div class="row">
                                            <div class="col-sm-4 profile-info-label"><b>Đang làm việc tại:</b></div>
                                            <div class="col-sm-8 profile-info-content">{{$user->working_at}}</div>
                                        </div>                
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="row archievement-title">
                                    <h4>Danh hiệu - Thành tựu đạt được</h4>
                                </div>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="assets/images/achievement/gold-medal.png" alt="" class="achievement-img">
                                        <div class="achievement-name">
                                            <h5>1st xếp hạng tuần</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="assets/images/achievement/silver-medal.png" alt="" class="achievement-img">
                                        <div class="achievement-name">
                                            <h5>2nd xếp hạng tuần</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="assets/images/achievement/bronze-medal.png" alt="" class="achievement-img">
                                        <div class="achievement-name">
                                            <h5>3rd xếp hạng tuần</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="assets/images/achievement/top-10-weekly.png" alt="" class="achievement-img">
                                        <div class="achievement-name">
                                            <h5>Top 10 xếp hạng tuần</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="row monthly-achievement">
                                    <div class="col-sm-3">
                                        <img src="assets/images/achievement/gold-cup.png" alt="" class="achievement-img">
                                        <div class="achievement-name">
                                            <h5>1st xếp hạng tháng</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="assets/images/achievement/silver-cup.png" alt="" class="achievement-img">
                                        <div class="achievement-name">
                                            <h5>2nd xếp hạng tháng</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="assets/images/achievement/bronze-cup.png" alt="" class="achievement-img">
                                        <div class="achievement-name">
                                            <h5>3rd xếp hạng tháng</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <img src="assets/images/achievement/top-10-monthly.png" alt="" class="achievement-img">
                                        <div class="achievement-name">
                                            <h5>Top 10 xếp hạng tháng</h5>
                                            <b><h4>3 lần</h4></b>
                                            <button type="submit" class="btn-info">Xem chi tiết</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End of profile panel DESKTOP VIEW--}}

                {{-- Begin of result frame --}}
                <div class="hidden-xs hidden-sm hidden-md col-lg-3 result-frame">
                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Tỉ lệ lên cấp</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>70%</b></h3>
                            <p class="text-muted"><b>70%</b> chính là tỉ lệ lên cấp thành công sau các bài kiểm tra của bạn !</p>
                        </div>
                    </div>

                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Điểm cao nhất</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>22</b></h3>
                            <p class="text-muted"><b>22 điểm</b> là điểm số cao nhất bạn đạt được trong trò chơi <b>"Chiếc hộp âm nhạc"</b></p>
                        </div>
                    </div>

                    <div class="panel panel-primary text-center panel-total-question">
                        <div class="panel-heading">
                            <h4 class="panel-title">Điểm cao nhất</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>22</b></h3>
                            <p class="text-muted"><b>22 điểm</b> là điểm số cao nhất bạn đạt được trong trò chơi <b>"Chiếc hộp hình ảnh"</b></p>
                        </div>
                    </div>

                    
                </div>
                {{-- End of result frame --}}

            </div>
        </div></div> <!-- container -->

    </div> <!-- content -->
@endsection