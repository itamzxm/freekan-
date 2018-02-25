<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>加载广告</title>

    <style>
        * {
            padding: 0;
            margin: 0
        }
    </style>
</head>

<body>
{!! config('adconfig.play_in')?config('adconfig.play_in'):'<a href="http://www.freekan.top"><img src="/public/images/jiazai.png" alt="首页广告" height="100%" width="100%"></a>' !!}
</body>
</html>