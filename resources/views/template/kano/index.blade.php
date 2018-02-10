@extends('template.kano.layout')
@section('content')
<!--导航2-->
<div id="video_container">
    <section class="mod_box">
        <!-- banner start -->
        <div class="device tops  figure">
            <div class="swiper-container">
                <a class="arrow-left" href="#"></a>
                <a class="arrow-right" href="#"></a>
                <div class="swiper-wrapper" >
                    @if($bannerlist)
                        @foreach($bannerlist as $v)
                            <li class="swiper-slide">
                        <span class="figure_pic">
                            <a href="{{$v['bannerlink']}}">
                                <img src="{{$v['bannerimg']}}" alt="{{$v['bannername']}}" style="visibility: visible;">
                            </a>
                            <span class="mask_duration"></span>
                            <span class="mask_info">{{$v['bannername']}}</span>
                        </span>
                            </li>
                        @endforeach
                    @else
                    @endif
                </div>
            </div>
            <div class="pagination"></div>
        </div>
        <!-- banner end -->
        <div class="mod_hd" style="display:block;"><h2 class="mod_title"><a href="javascript:;" title="抢先看">抢先看</a></h2></div>
        <div class="mod_figures mod_figures_h"><ul class="mod_figure">
                @if(isset($dydata)&&!empty($dydata))
                    @foreach($dydata as $key=>$dy)
                <li class="item"><a href="/play/{{$key}}.html" _hot="channel.variety.video" class="figure"><span class="figure_pic"><img src="{{$dy['dylogo']}}" alt="{{$dy['dyname']}}" style="visibility: visible;"><span class="mask_duration"></span><span class="mask_info">抢先</span></span><div class="figure_titles"><span class="figure_title figure_title_multirow">{{$dy['dyname']}}</span></div></a></li>
                        @break($loop->index==11)
                    @endforeach
                @else
                @endif
            </ul>
        </div>

        <div class="mod_hd" style="display:block;"><h2 class="mod_title"><a href="javascript:;" title="热门电影">热门电影</a></h2></div>

        <div class="mod_figure_highlight">
            @foreach($dys as $dy)
            <a href="/play/{{$dy['url']}}.html" class="figure"><span class="figure_pic"><img src="{{$dy['img']}}" alt="{{$dy['title']}}" style="visibility: visible;"><span class="mask_duration">{{$dy['pf']}}</span><span class="mask_info">热门</span></span><div class="figure_titles"><span class="figure_title figure_title_multirow">{{$dy['title']}}</span><p class="figure_desc"></p></div></a>
                @break($loop->index==0)
            @endforeach
        </div>

        <div class="mod_figures mod_figures_h"><ul class="mod_figure">
                @foreach($dys as $dy)
                <li class="item"><a href="/play/{{$dy['url']}}.html" _hot="channel.variety.video" class="figure"><span class="figure_pic"><img src="{{$dy['img']}}" alt="{{$dy['title']}}" style="visibility: visible;"><span class="mask_duration">{{$dy['pf']}}</span><span class="mask_info">超清</span></span><div class="figure_titles"><span class="figure_title figure_title_multirow">{{$dy['title']}}</span></div></a></li>
                    @break($loop->index==11)
                @endforeach
            </ul>
        </div>

        <div class="mod_hd" style="display:block;"><h2 class="mod_title"><a href="javascript:;" title="综艺娱乐">综艺娱乐</a></h2></div>

        <div class="mod_figure_highlight">
            @foreach($zys as $zy)
            <a href="/play/{{$zy['url']}}.html" class="figure"><span class="figure_pic"><img src="{{$zy['img']}}" alt="{{$zy['title']}}" style="visibility: visible;"><span class="mask_duration"></span><span class="mask_info">{{$zy['js']}}</span></span><div class="figure_titles"><span class="figure_title figure_title_multirow">{{$zy['title']}}</span><p class="figure_desc">{{$zy['star']}}</p></div></a>
                @break($loop->index==0)
            @endforeach
        </div>

        <div class="mod_figures mod_figures_h"><ul class="mod_figure">
                @foreach($zys as $zy)
                <li class="item"><a href="/play/{{$zy['url']}}.html" class="figure"><span class="figure_pic"><img src="{{$zy['img']}}" alt="{{$zy['title']}}" style="visibility: visible;"><span class="mask_duration"></span><span class="mask_info">{{$zy['js']}}</span></span><div class="figure_titles"><span class="figure_title figure_title_multirow">{{$zy['title']}}</span></div></a></li>
                    @break($loop->index==11)
                @endforeach
            </ul>
        </div>

        <div class="mod_hd" style="display:block;"><h2 class="mod_title"><a href="javascript:;" title="电视剧场">电视剧场</a></h2></div>

        <div class="mod_figure_highlight">
            @foreach($dsjs as $dsj)
            <a href="/play/{{$dsj['url']}}.html" class="figure"><span class="figure_pic"><img src="{{$dsj['img']}}" alt="{{$dsj['title']}}" style="visibility: visible;"><span class="mask_duration"></span><span class="mask_info">{{$dsj['js']}}</span></span><div class="figure_titles"><span class="figure_title figure_title_multirow">{{$dsj['title']}}</span><p class="figure_desc"> </p></div></a>
                @break($loop->index==0)
            @endforeach
        </div>

        <div class="mod_figures mod_figures_h">
            <ul class="mod_figure">
                @foreach($dsjs as $dsj)
                <li class="item"><a href="/play/{{$dsj['url']}}.html" _hot="channel.variety.video" class="figure"><span class="figure_pic"><img src="{{$dsj['img']}}" alt="{{$dsj['title']}}" style="visibility: visible;"><span class="mask_duration"></span><span class="mask_info">{{$dsj['js']}}</span></span><div class="figure_titles"><span class="figure_title figure_title_multirow">{{$dsj['title']}}</span></div></a></li>
                    @break($loop->index==11)
                @endforeach
            </ul>
        </div>

    </section>

</div>
@endsection()
