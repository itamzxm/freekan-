<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
          content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta http-equiv="X-UA-Compatible" content="IE=edge"><!--ie使用edge渲染模式-->
    <meta content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=no" id="viewport" name="viewport">
    <meta name="renderer" content="webkit"><!--360渲染模式-->
    <meta name="format-detection" content="telephone=notelphone=no, email=no" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <meta name="apple-touch-fullscreen" content="yes"><!-- 是否启用 WebApp 全屏模式，删除苹果默认的工具栏和菜单栏 -->
    <meta name="apple-mobile-web-app-status-bar-style" content="black"><!-- 设置苹果工具栏颜色:默认值为 default，可以定为 black和 black-translucent-->
    <meta http-equiv="Cache-Control" content="no-siteapp" /><!-- 不让百度转码 -->
    <meta name="HandheldFriendly" content="true"><!-- 针对手持设备优化，主要是针对一些老的不识别viewport的浏览器，比如黑莓 -->
    <meta name="MobileOptimized" content="320"><!-- 微软的老式浏览器 -->
    <meta name="screen-orientation" content="portrait"><!-- uc强制竖屏 -->
    <meta name="x5-orientation" content="portrait"><!-- QQ强制竖屏 -->
    <meta name="browsermode" content="application"><!-- UC应用模式 -->
    <meta name="x5-page-mode" content="app"><!-- QQ应用模式 -->
    <meta name="msapplication-tap-highlight" content="no"><!-- windows phone 点击无高光 -->
    <title>{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')</title>
    <link rel='stylesheet' id='main-css' href='/public/static/08/css/style.css' type='text/css' media='all'/>
    <link rel='stylesheet' id='main-css' href='/public/static/08/css/@yield('css').css' type='text/css' media='all'/>
    <link rel='stylesheet' id='main-css' href='/public/static/08/css/history.css' type='text/css' media='all'/>
    <script type='text/javascript' src='/public/static/08/js/jquery.min_2.js'></script>
    @section('other')
    @show
    <meta name="keywords" content="{{config('webset.webkeywords')?config('webset.webkeywords'):'全网vip免费看'}}">
    <meta name="description"
          content="{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')-{{config('webset.wedesc')?config('webset.wedesc'):'全网vip免费看'}}">
    <script src='/public/static/08/js/html5./js'></script>
    <style>
        .w-newfigure {
            list-style: none;
            float: left;
        }

        .list {
            margin-left: -40px;
        }

        .ys {
            background-color: deepskyblue;
            color: white;
        }

        #a1 {
            padding: 0;
            margin: 0;
            width: 100%;
            height: 800px;
            psotion: relative;
        }

        .mvul {
            width: 100%;
            margin: 0 auto;
            padding: 0;
        }

        .mvul li {
            width: 48%;
            list-style: none;
            border: 1px solid #eee;
            padding: 9px;
            margin: 8px 0;
            border-radius: 2px;
            float: left;
            margin-right: 2%;
        }

        .mvul li:hover {
            background: #ff6651;
            color: #fff;
        }
    </style>
</head>
<body class="page-template page-template-pages page-template-posts-film page-template-pagesposts-film-php page page-id-9">
<header class="header">
    <div class="container">
        <h1 class="logo"><a href="http://{{config('webset.webdomin')}}" title=""><img src="/public/static/08/images/logo.png"><span></span></a></h1>
        <div class="sitenav">
            <ul>
                @if($navlist)
                    @foreach($navlist as $v)
                <li id="menu-item-18" class="menu-item"><a href="{{$v['navaddr']}}">{{$v['navname']}}</a></li>
                    @endforeach
                @else
                @endif
                <li id="menu-item-20" class="menu-item">{!! config('appconfig.isdh')?'<a href="/app.html" target="_blank">'.config('appconfig.appdh').'</a>':'' !!}</li>
                </ul>
        </div>
        <span class="sitenav-on"><i class="icon-list"></i></span>
        <span class="sitenav-mask"></span>
        <div class="accounts">
            <a class="account-weixin" href="javascript:;"><i class="fa"></i>
                <div class="account-popover">
                    <div class="account-popover-content"><img src="{{config('wxconfig.wximg')}}"></div>
                </div>
            </a>
        </div>
        <span class="searchstart-on"><i class="icon-search"></i></span>
        <span class="searchstart-off"><i class="icon-search"></i></span>
        <div class="searchform">
            <button tabindex="3" class="sbtn" type="submit" id="sosuo"><i class="fa"></i></button>
            <input tabindex="2" class="sinput" name="wd" type="text" placeholder="输入关键字" value="">
        </div>
    </div>

</header>
@section('content')
@show
<div class="foornav">
    <a href="/"><span><img src="/public/static/08/images/index.png"/>首页</span></a>
    <a href="/movielist/all/1.html"><span><img
                    src="/public/static/08/images/mv.png"/>电影</span></a>
    <a href="/tvlist/all/1.html"><span><img
                    src="/public/static/08/images/tv.png"/>热剧</span></a>
    <a href="/zylist/all/1.html"><span><img
                    src="/public/static/08/images/zy.png"/>综艺</span></a>
    <a href="/dmlist/all/1.html"><span><img
                    src="/public/static/08/images/dm.png"/>动漫</span></a>

</div>
<footer class="footer">
    <div class="branding branding-black">
        <div class="container" style="text-align: center;">
            <h2>{{config('webset.webname')}}--友情链接</h2>
            @if(isset($yqlist))
                @foreach($yqlist as $yq)
                    <a target="blank" class="gobtn" href="{{$yq['yqlink']}}">{{$yq['yqname']}}</a>
                @endforeach
            @else
            @endif
        </div>
    </div>
    <p style="padding: 0 4px;"><br/>本站所有资源均来自互联网,本站不进行任何存储<br/>&copy; 2017 <a
                href="http://www.beianbeian.com/">{{config('webset.webicp')}}</a>&nbsp;
        本站主题由by:{{config('webset.copyright')}}提供 &nbsp; 站长邮箱:{{config('webset.webmail')}}{!!config('webset.webtongji')!!}
</footer>
<div class="rewards-popover-mask" etap="rewards-close"></div>
<script type='text/javascript' src='/public/static/08/js/main.js'></script>
<script>
    $(function () {
        $('#sosuo').click(function () {
            var key = $('.sinput').val();
            if (key != '' && key != null) {
                window.location = '/search/' + key + '.html'
            }
        });

        $('input').keyup(function () {
            if (event.keyCode == 13) {
                $("#sosuo").trigger("click");
            }
        })
    })
</script>
<script>
    function jilu(obj) {
        var url = $(obj).attr('href');
        var img = $(obj).children().children('img').attr('src');
        var title = $(obj).attr('title');
        $.ajax({
            type: "get",
            url: "/history",
            dataType: "json",
            data: {"url": url, "img": img, "title": title},
            success: function () {

            }
        })
    }
</script>
</body>
</html>