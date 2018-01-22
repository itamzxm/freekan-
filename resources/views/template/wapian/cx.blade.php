@extends('template.wapian.layout')
@section('body','vod-type apptop')
@section('title','尝鲜视频')
@section('content')
    <div class="container">
        <div class="row">
            <div class="hy-cascade clearfix">
                <div class="left-head hidden-sm hidden-xs">
                    <ul class="clearfix">
                        <li class="text"><span class="text-muted">当前频道</span></li>
                        <li><a href="/cxlist.html"  class="active">尝鲜视频</a></li></ul>
                </div>
            </div>
            <div class="hy-layout clearfix">
                {!! config('adconfig.list_top') !!}
            </div>
            <div class="hy-layout clearfix" style="margin-top: 0;">
                <div class="hy-switch-tabs active clearfix">
                    <span class="text-muted pull-right hidden-xs">如果您喜欢本站请动动小手分享给您的朋友！</span>
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#">尝鲜视频</a></li>
                    </ul>
                </div>
                <div class="hy-video-list">
                    <div class="item">
                        <ul class="clearfix">
                            <div class="item">
                            @if(isset($dydata)&&!empty($dydata))
                                @foreach($dydata as $key=>$dy)
                                <div class="col-md-2 col-sm-3 col-xs-4">
                                    <a class="videopic lazy" href="/play/{{$key}}.html" title="{{$dy['dyname']}}" src="{{$dy['dylogo']}}" onclick="jilu(this)" style="background: url({{$dy['dylogo']}}) no-repeat; background-position:50% 50%; background-size: cover;">
                                        <span class="play hidden-xs"></span><span class="score"></span></a>
                                    <div class="title">
                                        <h5 class="text-overflow"><a href="/play/{{$key}}.html" title="{{$dy['dyname']}}" src="{{$dy['dylogo']}}" onclick="jilu(this)">{{$dy['dyname']}}</a></h5>
                                    </div>
                                    <div class="subtitle text-muted text-muted text-overflow hidden-xs"></div>
                                </div>
                                @endforeach
                            @else
                            @endif
                        </ul>
                    </div>
                </div>
                <div class="hy-page clearfix">
                    <ul class="cleafix">
                        <li><a>共1页</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection