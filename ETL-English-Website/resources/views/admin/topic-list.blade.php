@extends('admin.master-layout')
@section('content')
<link href="assets/css/topic-list.css" rel="stylesheet" type="text/css">
    <!-- Start content -->
<div class="content">
    <div class="container"><div class="list-items-box">

        <!-- Page-Title -->
        <div class="row">
            <div class="col-sm-12">
                <div class="page-header-title">
                    <h4 class="pull-left page-title">Danh sách chủ đề</h4>
                    <ol class="hidden-xs breadcrumb pull-right">
                        <a href="admin/insert-topic"><button type="submit" class="btn-link">Thêm chủ đề</button></a>
                    </ol>
                    <div class="clearfix"></div>

                    {{-- button bắt đầu kiểm tra --}}
                    <div class="row hidden-sm hidden-md hidden-lg">
                        <div class="col-xs-3"></div>
                        <button type="submit" class="btn-success col-xs-6 btn-begin-test">Thêm chủ đề</button>
                        <div class="col-xs-3"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            {{-- Begin of topic list --}}
            <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
                <div class="panel panel-primary text-center">
                    <div class="panel-heading">
                        <h4 class="panel-title">Danh sách chủ đề</h4>
                    </div>
                    <div class="panel-body" style="padding-left:0; padding-right:0">
                        
                        <div class="row">
                            @foreach ($topic_list as $topic)
                                {{-- begin of topic panel --}}
                                <div class="col-xs-6 col-sm-4 col-md-4 col-lg-4">                                
                                    <div class="panel panel-primary text-center">
                                        <form action="admin/topic-list" method="post">
                                            <input type="hidden" name="_token" value={{csrf_token()}}>
                                            <input type="hidden" name="topic_id" value="{{$topic->topic_id}}">
                                            <div class="panel-body panel-topic" style="padding:10px;">
                                                <img src="{{$topic->image}}" alt="" class="topic-img">      
                                                <div class="topic-title">
                                                    LV{{$topic->level}}. Chủ đề <b>{{$topic->topic_name_en}}</b>
                                                </div>                  
                                                <div class="col-xs-6">
                                                    <a href="admin/update-topic/{{$topic->topic_id}}"><button type="button" class="btn-success btn-update-topic">Sửa</button></a>
                                                </div> 
                                                <div class="col-xs-6">
                                                    <input type="submit" class="btn-danger btn-delete-topic" value="Xóa" name="btn_delete_topic">
                                                </div>
                                                <div class="col-xs-12">
                                                    <input type="submit" class="btn-info btn-detail-topic" value="Danh sách từ vựng" name="btn_see_voca_list">
                                                </div>                
                                            </div>          
                                        </form>                                                                                                  
                                    </div>
                                </div>
                                {{-- end of topic panel --}}
                            @endforeach
                        </div>

                        <div class="row">
                            <button type="submit" class="btn-primary btn-read-more">Xem thêm</button>
                        </div>

                    </div>
                </div>
            </div>
            {{-- End of topic list --}}

             {{-- Begin of result frame --}}
             <div class="hidden-xs hidden-sm col-md-3 col-lg-3 result-frame">
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
@endsection