@extends('template.08.layout')
@section('title','高清电影')
@section('css','movie')
@section('content')
    <section class="container">
        <div class="feilei">
            {!! config('adconfig.list_top') !!}
        </div>
        <div class="fenlei">
            <div class="b-listfilter" style="padding: 0px;">
                <style>
                    #noall {
                        background-color: #ff6651;
                        color: #fff;
                    }
                </style>
                <dl class="b-listfilter-item js-listfilter" style="padding-left: 0px;height:auto;padding-right:0px;">
                    <dd class="item g-clear js-listfilter-content" style="margin: 0;">
                        <a href='/movielist/all/1.html' target='_self'>全部</a>
                        @foreach($dytype as $key=>$v)
                            <a href='/movielist/{{$v}}/1.html' target='_self'>{{$key}}</a>
                        @endforeach
                    </dd>
                </dl>
            </div>
        </div>
        <div class="m-g">
            <div class="b-listtab-main">
                <div>
                    <div>
                        <div class="s-tab-main">
                            <ul class="list g-clear">
                            @foreach($dys as $dy)
                                <li class='item'>
                                    <a class='js-tongjic' href='/play/{{$dy['url']}}.html' title='{{$dy['title']}}' onclick="jilu(this)" target='_blank'>
                                        <div class='cover g-playicon'>
                                            <img src='{{$dy['img']}}' alt='{{$dy['title']}}'/>
                                        </div>
                                        <div class='detail'>
                                            <p class='title g-clear'>
                                                <span class='s1'>{{$dy['title']}}</span>
                                                <span class='s2'>{{$dy['pf']}}</span></p>
                                            <p class='star'>{{$dy['star']}}</p>
                                        </div>
                                    </a>
                                </li>
                          @endforeach
                            </ul>
                        </div>


                    </div>
                </div>
                <div class="paging">{!! $pagehtml !!}<a>共24页</a>
</div>
</div></div>
<div class="asst asst-list-footer"></div>
    </section>
@endsection