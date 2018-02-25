<html>
<head>
    <meta charset='utf-8'/>
    <title>{{config('webset.webname')}}-{{config('appconfig.appname')}}</title>
    <script>
        var ua = window.navigator.userAgent.toLowerCase();
        if (/mobile/.test(ua)) {
            window.location.href = "{{config('appconfig.appaz')}}";
        }
    </script>

    <link rel='stylesheet' href='/public/static/wapian/css/down.css'/>
</head>
<body>
<script>(function () {
        var a = true;
        var h = undefined;
        var g = [];
        document.getwide = function () {
            return h
        };
        document.onwidechange = function (e, j) {
            g.push(e)
        };

        function f(k, e) {
            if (!d(k, e)) {
                var j = k.className, l = (j != "") ? " " : "";
                added = j + l + e;
                k.className = added
            }
        }

        function i(l, e) {
            if (d(l, e)) {
                var j = " " + l.className + " ", j = j.replace(/(\s+)/gi, " "), k = j.replace(" " + e + " ", " "),
                    k = k.replace(/(^\s+)|(\s+$)/g, "");
                l.className = k
            }
        }

        function d(l, e) {
            var j = l.className, k = j.split(/\s+/);
            x = 0;
            for (x in k) {
                if (k[x] == e) {
                    return true
                }
            }
            return false
        }

        function c(j) {
            if (h != j) {
                h = j;
                for (var e = 0; e < g.length; e++) {
                    g[e](j)
                }
            }
        }

        function b() {
            if (document.body.clientWidth > 1239) {
                f(document.body, "g-wide");
                i(document.body, "g-small");
                c("wide")
            } else {
                i(document.body, "g-wide");
                f(document.body, "g-small");
                c("small")
            }
        }

        window.onresize = function () {
            if (a) {
                a = false;
                setTimeout(function () {
                    a = true;
                    b()
                }, 120)
            }
        };
        b()
    })();</script>
<div id="doc">
    <div id="cover">
        <div class="topbar">
            <div id="logo">
                <a href="{{config('webset.webdomin')}}">
                    <img src="/public/static/wapian/images/logo.png" alt="{{config('webset.webname')}}-{{config('appconfig.appname')}}">
                </a>
            </div>
        </div>
        <div class="header g-clear">
            <div class="phone">
                <img src="{{config('appconfig.appimg')}}">
            </div>
            <div class="desc">
                <h1>
                    <img src="{{config('appconfig.appxc')}}" alt="{{config('webset.webname')}}-{{config('appconfig.appname')}}">
                </h1>
                <div class="download clearfix">
                    <div class="down-btns">
                        <a href="#" class="btn btn-iphone"></a>
                        <a href="{{config('appconfig.appaz')}}" class="btn btn-android"></a>
                    </div>
                    <div class="down-qr">
                        <img src="{{config('appconfig.appip')}}">
                        <p>二维码扫描下载</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type='text/javascript' src='/public/static/wapian/js/down.js'></script>
<script type='text/javascript'>define("other.jquery", function () {
        return window.$;
    });</script>
</body>
</html>
