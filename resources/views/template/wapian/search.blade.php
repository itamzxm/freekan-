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
                    <h4 class="margin-0"><span class="text-color">{{$searchkey}}</span>尝鲜相关的结果</h4>
                </div>
                @if($cxs)
                    @foreach($cxs as $key=>$s)
                <div class="hy-video-details active clearfix">
                    <div class="item clearfix">
                        <dl class="content">
                            <dt><a class="videopic" href="/play/{{$key}}.html" style="background: url({{$s['dylogo']}}) no-repeat; background-position:50% 50%; background-size: cover;"><span class="play hidden-xs"></span></a></dt>
                            <dd class="clearfix">
                                <div class="head">
                                    <h3>{{$s['dyname']}}</h3>
                                </div>
                                <ul>
                                    <li><span class="text-muted">简介：</span>{{$s['dydesc']}}</li>

                                </ul>
                                <div class="block">
                                    <a class="text-muted" href="/play/{{$key}}.html">查看详情 <i
                                                class="icon iconfont icon-right"></i></a>
                                </div>
                            </dd>
                        </dl>
                    </div>
                </div>
                    @endforeach
                @else
                @endif
            </div>

            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <span class="text-muted pull-right hidden-xs"></span>
                    <h4 class="margin-0"><span class="text-color">{{$searchkey}}</span>全网搜索结果</h4>
                </div>
                @if($ss)
                    @foreach($ss as $s)
                        <div class="hy-video-details active clearfix">
                            <div class="item clearfix">
                                <dl class="content">
                                    <dt><a class="videopic" href="/play/{{$s['url']}}.html" style="background: url({{$s['img']}}) no-repeat; background-position:50% 50%; background-size: cover;"><span class="play hidden-xs"></span></a></dt>
                                    <dd class="clearfix">
                                        <div class="head">
                                            <h3>{{$s['title']}}</h3>
                                        </div>
                                        <ul>
                                            <li><span class="text-muted">简介：</span>{{$s['desc']}}</li>

                                        </ul>
                                        <div class="block">
                                            <a class="text-muted" href="/play/{{$s['url']}}.html">查看详情 <i
                                                        class="icon iconfont icon-right"></i></a>
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
    <script>
        $(function () {
            var key = $('.text-color:eq(0)').text();
            $('#ff-wd').val(key)
        })
    </script>
  @endsection