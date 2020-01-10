@extends('admin.master-layout')
@section('content')
    <!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Trang chủ</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">ETL English Admin</a></li>
                            <li class="active">Trang chủ</li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Tổng lượt đăng ký</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$num_of_user}}</b></h3>
                            <p class="text-muted"><b>{{$num_of_user}}</b> ngày từ ngày mở đăng ký</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Lượt truy cập</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>2</b></h3>
                            <p class="text-muted"><b>2</b> tài khoản đang online</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Số từ vựng</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>{{$num_of_voca}}</b></h3>
                            <p class="text-muted"><b>{{$num_of_voca}}</b> từ thuộc <b>{{$max_level}}</b> chủ đề</p>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 col-lg-3">
                    <div class="panel panel-primary text-center">
                        <div class="panel-heading">
                            <h4 class="panel-title">Góp ý</h4>
                        </div>
                        <div class="panel-body">
                            <h3 class=""><b>0</b></h3>
                            <p class="text-muted"><b>0</b> lượt góp ý tuần này</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-t-0">Lượt đăng ký</h4>
                            <ul class="list-inline m-t-30 widget-chart text-center">
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>5248</b></h4>
                                    <h5 class="text-muted m-b-0">Marketplace</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                    <h4 class=""><b>321</b></h4>
                                    <h5 class="text-muted m-b-0">Last week</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>964</b></h4>
                                    <h5 class="text-muted m-b-0">Last Month</h5>
                                </li>
                            </ul>
                            <div id="sparkline1" style="margin: 0 -21px -22px -22px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-t-0">Lượt truy cập</h4>
                            <ul class="list-inline m-t-30 widget-chart text-center">
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>3654</b></h4>
                                    <h5 class="text-muted m-b-0">Marketplace</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                    <h4 class=""><b>954</b></h4>
                                    <h5 class="text-muted m-b-0">Last week</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>8462</b></h4>
                                    <h5 class="text-muted m-b-0">Last Month</h5>
                                </li>
                            </ul>
                            <div id="sparkline2" style="margin: 0 -21px -22px -22px;"></div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-4">
                    <div class="panel panel-primary">
                        <div class="panel-body">
                            <h4 class="m-t-0">Lượt góp ý</h4>
                            <ul class="list-inline m-t-30 widget-chart text-center">
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>3256</b></h4>
                                    <h5 class="text-muted m-b-0">Marketplace</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-down-bold-circle text-danger"></i>
                                    <h4 class=""><b>785</b></h4>
                                    <h5 class="text-muted m-b-0">Last week</h5>
                                </li>
                                <li>
                                    <i class="mdi mdi-arrow-up-bold-circle text-success"></i>
                                    <h4 class=""><b>1546</b></h4>
                                    <h5 class="text-muted m-b-0">Last Month</h5>
                                </li>
                            </ul>
                            <div id="sparkline3" style="margin: 0 -21px -22px -22px;"></div>
                        </div>
                    </div>
                </div>
            </div>


        </div> <!-- container -->

    </div> <!-- content -->
@endsection