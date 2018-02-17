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
        @foreach($js as $key=>$v)
        <div class="mod_box mod_lists">
            <h2 class="mod_title">{{$v['name']}}</h2>
            <div class="mod_episodes_numbers">
                    {!! isset($v['data'])?$v['data']:'暂无可用播放源' !!}
            </div>
        </div>
        @endforeach
    </section>
    <script>
        $(function () {
            $('.title.g-clear').remove();
            $('.all.js-show-init').remove();
            $.each($('.num-tab.js-tabs'),function () {
                if($(this).children('.num-tab-main').length>1){
                    $(this).children('.num-tab-main:eq(0)').remove();
                }
                $(this).children('.num-tab-main:eq(0)').children('a').addClass('clickplay1');

            });
            $('.ji-tab-content.js-tab-content').css('opacity',1)
            $.each($('.clickplay1'),function () {
                var url = $(this).attr('href');
                $(this).attr('data-href',url);
                $(this).attr('href','javascript:;');
                $(this).attr('onclick','bofang(this)');
            });
            var biaoti = $('.mod_title:eq(0)').text();
            $('title').text(biaoti);
            $('#xlus ul li:eq(0) a').addClass('clickjk');
            var autourl = $('.clickplay1:eq(0)').attr('data-href');
            $('.clickplay1:eq(0)').attr('id','bs');
            var text = $('.clickplay1:eq(0)').text();
            $('#js').text('-第'+text+'集');
            var jiekou =  $('#xlus ul li:eq(0) a').attr('data-jk');
            if(autourl!=''||autourl!=null){
                setTimeout(function () {
                    $('#playbox').attr('src', jiekou + autourl);
                },3000)
            }
        })
    </script>
    <script>
        function bofang(obj) {
            var href = $(obj).attr('data-href');
            var text = $(obj).text();
            $('#js').text('-第'+text+'集');
            $.each($('.clickplay1'), function () {
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
@endsection