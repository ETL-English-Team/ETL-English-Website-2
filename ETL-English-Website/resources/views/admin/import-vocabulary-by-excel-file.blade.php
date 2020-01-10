@extends('admin.master-layout')
@section('content')
<!-- Dropzone css -->
<link href="assets/plugins/dropzone/dist/dropzone.css" rel="stylesheet" type="text/css">

<!-- Start content -->
    <div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Thêm từ vựng tự động</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Thêm từ vựng thủ công</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="m-b-30">
                        <form action="#" class="dropzone">
                          <div class="fallback">
                            <input name="file" type="file" multiple="multiple">
                          </div>
                        </form>
                    </div>

                    <div class="text-center m-t-15">
                              <button type="button" class="btn btn-primary waves-effect waves-light">Thêm dữ liệu</button>
                      </div>
                </div>
            </div>
            <!-- end row -->


        </div> <!-- container -->

    </div> <!-- content -->

<!-- Dropzone js -->
<script src="assets/plugins/dropzone/dist/dropzone.js"></script>

<script src="assets/js/app.js"></script>

@endsection