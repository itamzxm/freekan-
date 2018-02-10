<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta http-equiv="content-type" content="text/html;charset=gbk" />
    <title>{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')</title>
    <meta name="description" content="{{config('webset.webname')}}-{{config('webset.websubname')}}-@yield('title')-{{config('webset.wedesc')?config('webset.wedesc'):'全网vip免费看'}}" />
    <meta name="keywords" content="{{config('webset.webkeywords')?config('webset.webkeywords'):'全网vip免费看'}}" />
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=yes" />
    <meta http-equiv="cache-control" content="no-cache, must-revalidate, max-age=0">
    <script type="text/javascript">var InstallDir="/";</script>
    <script type="text/javascript" src="/public/static/kano/js/jquery1.7.2.min.js"></script>
    <script type="text/javascript" src="/public/static/kano/js/swiper.min.js"></script>
    <script type="text/javascript" src="/public/static/kano/js/wap.js"></script>
    <style>
        body{
            -webkit-transform:translateZ(0);
        }
    </style>
    <link rel="stylesheet" href="/public/static/kano/css/in2.css"/>
    <link href="/public/static/kano/css/swiper.css" type="text/css" rel="stylesheet">
    @section('other')
    @show
</head>

<body class="page_list">

<header class="site_header">
    <h1 class="site_title"><a href="/" class="logo "></a>
        <a><strong class="channel_title"></strong></a></h1>
    <div class="search js_nav_search" style="width: auto;"><div class="input_con"><form method="get" action="/search.asp" name="search" id="search" onSubmit="return so()"><input class="sput" data-defval="" name="k" id="k" placeholder="片名或主演" type="search"><input type="submit" value="so" class="sook "></form></div></div>
</header>
<!--导航-->
<nav class="site_nav">
    <div class="site_nav_inner" id="site_nav_inner_id">
        <div class="nav_row">
            @if($navlist)
                @foreach($navlist as $v)
                    <a href="{{$v['navaddr']}}" class="">{{$v['navname']}}</a>
                @endforeach
            @else
            @endif
            {!! config('appconfig.isdh')?'<a href="/app.html" target="_blank">'.config('appconfig.appdh').'</a>':'' !!}
            <span class="justify_fix"></span>
        </div>

    </div>
</nav>
@section('content')
@show
<footer class="mod_footer" >
    <div class="mod_footer_inner">
        <div class="copyright">Copyright &copy; 2008 - 2016 Movcms2.1X. All Rights Reserved</div>
    </div>
</footer>
<script>

    //swiper banner start
    var mySwiper = new Swiper('.swiper-container',{
        pagination: '.pagination',
        loop:true,//循环模式  是/否
        grabCursor: true,//光标属性   当为true时，光标移动到banner上变成手掌的样式
        paginationClickable: false,//生成分页控件
        calculateHeight:true,//响应式容器高度
        autoplay:3000//过度时间
    })


    $('.arrow-left').on('click', function(e){
        e.preventDefault()
        mySwiper.swipePrev()
    })
    $('.arrow-right').on('click', function(e){
        e.preventDefault()
        mySwiper.swipeNext()
    })

</script>
</body>
</html>