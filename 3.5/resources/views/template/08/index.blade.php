@extends('template.08.layout')
@section('title','首页')
@section('css','index')
@section('other')
    <link rel="stylesheet" href="/public/static/08/css/banner.css" />
    <script src="/public/static/08/js/jquery-1.11.3.min.js" type="text/javascript"></script>
    <script src="/public/static/08/js/wySilder.min.js" type="text/javascript"></script>
@endsection
@section('content')
    <div class="zw"></div>
    <div class="js-silder">
        <div class="silder-scroll">
            <div class="silder-main">
                @if($bannerlist)
                    @foreach($bannerlist as $v)
                <div class="silder-main-img">
                    <a href="{{$v['bannerlink']}}"><img class="bannerimg" src="{{$v['bannerimg']}}" alt="{{$v['bannername']}}"></a>
                </div>
                    @endforeach
                @else
                @endif
            </div>
        </div>
    </div>
    <div id="homeso">
        <div id="soform" style="text-align: center;float: none">{!! config('adconfig.index_ad') !!}<br><br>
            <input tabindex="2" class="homesoin" id="sos" name="key" type="text" placeholder="输入你要观看的视频" value="">
            <button id="button" tabindex="3" class="homesobtn" type="button"><i class="fa">观看</i></button>
    </div>
    </div>
    <section class="container">
        <div class="single-strong">电影尝鲜<span class="chak"><a href="/cxlist.html">查看更多</a></span></div>
        <div class="b-listtab-main">
            <div class="s-tab-main">
                <ul class="list g-clear">
                    @if(isset($dydata)&&!empty($dydata))
                    @foreach($dydata as $key=>$dy)
                        <li class='item'><a class='js-tongjic' href='/play/{{$key}}.html' onclick="jilu(this)" title='{{$dy['dyname']}}' target='_blank'>
                                <div class='cover g-playicon'>
                                    <img src='{{$dy['dylogo']}}' alt='{{$dy['dyname']}}'/>
                                    <span class='pay'>尝鲜</span> <span class='hint'></span>
                                </div>
                                <div class='detail'>
                                    <p class='title g-clear'>
                                        <span class='s1'>{{$dy['dyname']}}</span>
                                        <span class='s2'></span></p>
                                    <p class='star'></p>
                                </div>
                            </a>
                        </li>
                        @break($loop->index==11)
                    @endforeach
                        @else
                        <li class="item"> <h4>暂无尝鲜</h4></li>
                 @endif
                </ul>
            </div>
        </div>
        <div class="single-strong">最新热门电影推荐<span class="chak"><a href="/movielist/all/1.html">查看更多</a></span></div>
        <div class="b-listtab-main">
            <div class="s-tab-main">
                <ul class="list g-clear">
                    @foreach($dys as $dy)
                    <li class='item'><a class='js-tongjic' href='/play/{{$dy['url']}}.html' onclick="jilu(this)" title='{{$dy['title']}}' target='_blank'>
                            <div class='cover g-playicon'>
                                <img src='{{$dy['img']}}' alt='{{$dy['title']}}'/>
                                <span class='pay'>热门</span> <span class='hint'></span>
                            </div>
                            <div class='detail'>
                                <p class='title g-clear'>
                                    <span class='s1'>{{$dy['title']}}</span>
                                    <span class='s2'>{{$dy['pf']}}</span></p>
                                <p class='star'></p>
                            </div>
                        </a>
                    </li>
                        @break($loop->index==17)
                    @endforeach
                </ul>
            </div>
        </div>


        <div class="single-strong">最新热门电视剧推荐<span class="chak"><a href="/tvlist/all/1.html">查看更多</a></span></div>
        <div class="b-listtab-main">
            <div class="s-tab-main">
                <ul class="list g-clear">
                    @foreach($dsjs as $dsj)
                    <li class='item'><a class='js-tongjic' href='/play/{{$dsj['url']}}.html' onclick="jilu(this)" title='{{$dsj['title']}}'>
                            <div class='cover g-playicon'>
                                <img src='{{$dsj['img']}}' alt='{{$dsj['title']}}'/>
                                <span class='hint'>{{$dsj['js']}}</span>
                            </div>
                            <div class='detail'>
                                <p class='title g-clear'>
                                    <span class='s1'>{{$dsj['title']}}</span>
                                    <span class='s2'></span></p>
                                <p class='star'>{{$dsj['star']}}</p>
                            </div>
                        </a>
                    </li>
                        @break($loop->index==17)
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="single-strong">最新热门综艺推荐<span class="chak"><a href="/zylist/all/1.html">查看更多</a></span></div>
        <div class="b-listtab-main">
            <div class="s-tab-main">
                <ul class="list g-clear">
                    @foreach($zys as $zy)
                        <li class='item'><a class='js-tongjic' href='/play/{{$zy['url']}}.html' onclick="jilu(this)" title='{{$zy['title']}}'>
                                <div class='cover g-playicon'>
                                    <img src='{{$zy['img']}}' alt='{{$zy['title']}}'/>
                                    <span class='hint'>{{$zy['js']}}</span>
                                </div>
                                <div class='detail'>
                                    <p class='title g-clear'>
                                        <span class='s1'>{{$zy['title']}}</span>
                                        <span class='s2'></span></p>
                                    <p class='star'>{{$zy['star']}}</p>
                                </div>
                            </a>
                        </li>
                        @break($loop->index==17)
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="single-strong">最新热门动漫推荐<span class="chak"><a href="/dmlist/all/1.html">查看更多</a></span></div>
        <div class="b-listtab-main">
            <div class="s-tab-main">
                <ul class="list g-clear">
                    @foreach($dms as $dm)
                        <li class='item'><a class='js-tongjic' href='/play/{{$dm['url']}}.html' onclick="jilu(this)" title='{{$dm['title']}}'>
                                <div class='cover g-playicon'>
                                    <img src='{{$dm['img']}}' alt='{{$dm['title']}}'/>
                                    <span class='hint'>{{$dm['js']}}</span>
                                </div>
                                <div class='detail'>
                                    <p class='title g-clear'>
                                        <span class='s1'>{{$dm['title']}}</span>
                                        <span class='s2'></span></p>
                                    <p class='star'></p>
                                </div>
                            </a>
                        </li>
                        @break($loop->index==17)
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
        <script>
            $(function () {
                $('#button').click(function () {
                    var key = $('#sos').val();
                    if (key != '' && key != null) {
                        window.location = '/search/' + key + '.html'
                    }
                });

                $('input').keyup(function () {
                    if (event.keyCode == 13) {
                        $("#button").trigger("click");
                    }
                })
            })
        </script>
        <script>
            $(function (){
                $(".js-silder").silder({
                    auto: true,//自动播放，传入任何可以转化为true的值都会自动轮播
                    speed: 20,//轮播图运动速度
                    sideCtrl: true,//是否需要侧边控制按钮
                    bottomCtrl: true,//是否需要底部控制按钮
                    defaultView: 0,//默认显示的索引
                    interval: 3000,//自动轮播的时间，以毫秒为单位，默认3000毫秒
                    activeClass: "active",//小的控制按钮激活的样式，不包括作用两边，默认active
                });
            });
        </script>
@endsection