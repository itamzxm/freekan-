@extends('template.kano.layout')
@section('other')
    <link href="/public/static/kano/css/style2_1.css" type="text/css" rel="stylesheet">
@endsection
@section('content')
    <section class="mod_box">
        <h2 class="mod_title">正在播放-{{$pm}}<span id="js"></span></h2>
        <div class="play_mimi">
            <div class="loadad">
                <iframe src="/jzad" id="playbox" frameborder="0" scrolling="no" style="width:100%; height:100%;"></iframe>
            </div>
        </div>

        <div class="mod_box mod_lists">
            <h2 class="mod_title">接口列表</h2>
            <div class="mod_episodes_numbers" id="xlus">
                <ul>
                    @foreach($jk as $key=>$v)
                        <li><a onclick="xldata(this)" data-jk="{{$v}}">{{$key}}</a></li>
                        @break($loop->index==9)
                    @endforeach
                </ul>
            </div>
        </div>

        <div class="mod_box mod_lists">
            <h2 class="mod_title">播放列表</h2>
            <div class="mod_episodes_numbers">
                <ul>
                    @foreach($zylist as $v)
                        <li>
                            <a href="javascript:void(0)" target="_self"  class="clickplay" style="" data-href='{{isset($v['href'])?$v['href']:'#'}}' onclick="bofang(this)">{{isset($v['href'])?$v['time']:'暂无可用播放源'}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
    <script>
        function bofang(obj) {
            var href = $(obj).attr('data-href');
            var text = $(obj).text();
            $('#js').text('-' + text);
            $.each($('.clickplay'), function () {
                $(this).attr('id','');
            });
            $(obj).attr('id','bs');
            var jiekou = $('.clickjk').attr('data-jk');
            if (href != '' || href != null) {
                $('#playbox').attr('src', '/jzad');
                setTimeout(function () {
                    $('#playbox').attr('src', jiekou + href);
                },3000)
            }
        }
    </script>
    <script>
        function xldata(obj) {
            var href = $('#bs').attr('data-href');
            $.each($('.clickjk'), function () {
                $(this).removeClass('clickjk');
            });
            $(obj).addClass('clickjk');
            var jiekou = $('.clickjk').attr('data-jk');
            if (href != '' || href != null) {
                $('#playbox').attr('src', '/jzad');
                setTimeout(function () {
                    $('#playbox').attr('src', jiekou + href);
                },3000)
            }
        }
    </script>
    <script>
        $(function () {
            var text = $('.clickplay:eq(0)').text();
            $('#js').text('-' + text);
            var title = $('.mod_title:eq(0)').text();
            $('title').text(title);
            $('#xlus ul li:eq(0) a').addClass('clickjk');
            $('.clickplay:eq(0)').attr('id','bs');
            var autourl =  $('.clickplay:eq(0)').attr('data-href');
            var jiekou = $('#xlus ul li:eq(0) a').attr('data-jk');
            setTimeout(function () {
                $('#playbox').attr('src', jiekou + autourl);
            },3000)
        })
    </script>
@endsection