<html lang="zh-CN"><head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control" content="no-siteapp">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=no,minimal-ui">
    <title>{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')</title>
    <meta name="keywords" content="{{config('webset.webkeywords')?config('webset.webkeywords'):'全网vip免费看'}}">
    <meta name="description" content="{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')-{{config('webset.wedesc')?config('webset.wedesc'):'全网vip免费看'}}">
    <link rel="stylesheet" href="/public/static/joeleo/css/aui.css">
    <link rel="stylesheet" href="/public/static/joeleo/css/swiper.min.css">
    <link rel="stylesheet" href="/public/static/joeleo/css/swiper.css">
    <link rel="stylesheet" href="/public/static/joeleo/css/main.css">
    <script type="text/javascript" src="/public/static/joeleo/css/iconfont.js"></script>
    <style>html, * {-webkit-user-select:text!important; -moz-user-select:text!important;}</style>
    <script>var SitePath='/',SiteAid='17',SiteTid='6',SiteId='1484';</script>
    <style type="text/css">
        .icon {
            width: 1em; height: 0.8em;
            font-size: 1.6rem;
            vertical-align: -0.15em;
            fill: currentColor;
            overflow: hidden;
        }
        .icono {
            width: 1em; height: 0.8em;
            font-size: 1.6rem;
            color:#212121;
            vertical-align: -0.15em;
            fill: currentColor;
            overflow: hidden;
        }
    </style>

    <script type="text/javascript" src="/public/static/joeleo/js/zepto.min.js"></script>
    <script type="text/javascript" src="/public/static/joeleo/js/common.js"></script>
    <script type="text/javascript" src="/public/static/joeleo/js/main.js"></script>
    <script type="text/javascript" src="/public/static/joeleo/js/jquery1.7.2.min.js"></script>
    <body oncontextmenu="self.event.returnValue=false" onselectstart="return false">
<!-- 头部  -->
<section class="header">
    <header class="aui-bar aui-bar-nav" id="aui-header">
        <a class="aui-pull-left aui-btn" onclick="back();">
            <span class="aui-iconfont aui-icon-left"></span>
        </a>
        <div class="aui-title">@yield('vodname')</div>
        <a href="/" class="aui-pull-right aui-btn" aui-popup-for="top-right" tapmode="">
            <svg class="icono" aria-hidden="true">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-imac1"></use>
            </svg>
        </a>
        <a onclick="openSearch()" class="aui-pull-right aui-btn">
            <svg class="icono" aria-hidden="true">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-search"></use>
            </svg>
        </a>
    </header>
</section>
@section('content')
 @show

<!-- 尾部  -->
<!-- 特别尾部  -->
<br><br>
<footer class="aui-bar aui-bar-tab" id="footer">
    <div class="aui-bar-tab-item" tapmode="">
        <a href="/" rel="nofollow">
            <svg class="icon" aria-hidden="true">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-imac1"></use>
            </svg>
        </a>
        <div class="aui-bar-tab-label">首页</div>
    </div>
    <div class="aui-bar-tab-item" tapmode="">
        <a href="/movielist/all/1.html" rel="nofollow">
            <svg class="icon" aria-hidden="true">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-radio"></use>
            </svg>
        </a>
        <div class="aui-bar-tab-label">电影</div>
    </div>
    <div class="aui-bar-tab-item" tapmode="">
        <a href="/tvlist/all/1.html" rel="nofollow">
            <svg class="icon" aria-hidden="true">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-bird1"></use>
            </svg>
        </a>
        <div class="aui-bar-tab-label">电视</div>
    </div>
    <div class="aui-bar-tab-item" tapmode="">
        <a href="/zylist/all/1.html" rel="nofollow">
            <svg class="icon" aria-hidden="true">
                <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-avatar"></use>
            </svg>
        </a>
        <div class="aui-bar-tab-label">综艺</div>
    </div>
</footer>


<div id="search" class="search">
    <div class="form">
        <input type="search" class="input" placeholder="想要搜点什么呢？" name="wd" autocomplete="off">
        <button type="submit" class="aui-iconfont aui-icon-search"></button>
    </div>
    <div onclick="closeSearch()" class="search-cancel">取消</div>
</div>

<div id="_js_goTop" class="gotop">
    <i class="aui-iconfont aui-icon-top"></i>
</div>

<script type="text/javascript">
    /*导航条*/
    var topNav = new Swiper('#header-nav',{freeMode : true,slidesPerView : 'auto', });
    /*图片懒加载初始化*/
    Echo.init({
        offset: 0,
        throttle: 0
    });
    /*影片列表TAB初始化*/
    var tabsSwiper = new Swiper('#tabs-container',{
        speed:500,
        onSlideChangeStart: function(swiper){
            $(".numBox .hd .active").removeClass('active');
            $(".numBox .hd li").eq(swiper.activeIndex).addClass('active');
        }
    })
    $(".numBox .hd li").on('touchstart mousedown',function(e){
        e.preventDefault()
        $(".numBox .hd .active").removeClass('active')
        $(this).addClass('active')
        tabsSwiper.slideTo( $(this).index() )
    })
    $(".numBox .hd li").click(function(e){
        e.preventDefault()
    });
    function closeTips(){
        $("#tips-1").remove();
    }
</script>


</body></html>