@extends('template.wapian.layout')
@section('title','')
@section('body','vod-search')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-9 col-sm-12 hy-main-content">

                <div class="hy-layout clearfix">
                    <div class="hy-video-head">
                        <span class="text-muted pull-right hidden-xs"></span>
                        <h4 class="margin-0">直播列表</h4>
                    </div>
                    @if($zblist)
                        @foreach($zblist as $key=>$v)
                            <div class="hy-video-details active clearfix">
                                <div class="item clearfix">
                                    <dl class="content">
                                        <dd class="clearfix">
                                            <div class="head">
                                                <h3>{{$v['zbname']}}</h3>
                                            </div>
                                            <div class="block">
                                                <a class="text-muted" href="/zb/{{$key}}.html">点击播放<i class="icon iconfont icon-right"></i></a>
                                            </div>
                                        </dd>
                                    </dl>
                                </div>
                            </div>
                        @endforeach
                    @else
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection