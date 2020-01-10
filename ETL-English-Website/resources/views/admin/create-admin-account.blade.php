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
                        <h4 class="pull-left page-title">Thêm tài khoản QTV</h4>
                        <ol class="hidden-xs breadcrumb pull-right">
                            <a href="admin/admin-list"><button type="button" class="btn-link">Về danh sách tài khoản QTV</button></a>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">

                {{-- Begin of examination box --}}
                <div class="col-xs-12 examination-question">
                    <div class="panel panel-primary text-center vocabulary-box">
                        <div class="panel-heading">
                            <h4 class="panel-title">Thêm tài khoản QTV</h4>
                        </div>
                        <div class="panel-body">
                            <form action="admin/create-admin-account" method="post">
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
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Họ tên</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="fullname"  required placeholder="Nhập họ và tên">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Email</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="email" class="form-control" name="email" required placeholder="Nhập email">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Tên đăng nhập</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="text" class="form-control" name="username" required placeholder="Nhập username (username cũng là mật khẩu mặc định khi thêm tài khoản)">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Ngày sinh</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <input id="answer" type="date" class="form-control" name="birthday" required placeholder="Nhập ngày sinh">
                                    </div>
                                </div>
                                <div class="row input-row">
                                    <div class="col-xs-3 col-sm-2 col-md-3 col-lg-2">
                                        <div class="input-title">Quyền</div>
                                    </div>
                                    <div class="col-xs-9 col-sm-10 col-md-9 col-lg-10">
                                        <select name="quyen" id="" class="form-control">
                                            <option value="Admin">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row input-row format-warning"></div>
                                <div class="row input-row">
                                    <div class="hidden-xs col-sm-2 col-md-2 col-lg-4"></div>
                                    <div class="col-xs-6 col-sm-4 col-md-4 col-lg-2">
                                        <input type="submit" class="btn-insert-topic btn-success" name="btn_create_account" value="Thêm">
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
            </div>

        </div></div> <!-- container -->

    </div> <!-- content -->
    <script src="assets/js/check-file.js"></script>
@endsection