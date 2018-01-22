@extends('template.wapian.layout')
@section('title',$zb['zbname'])
@section('other')
    <script src="http://tv.bbbbbb.me/ckplayer/ckplayer.js"></script>
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="hy-player clearfix">
                <div class="item">
                    <div class="col-md-9 col-sm-12 padding-0">
                        <div class="info embed-responsive embed-responsive-4by3 bofangdiv" id="cms_player">
                            <img id="addid" src="" style="display: none;width:100%;border: 0px solid #FF6651">
                            <div id="video"></div>
                            <a style="display:none" id="videourlgo" href=""></a>


                        </div>
                        <div class="footer clearfix">
                            <span class="text-muted" id="xuji">正在为您直播-{{$zb['zbname']}}<span class="js"></span></span>

                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 padding-0">
                        <div class="sidebar">
                            <div class="hy-play-list play">
                                <div class="item tyui" id="dianshijuid">
                                    <div class="panel clearfix">
                                        <a class="option collapsed" data-toggle="collapse" data-parent="#playlist"
                                           href="#playlist1">直播源列表<span class="text-muted pull-right"><i
                                                        class="icon iconfont icon-right"></i></span></a>
                                        <div id="playlist1" class="playlist collapse in dianshijua">
                                            <ul class="playlistlink-1 list-15256 clearfix">
                                                    <li>
                                                        <a href="javascript:void(0)" target="_self" id="bofang"  class="am-btn am-btn-default lipbtn" style="" data-href='{{$zb['zbaddr']}}' onclick="bofang(this)">{{$zb['zbname']}}</a>
                                                    </li>
                                            </ul>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-md-9 col-sm-12 hy-main-content">
                        <div class="hy-layout clearfix">
                            <div class="hy-switch-tabs">
                                <ul class="nav nav-tabs">
                                    <li class="active"><a href="#list3" data-toggle="tab">直播介绍</a></li>
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="hy-play-list tab-pane fade in active" id="list3">
                                    <div class="item">
                                        <div class="plot">
                                            <span>简介：</span>{{$zb['zbname']}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="hy-layout clearfix">
                            <div class="hy-video-head">
                                <h3 class="margin-0">直播评论</h3>
                            </div>
                            <div class="ff-forum" id="ff-forum" data-id="37432" data-sid="1">
                                <!-- UY BEGIN -->
                            {!! config('webset.cy') !!}
                            <!-- UY END --></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-12 hy-main-side hidden-sm hidden-xs">
                        <div class="hy-layout clearfix">
                            <div class="hy-details-qrcode side clearfix">
                                <div class="item">
                                    <h5 class="text-muted">扫一扫用手机观看</h5>
                                    <p>
                                        <img src="{{config('wxconfig.wximg')}}" width="250">
                                    </p>
                                    <p class="text-muted">
                                        分享到朋友圈
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <span class="ff-hits" id="ff-hits-insert" data-id="37432" data-sid="vod" data-type="insert"></span>
            <script>
                var swiper = new Swiper('.hy-switch', {
                    pagination: '.swiper-pagination',
                    paginationClickable: true,
                    slidesPerView: 5,
                    spaceBetween: 0,
                    nextButton: '.swiper-button-next',
                    prevButton: '.swiper-button-prev',
                    breakpoints: {
                        1200: {
                            slidesPerView: 4,
                            spaceBetween: 0
                        },
                        767: {
                            slidesPerView: 3,
                            spaceBetween: 0
                        }
                    }
                });
            </script>
            <script>
                var href = document.getElementById('bofang').getAttribute('data-href');
                var flashvars={
                    f : 'http://tv.bbbbbb.me/ckplayer/m3u8.swf',
                    a : "{{$zb['zbaddr']}}",
                    c : 0,
                    p : 1,
                    s:4,
                    lv:1
                };
                var params={bgcolor:'#FFF',allowFullScreen:true,allowScriptAccess:'always',wmode:'transparent'};
                var video=["{{$zb['zbaddr']}}"];
                var isiPad = navigator.userAgent.match(/iPad|iPhone|Linux|Android|iPod/i) != null;
                if (isiPad) {
                    var str = '<video src="'+href+'" controls="controls" autoplay="autoplay" width="100%" height="100%" style="psotion:relative;""></video>';
                    $('#video').html(str);
                }else{
                    CKobject.embed('http://tv.bbbbbb.me/ckplayer/ckplayer.swf','video','ck-video','100%','100%',false, flashvars ,video, params);
                }
            </script>
            <script>
                $(function () {
                    $('#bofang').attr('id','ys')
                })
            </script>
            <span class="ff-record-set" data-sid="1" data-id="37432" data-id-sid="1" data-id-pid="1">
            </span>
@endsection