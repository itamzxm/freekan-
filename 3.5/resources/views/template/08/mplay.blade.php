@extends('template.08.layout')
@section('title','首页')
@section('css','play')
@section('content')
    <div class="single-post">
        <section class="container">
            <div class="content-wrap">
                <div class="content">
                    <div class="asst asst-post_header">
                        {!! config('adconfig.play_top') !!}
                    </div>
                    <div class="sptitle"><h1>正在播放--{{$pm}}<span class="js"></span></h1></div>
                    <div id="bof">
                    </div>
                    <div class="am-cf"></div>
                    <div class="am-panel am-panel-default">
                        <div class="am-panel-bd">

                            <div class="bofangdiv">
                                <img id="addid" src="#"
                                     style="display: none;width:100%;border: 2px solid #ff6651">
                                <iframe id="video" src="/jzad" style="width:100%;border:none"></iframe>
                                <a style="display:block" id="videourlgo" href=""></a>
                            </div>
                            <!--<p style="background:#000;margin: 0;"><font color="red"><b><marquee scrolldelay="120">若无法播放请更换其它线路或播放源</marquee></b></font></p>-->
                            <div id="xlu" style="display:block">
                                @foreach($jk as $key=>$v)
                                    <button onclick="xldata(this)" data-jk="{{$v}}" class="jk">{{$key}}</button>
                                @endforeach
                            </div>
                            <div style="clear: both;"></div>


                            <div id="xuji"></div>
                            <!--<p style="text-align: center;color: #F00;font-size: 10px;background: #eee;padding: 6px 2px;border-radius: 2px;"><a href="https://m.vk.com/zzlmw" target="_blank">如不能正常播放请更换播放源或播放线路</a></p>-->
                            <div class="video-list view-font">
                                <div class="dianshijua" id="dianshijuid">
                                    <h3 class="single-strong">播放源列表<font color="#ff6651"></font></h3>
                                    <div class="top-list-ji">
                                        <h2 class="title g-clear">
                                            <em class="a-bigsite a-bigsite-leshi"></em>
                                        </h2>
                                        <div class="ji-tab-content js-tab-content" style="opacity:1;">
                                            @foreach($dyplay as $v)
                                                <a data-href='{{isset($v['play'])?$v['play']:'#'}}' href="javascript:void (0)"
                                                   class="am-btn am-btn-default lipbtn" onclick="bofang(this)"
                                                   target='ajax'>{{isset($v['play'])?$v['playname']:'暂无可用播放源'}}</a>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
                            <p class="jianjie">
                            <h3 class="single-strong">简介</h3>
                            <p class="item-desc js-close-wrap">
                                {{$desc}}
                            </p>
                            <div style="clear: both;"></div>

                            <div style="clear: both;"></div>
                        </div>
                        <!-- cy BEGIN -->
                    {!! config('webset.cy') !!}
                    <!-- cy END -->
                    </div>
                    <div class="article-actions clearfix">
                        <div class="shares">
                            <strong>分享到：</strong>
                            <a href="javascript:;" data-url="" class="share-weixin" title="分享到微信">
                                <i class="fa"></i></a><a
                                    etap="share" data-share="qzone" class="share-qzone" title="分享到QQ空间">
                                <i class="fa"></i></a><a
                                    etap="share" data-share="weibo" class="share-tsina" title="分享到新浪微博">
                                <i class="fa"></i></a><a
                                    etap="share" data-share="tqq" class="share-tqq" title="分享到腾讯微博">
                                <i class="fa"></i></a><a
                                    etap="share" data-share="qq" class="share-sqq" title="分享到QQ好友">
                                <i class="fa"></i></a><a
                                    etap="share" data-share="renren" class="share-renren" title="分享到人人网">
                                <i
                                        class="fa"></i></a><a etap="share" data-share="douban" class="share-douban"
                                                              title="分享到豆瓣网"><i class="fa"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="sidebar">
                <div class="widget widget-textasst"></div>
                <h3>您的观看记录</h3>
                <div class="textwidget">
                    <ul class="list g-clear">
                        @if($history)
                        @foreach($history as $v)
                            <li class='item history'>
                                <a href="{{$v['url']}}" onclick="">
                                 <img src="{{$v['img']}}" class="historyimg" alt="{{$v['title']}}">
                                  <span class="historytitle">{{$v['title']}}</span>
                                </a>
                            </li>
                          @endforeach
                          @else
                            <h3>暂无历史记录</h3>
                          @endif
                    </ul>
                </div>
            </div>
        </section>
    </div>
    <script>
        function bofang(obj) {
            var href = $(obj).attr('data-href');
            var text = $(obj).text();
            $('.js').text('--' + text);
            $.each($('.lipbtn'), function () {
                $(this).removeClass('ys');
            });
            $(obj).addClass('ys');
            var jiekou = $('.jkbtn').attr('data-jk');
            if (href != '' || href != null) {
                $('#video').attr('src', '/jzad');
                setTimeout(function () {
                    $('#video').attr('src', jiekou + href);
                },3000)
            }
        }

        function xldata(obj) {
            var url = $(obj).attr('data-jk');
            $.each($('.jkbtn'), function () {
                $(this).removeClass('jkbtn');
            });
            $(obj).addClass('jkbtn');
            var src = $('.ys').attr('data-href');
            $('#video').attr('src', url + src);
        }
    </script>
    <script>
        $(function () {
            $('#xlu').children('button:eq(0)').addClass('jkbtn');
            var biaoti = $('.sptitle h1').text();
            $('title').text(biaoti);
            var autourl = $('.lipbtn:eq(0)').attr('data-href');
            $('.lipbtn:eq(0)').addClass('ys');
            var text = $('.lipbtn:eq(0)').text();
            $('.js').text('---' + text);
            var jiekou = $('#xlu').children('button:eq(0)').attr('data-jk');
            if (autourl != '' || autourl != null) {
                setTimeout(function () {
                    $('#video').attr('src', jiekou + autourl);
                },3000)

            }
        })
    </script>
    <script>
        var ifh = $('.sidebar');
        if (ifh.height() < 10) {
            $('.content').css("width", "100%");
        } else {
        }
    </script>
@endsection

