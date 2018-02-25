@extends('template.joeleo.layout')
@section('content')
    <section class="aui-content">
        <!-- 幻灯片  -->
        <section id="home-banner" class="swiper-container home-banner">
            <div class="swiper-wrapper">
                @if($bannerlist)
                    @foreach($bannerlist as $v)
                <div class="swiper-slide">
                    <a href="{{$v['bannerlink']}}" title="{{$v['bannername']}}">
                        <div class="pic swiper-lazy" style="height:150px;" data-background="{{$v['bannerimg']}}">
                            <img onerror="this.src='/public/static/joeleo/images/loadingbg.png'" src="/public/static/joeleo/images/Joeleo.png"style="height:150px;"/>
                        </div>
                        <div class="title"><p>{{$v['bannername']}}</p></div>
                    </a>
                </div>
                    @endforeach
                @else
                @endif
            </div>
            <div class="swiper-pagination"></div>
        </section>
        <!-- 热门推荐  -->
        <section class="col-head" style="margin-top: 2.7rem;">
            <div class="title">
                <svg class="icon" aria-hidden="true">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-fanjutuijian"></use>
                </svg>热门推荐</div>
            <div class="more"><i class="aui-iconfont aui-icon-paper"></i>&nbsp;热片抢先看 &nbsp;<i class="aui-iconfont aui-icon-right"></i></div>
        </section>
        <section class="col-main">
            <div class="row">
                <div class="col-3-List">
                    <ul>
                        @if(isset($dydata)&&!empty($dydata))
                            @foreach($dydata as $key=>$dy)
                        <li class="item">
                            <a href="/play/{{$key}}.html" title="{{$dy['dyname']}}" class="item-link">
                                <div class="item-pic" style="height: 150px; background-image: url({{$dy['dylogo']}});" data-echo="{{$dy['dylogo']}}">
                                    <img onerror="this.src='/public/static/joeleo/images/nopic.gif'" src="/public/static/joeleo/images/nopic.gif" style="height:150px;">
                                </div>
                                <span class="covericon">抢先看</span>
                                <span class="sBottom"><span>超清</span></span>
                            </a>
                            <a href="/play/{{$key}}.html" title="{{$dy['dyname']}}" class="item-info">
                                <span class="sTit">{{$dy['dyname']}}</span>
                                <span class="sDes"></span>

                            </a>
                        </li>
                                @break($loop->index==5)
                            @endforeach
                        @else
                        @endif
                    </ul>
                </div>
            </div>
        </section>

        <!-- 热播电影  -->
        <section class="col-head" style="margin-top: 0rem;">
            <div class="title"> <svg class="icon" aria-hidden="true">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-dianying"></use>
                </svg>热播影院</div>
            <div class="more"><i class="aui-iconfont aui-icon-location"></i>&nbsp;观影更方便 &nbsp;</div>
        </section>
        <section class="col-main">
            <div class="row">
                <div class="col-3-List">
                    <ul>
                        @foreach($dys as $dy)
                        <li class="item">
                            <a href="/play/{{$dy['url']}}.html" title="{{$dy['title']}}" class="item-link">
                                <div class="item-pic" style="height: 150px; background-image: url({{$dy['img']}});" data-echo="{{$dy['img']}}">
                                    <img onerror="this.src='/public/static/joeleo/images/nopic.gif'" src="/public/static/joeleo/images/nopic.gif" style="height:150px;">
                                </div>
                                <span class="covericon">热播中</span>
                                <span class="sBottom"><span>{{$dy['pf']}}</span></span>
                            </a>
                            <a href="/play/{{$dy['url']}}.html" title="{{$dy['title']}}" class="item-info">
                                <span class="sTit">{{$dy['title']}}</span>
                                <span class="sDes">{{$dy['star']}}</span>

                            </a>
                        </li>
                            @break($loop->index==5)
                        @endforeach
                    </ul>
                </div>

                <a class="mod-check-more" href="/movielist/all/1.html">更多院线电影</a>

            </div>
        </section>

        <!-- 同步剧场  -->
        <section class="col-head" style="margin-top: 0rem;">
            <div class="title"> <svg class="icon" aria-hidden="true">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-dianshiju"></use>
                </svg>同步剧场</div>
            <div class="more"><i class="aui-iconfont aui-icon-location"></i>&nbsp;热剧随意追 &nbsp;</div>
        </section>
        <section class="col-main">
            <div class="row">
                <div class="col-3-List">
                    <ul>
                        @foreach($dsjs as $dsj)
                        <li class="item">
                            <a href="/play/{{$dsj['url']}}.html" title="{{$dsj['title']}}" class="item-link">
                                <div class="item-pic" style="height: 150px; background-image: url({{$dsj['img']}});" data-echo="{{$dsj['img']}}">
                                    <img onerror="this.src='/public/static/joeleo/images/nopic.gif'" src="/public/static/joeleo/images/nopic.gif" style="height:150px;">
                                </div><span class="covericon">热播中</span>
                                <span class="covericon">热播中</span>
                                <span class="sBottom"><span>{{$dsj['js']}}</span></span>
                            </a>
                            <a href="/play/{{$dsj['url']}}.html" title="{{$dsj['title']}}" class="item-info">
                                <span class="sTit">{{$dsj['title']}}</span>
                                <span class="sDes">{{$dsj['star']}}</span>

                            </a>
                        </li>
                            @break($loop->index==5)
                        @endforeach
                    </ul>
                </div>

                <a class="mod-check-more" href="/tvlist/all/1.html">更多热播剧场</a>

            </div>
        </section>

        <!-- 劲爆综艺  -->
        <section class="col-head" style="margin-top: 0rem;">
            <div class="title"> <svg class="icon" aria-hidden="true">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-yule"></use>
                </svg>劲爆综艺</div>
            <div class="more"><i class="aui-iconfont aui-icon-location"></i>&nbsp;综艺聚多看 &nbsp;</div>
        </section>
        <section class="col-main">
            <div class="row">
                <div class="col-3-List">
                    <ul>
                        @foreach($zys as $zy)
                        <li class="item">
                            <a href="/play/{{$zy['url']}}.html" title="{{$zy['title']}}" class="item-link">
                                <div class="item-pic item-lazy" style="height:150px;" data-echo="{{$zy['img']}}">
                                    <img onerror="this.src='/public/static/joeleo/images/nopic.gif'" src="/public/static/joeleo/images/nopic.gif" style="height:150px;">
                                </div><span class="covericon">热播中</span>
                            </a>
                            <a href="/play/{{$zy['url']}}.html" title="{{$zy['title']}}" class="item-info">
                                <span class="sTit">{{$zy['js']}}</span>
                                <span class="sDes">{{$zy['star']}}</span>
                            </a>
                        </li>
                            @break($loop->index==5)
                        @endforeach
                    </ul>
                </div>

                <a class="mod-check-more" href="/zylist/all/1.html">更多劲爆综艺</a>

            </div>
        </section>

        <!-- 热播动漫  -->
        <section class="col-head" style="margin-top: 0rem;">
            <div class="title"> <svg class="icon" aria-hidden="true">
                    <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-guochandonghuatuijian"></use>
                </svg>热播动漫</div>
            <div class="more"><i class="aui-iconfont aui-icon-location"></i>&nbsp;回归纯与真 &nbsp;</div>
        </section>
        <section class="col-main">
            <div class="row">
                <div class="col-3-List">
                    <ul>
                        @foreach($dms as $dm)
                        <li class="item">
                            <a href="/play/{{$dm['url']}}.html" title="{{$dm['title']}}" class="item-link">
                                <div class="item-pic item-lazy" style="height:150px;" data-echo="{{$dm['img']}}">
                                    <img onerror="this.src='/public/static/joeleo/images/nopic.gif'" src="/public/static/joeleo/images/nopic.gif" style="height:150px;">
                                </div><span class="covericon">热播中</span>
                                <span class="covericon">热播中</span>
                                <span class="sBottom"><span>正片</span></span>
                            </a>
                            <a href="/play/{{$dm['url']}}.html" title="{{$dm['title']}}" class="item-info">
                                <span class="sTit">{{$dm['title']}}</span>
                                <span class="sDes">{{$zy['js']}}</span>

                            </a>
                        </li>
                            @break($loop->index==5)
                        @endforeach
                    </ul>
                </div>

                <a class="mod-check-more" href="/dmlist/all/1.html">更多好看动漫</a>

            </div>
        </section>
    </section>
 @endsection