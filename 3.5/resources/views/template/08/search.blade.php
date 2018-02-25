@extends('template.08.layout')
@section('title','搜索结果')
@section('css','tv')
@section('content')
    <section class="container">
        <div style="text-align: center;padding: 10px 0;color: #FF7562;font-size: 12px;">温馨提示:请点击搜索结果的标题或封面图进行观看</div>
        <strong class="single-strong">尝鲜搜索结果</strong>
        <div class="m-g">
            <div class="b-listtab-main">
                <div class="s-tab-main">
                    <ul class="list g-clear">
                        @if($cxs)
                            @foreach($cxs as $key=>$s)
                                <li class='item'>
                                    <a class='js-tongjic' href='/play/{{$key}}.html' title='{{$s['dyname']}}'
                                       onclick="jilu(this)" target='_blank'>
                                        <div class='cover g-playicon'>
                                            <img src='{{$s['dylogo']}}' alt='{{$s['dyname']}}' style='display: block;'>
                                            <span class='hint'>电影</span></div>
                                        <div class='detail'>
                                            <p class='title g-clear'>
                                                <span class='s1'>{{$s['dyname']}}</span>
                                                <span class='s2'></span></p>
                                            <p class='star'></p>

                                        </div>
                                    </a>
                                </li>
                            @endforeach
                        @else
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        <strong class="single-strong">全网搜索结果</strong>
        <div class="m-g">
            <div class="b-listtab-main">
                <div class="s-tab-main">
                    <ul class="list g-clear">
                            @if($ss)
                                @foreach($ss as $s)
                                    <li class='item'>
                                        <a class='js-tongjic' href='/play/{{$s['url']}}.html' title='{{$s['title']}}'
                                           onclick="jilu(this)" target='_blank'>
                                            <div class='cover g-playicon'>
                                                <img src='{{$s['img']}}' alt='{{$s['title']}}' style='display: block;'>
                                                <span class='hint'>{{$s['type']}}</span></div>
                                            <div class='detail'>
                                                <p class='title g-clear'>
                                                    <span class='s1'>{{$s['title']}}</span>
                                                    <span class='s2'></span></p>
                                                <p class='star'></p>

                                            </div>
                                        </a>
                                    </li>
                                @endforeach
                            @else
                            @endif
                    </ul>
                </div>
            </div>
        </div>
        <div class="asst asst-list-footer">
            <!--广告-->
        </div>
    </section>
@endsection