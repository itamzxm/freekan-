@extends('template.kano.layout')
@section('other')
    <link href="/public/static/kano/css/style2_1.css" type="text/css" rel="stylesheet">
@endsection
@section('content')
    <section class="mod_box">
        <h2 class="mod_title">正在为您播放-{{$cxs['dyname']}}<span id="js"></span></h2>
        <div class="play_mimi">
            <div class="loadad">
                <iframe src="/jzad" id="playbox" frameborder="0" scrolling="no" style="width:100%; height:100%;"></iframe>
            </div>
        </div>

        <div class="mod_box mod_lists">
            <h2 class="mod_title">播放列表</h2>
            <div class="mod_episodes_numbers">
                <ul>
                    @foreach($cxs['dyaddr'] as $v)
                        <li>
                            <a href="javascript:void(0)" target="_self" class="clickplay" id="" style="" data-href='{{isset($v['url'])?$v['url']:'#'}}' onclick="bofang(this)">{{isset($v['name'])?$v['name']:'暂无可用播放源'}}</a>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="mod_box mod_lists">
                <h2 class="mod_title">剧情简介</h2>
                <div>
                <span style="font-size: 14px;margin-left: 5px">
                 {{$cxs['dydesc']}}
                </span>
                </div>
            </div>
            <div class="mod_box mod_lists">
                {!! config('webset.cy') !!}
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
            if (href != '' || href != null) {
                $('#playbox').attr('src', '/jzad');
                setTimeout(function () {
                    $('#playbox').attr('src', href);
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
            $('.clickplay:eq(0)').attr('id','bs');
            var autourl =  $('.clickplay:eq(0)').attr('data-href');
            setTimeout(function () {
                $('#playbox').attr('src',autourl);
            },3000)
        })
    </script>
@endsection