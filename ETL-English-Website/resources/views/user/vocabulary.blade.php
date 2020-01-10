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
                        <h4 class="pull-left page-title">Level {{$topic->level}}. {{$topic->topic_name_en}}  ({{$topic->topic_name_vi}})</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="examination-rules/{{$topic->level}}">Ấn để làm bài kiểm tra ngay</a></li>
                        </ol>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>

            

            <div class="row">
            @foreach ($vocabulary_list as $voca)
                {{-- Begin of vocabulary box --}}
                <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 item-box">
                    <div class="flip-container" onclick="this.classList.toggle('focus');playAudio('{{$voca->voice}}');">
                        <div class="flipper">

                            {{-- Begin of front face --}}
                            <div class="panel panel-primary text-center vocabulary-box front">
                                <div class="panel-heading">
                                    <h4 class="panel-title">{{$voca->word}}</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="panel-vocabulary-img">
                                        <img class="vocabulary-img" src="{{$voca->image}}">
                                    </div>
                                    <div class="col-sm-6 col-lg-5 panel-vocabulary-detail">
                                        _____________
                                        <br>{{$voca->meaning_1}}
                                        <br>{{$voca->spelling}}
                                    </div>
                                </div>
                            </div>
                            {{-- End of front face --}}

                            {{-- Begin of back face --}}
                            <div class="panel panel-primary text-center vocabulary-box back">
                                <div class="panel-heading">
                                    <h4 class="panel-title">{{$voca->word}}</h4>
                                </div>
                                <div class="panel-body">
                                    <div class="panel-vocabulary-img-backview">
                                        <img class="vocabulary-img-backview" src="assets/images/sound-vector-icon.jpg">
                                    </div>
                                    <div class="col-sm-6 col-lg-5 panel-vocabulary-detail-backview">
                                        <br>Các nghĩa khác:
                                        <br>{{$voca->meaning_2}}
                                        <br>{{$voca->meaning_2}}
                                        <br>Ví dụ: {{$voca->example_sentence}}
                                    </div>
                                </div>
                            </div>
                            {{-- End of back face --}}

                        </div>
                    </div>
                </div>
                {{-- End of vocabulary box --}}
            @endforeach

            </div>
        </div></div> <!-- container -->

    </div> <!-- content -->

    <script>
        function playAudio($path){
            var audio = new Audio($path);
            audio.play();
        }
    </script>

@endsection