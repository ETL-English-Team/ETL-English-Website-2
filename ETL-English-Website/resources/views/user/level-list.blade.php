@extends('user.master-layout')

@section('content')
<link href="assets/css/home.css" rel="stylesheet" type="text/css">
<link href="assets/css/topic.css" rel="stylesheet" type="text/css">
    <!-- Start content -->
<div class="content">
        <div class="container">

            <!-- Page-Title -->
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-header-title">
                        <h4 class="pull-left page-title">Danh sách chủ đề đã mở khóa</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="vocabulary/{{$currently_topic->topic_id}}">Ấn để học ngay LV{{$currently_topic->level}} ({{$currently_topic->topic_name_vi}})</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            {{-- begin of unlocked topic list --}}
            <div class="row">
            @foreach ($unlocked_topic_list as $unlocked_topic)
                {{-- begin of topic panel --}}
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
                    <div class="panel panel-primary text-center topic-panel" onclick="Redirect({{$unlocked_topic->topic_id}})">
                        <div class="panel-heading">
                            <h5 class="panel-title">LV{{$unlocked_topic->level}}. {{$unlocked_topic->topic_name_vi}}</h5>
                        </div>
                        <div class="panel-body">
                            <div class="row">
                                <img src="{{$unlocked_topic->image}}" class="topic-img" alt="">
                            </div>
                            <div class="row">
                                Số từ: 10 từ <br>
                                Số điểm: {{$unlocked_topic->point}}/100 <br>
                                Đánh giá level: <br>
                                @if ($unlocked_topic->star==0)
                                    0 sao
                                @else
                                    <?php $star = 0; ?>
                                    @while ($star<=2)
                                        <img src="assets/images/star-vote.png" class="star-vote" alt="">
                                        <?php $star++; ?>
                                    @endwhile
                                @endif
                                <div class="note-voca"><i>Ấn để học ngay</i></div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- end of topic panel --}}
            @endforeach
            </div>
            {{-- end of unlocked topic list --}}


            <div class="row">
                <div class="col-xs-2 col-sm-3 col-md-4 col-lg-4"></div>
                <div class="col-xs-8 col-sm-6 col-md-4 col-lg-4">
                    <button type="submit" class="btn-info btn-readmore-topic">Xem thêm</button>
                </div>
                <div class="col-xs-2 col-sm-3 col-md-4 col-lg-4"></div>
            </div>

        </div> <!-- container -->
        
    </div> <!-- content -->
    <script>
        function Redirect(id) {
            window.location='vocabulary/'+id;
        }
    </script>
@endsection