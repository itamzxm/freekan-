@extends('template.08.layout')
@section('title',$zb['zbname'])
@section('css','play')
@section('other')
    <script src="http://tv.bbbbbb.me/ckplayer/ckplayer.js"></script>
@endsection
@section('content')
    <div class="single-post">
        <section class="container">
            <div class="content-wrap">
                <div class="content">
                    <div class="asst asst-post_header">
                        {!! config('adconfig.play_top') !!}
                    </div>
                    <div class="sptitle"><h1>正在直播--{{$zb['zbname']}}<span class="js"></span></h1></div>
                    <div id="bof">
                    </div>
                    <div class="am-cf"></div>
                    <div class="am-panel am-panel-default">
                        <div class="am-panel-bd">
                                <div id="video"></div>
                            <!--<p style="background:#000;margin: 0;"><font color="red"><b><marquee scrolldelay="120">若无法播放请更换其它线路或播放源</marquee></b></font></p>-->
                            <div style="clear: both;"></div>


                            <div id="xuji"></div>
                            <!--<p style="text-align: center;color: #F00;font-size: 10px;background: #eee;padding: 6px 2px;border-radius: 2px;"><a href="https://m.vk.com/zzlmw" target="_blank">如不能正常播放请更换播放源或播放线路</a></p>-->
                            <div class="video-list view-font">
                                <div class="dianshijua" id="dianshijuid">
                                    <h3 class="single-strong">直播源<font color="#ff6651"></font></h3>
                                    <div class="top-list-ji">
                                        <h2 class="title g-clear">
                                            <em class="a-bigsite a-bigsite-leshi"></em>
                                        </h2>
                                        <div class="ji-tab-content js-tab-content" style="opacity:1;">
                                            <a data-href="{{$zb['zbaddr']}}" href="javascript:void (0)" id="bofang" class="am-btn am-btn-default lipbtn ys" target='ajax'>{{$zb['zbname']}}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="clear: both;"></div>
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
        </section>
    </div>
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
@endsection

