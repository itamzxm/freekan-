@extends('template.wapian.layout')
@section('body','index')
@section('title','首页')
@section('content')
    <div class="container">
        <div class="row" style="margin-top:10px"></div>
        <div class="row">
            <div class="hy-layout clearfix">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <div class="swiper-container hy-slide">
                        <div class="swiper-wrapper">
                           @if($bannerlist)
                               @foreach($bannerlist as $v)
                            <div class="swiper-slide">
                                <div class="hy-video-slide">
                                    <a class="videopic"
                                       href="{{$v['bannerlink']}}"
                                       title="{{$v['bannername']}}"
                                       style="padding-top: 60%; background: url({{$v['bannerimg']}})  no-repeat; background-position:50% 50%; background-size: cover;">
                                        <span class="title">{{$v['bannername']}}</span>
                                    </a>
                                </div>
                            </div>
                              @endforeach
                             @else
                            @endif

                        </div>
                        <div class="swiper-button-next hidden-xs">
                            <i class="icon iconfont icon-right"></i>
                        </div>
                        <div class="swiper-button-prev hidden-xs">
                            <i class="icon iconfont icon-back"></i>
                        </div>
                        <div class="swiper-pagination">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12 padding-0">
                    <div class="hy-index-menu clearfix">
                        <div class="item">
                            <ul class="clearfix">
                                <li><a href="/movielist/all/1.html"><i
                                                class="icon iconfont icon-menu1 text-color"></i><span>最新电影</span></a>
                                </li>
                                <li><a href="/cxlist.html"><i class="icon iconfont icon-ic_mymatch_ranking text-color"></i><span>抢先片源</span></a>
                                </li>
                                <li><a href="/tvlist/all/1.html"><i
                                                class="icon iconfont icon-update text-color"></i><span>电视剧</span></a>
                                </li>
                                <li><a href="/zylist/all/1.html"><i
                                                class="icon iconfont icon-ic_mymatch_ranking text-color"></i><span>综艺节目</span></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hy-index-tags hidden-md clearfix">
                        <div class="item">
                            <ul class="clearfix">
                                @foreach($dytype as $key=>$type)
                                <li><a href="/movielist/{{$type}}/1.html">{{$key}}</a></li>
                                  @break($loop->index==7)
                                 @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="hy-right-qrcode hidden-sm hidden-xs">
                        <div class="item">
                            <dl class="clearfix">
                                <dt><img src="{{config('wxconfig.wximg')}}"></dt>
                                <dd>
                                    <h4>扫描二维码关注看大片</h4>
                                    <p class="text-muted">
                                        也可以分享到朋友圈哦！
                                    </p>
                                    <p class="margin-0 text-muted">
                                        http://{{config('webset.webdomin')}}/ </p>
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
            <!--抢先看-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <h3 class="margin-0"><i class="icon iconfont icon-update text-color"></i> 抢先看</h3>
                    <ul class="pull-right">
                        <li class="active"><a href="/cxlist.html" class="text-muted">更多 <i
                                        class="icon iconfont icon-right"></i></a></li>
                    </ul>
                </div>
                <div class="clearfix">
                    <div class="hy-video-list cleafix">
                        <div class="item">
                            @if(isset($dydata)&&!empty($dydata))
                                @foreach($dydata as $key=>$dy)
                                    <div class="col-md-2 col-sm-3 col-xs-4">
                                        <a class="videopic lazy" href="/play/{{$key}}.html" onclick="jilu(this)"
                                           title="{{$dy['dyname']}}"
                                           src="{{$dy['dylogo']}}"
                                           style="background: url({{$dy['dylogo']}}) no-repeat; background-position:50% 50%; background-size: cover;"><span
                                                    class="play hidden-xs"></span><span class="score"></span></a>
                                        <div class="title">
                                            <h5 class="text-overflow"><a href="/play/{{$key}}.html" onclick="jilu(this)"
                                                                         src="{{$dy['dylogo']}}"
                                                                         title="{{$dy['dyname']}}">{{$dy['dyname']}}</a>
                                            </h5>
                                        </div>
                                    </div>
                                    @break($loop->index==11)
                                @endforeach
                            @else
                            @endif
                        </div>
                    </div>
                </div>
                <div class="hy-video-footer visible-xs clearfix">
                    <a href="/cxlist.html" class="text-muted">查看更多 <i
                                class="icon iconfont icon-right pull-right"></i></a>
                </div>
            </div>
            <!--抢先看-->
            <!--电影-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <ul class="pull-right">
                        <li class="active"><a href="/movielist/all/1.html" class="text-muted">更多
                                <i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                    <h3 class="margin-0"><i class="icon iconfont icon-film text-color"></i>电影</h3>
                </div>
                <div class="clearfix">
                    @foreach($dys as $dy)
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <a class="videopic lazy" href="/play/{{$dy['url']}}.html" onclick="jilu(this)"
                               title="{{$dy['title']}}"
                               src="{{$dy['img']}}"
                               style="background: url({{$dy['img']}}) no-repeat; background-position:50% 50%; background-size: cover;"><span
                                        class="play hidden-xs"></span><span class="score">{{isset($dy['pf'])?$dy['pf']:''}}</span></a>
                            <div class="title">
                                <h5 class="text-overflow"><a href="/play/{{$dy['url']}}.html" onclick="jilu(this)"
                                                             title="{{$dy['title']}}"
                                                             src="{{$dy['img']}}">{{$dy['title']}}</a></h5>
                            </div>
                        </div>
                        @break($loop->index==17)
                    @endforeach
                    <div class="hy-video-footer visible-xs clearfix">
                        <a href="/movielist/all/1.html" class="text-muted">查看更多 <i
                                    class="icon iconfont icon-right pull-right"></i></a>
                    </div>
                </div>
            </div>
            <!--电影-->
            <!--电视剧-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <ul class="pull-right">
                        <li class="active"><a href="/tvlist/all/1.html" class="text-muted">更多 <i
                                        class="icon iconfont icon-right"></i></a></li>
                    </ul>
                    <h3 class="margin-0"><i class="icon iconfont icon-show text-color"></i>电视剧</h3>
                </div>
                <div class="clearfix">
                    @foreach($dsjs as $dsj)
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <a class="videopic lazy" href="/play/{{$dsj['url']}}.html" onclick="jilu(this)"
                               title="{{$dsj['title']}}"
                               src="{{$dsj['img']}}"
                               style="background: url({{$dsj['img']}}) no-repeat; background-position:50% 50%; background-size: cover;"><span
                                        class="play hidden-xs"></span><span class="score">{{$dsj['js']}}</span></a>
                            <div class="title">
                                <h5 class="text-overflow"><a href="/play/{{$dsj['url']}}.html" src="{{$dsj['img']}}"
                                                             onclick="jilu(this)">{{$dsj['title']}}</a></h5>
                            </div>
                            <div class="subtitle text-muted text-muted text-overflow hidden-xs">{{$dsj['star']}}</div>
                        </div>
                        @break($loop->index==17)
                    @endforeach
                    <div class="hy-video-footer visible-xs clearfix">
                        <a href="/tvlist/all/1.html" class="text-muted">查看更多 <i
                                    class="icon iconfont icon-right pull-right"></i></a>
                    </div>
                </div>
            </div>
            <!--电视剧-->
            <!--综艺-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <ul class="pull-right">
                        <li class="active"><a href="/zylist/all/1.html" class="text-muted">更多
                                <i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                    <h3 class="margin-0"><i class="icon iconfont icon-mallanimation text-color"></i>综艺</h3>
                </div>
                <div class="clearfix">
                    @foreach($zys as $zy)
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <a class="videopic lazy" onclick="jilu(this)" href="/play/{{$zy['url']}}.html"
                               title="{{$zy['title']}}"
                               src="{{$zy['img']}}"
                               style="background: url({{$zy['img']}}) no-repeat; background-position:50% 50%; background-size: cover;"><span
                                        class="play hidden-xs"></span><span class="score">{{$zy['js']}}</span></a>
                            <div class="title">
                                <h5 class="text-overflow"><a href="/play/{{$zy['url']}}.html" onclick="jilu(this)"
                                                             src="{{$zy['img']}}">{{$zy['title']}}</a></h5>
                            </div>
                            <div class="subtitle text-muted text-muted text-overflow hidden-xs">{{$zy['star']}}</div>
                        </div>
                        @break($loop->index==17)
                    @endforeach
                    <div class="hy-video-footer visible-xs clearfix">
                        <a href="/zylist/all/1.html" class="text-muted">查看更多 <i
                                    class="icon iconfont icon-right pull-right"></i></a>
                    </div>
                </div>
            </div>
            <!--综艺-->
            <!--动漫-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout clearfix">
                <div class="hy-video-head">
                    <ul class="pull-right">
                        <li class="active"><a href="/dmlist/all/1.html" class="text-muted">更多
                                <i class="icon iconfont icon-right"></i></a></li>
                    </ul>
                    <h3 class="margin-0"><i class="icon iconfont icon-mallanimation text-color"></i>动漫</h3>
                </div>
                <div class="clearfix">
                    @foreach($dms as $dm)
                        <div class="col-md-2 col-sm-3 col-xs-4">
                            <a class="videopic lazy" href="/play/{{$dm['url']}}.html" title="{{$dm['title']}}"
                               src="{{$dm['img']}}"
                               style="background: url({{$dm['img']}}) no-repeat; background-position:50% 50%; background-size: cover;"
                               onclick="jilu(this)"><span
                                        class="play hidden-xs"></span><span class="score">{{$dm['js']}}</span></a>
                            <div class="title">
                                <h5 class="text-overflow"><a href="/play/{{$dm['url']}}.html" src="{{$dm['img']}}"
                                                             onclick="jilu(this)">{{$dm['title']}}</a></h5>
                            </div>
                            <div class="subtitle text-muted text-muted text-overflow hidden-xs"></div>
                        </div>
                        @break($loop->index==17)
                    @endforeach
                    <div class="hy-video-footer visible-xs clearfix">
                        <a href="/zylist/all/1.html" class="text-muted">查看更多 <i
                                    class="icon iconfont icon-right pull-right"></i></a>
                    </div>
                </div>
            </div>
            <!--动漫-->
            <div class="row" style="margin-top:10px"></div>
            <div class="hy-layout hidden-sm hidden-xs clearfix">
                <div class="hy-video-head">
                    <h3 class="margin-0">友情链接</h3>
                </div>
                <div class="hy-footer-link">
                    <div class="item clearfix">
                        <ul class="clearfix">
                            @if(isset($yqlist))
                                @foreach($yqlist as $yq)
                                    <a href="{{$yq['yqlink']}}" target="_blank">{{$yq['yqname']}}</a>
                                @endforeach
                            @else
                            @endif
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var swiper = new Swiper('.hy-slide', {
            pagination: '.swiper-pagination',
            paginationClickable: true,
            autoplay: 3000,
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
        });
    </script>
@endsection()
