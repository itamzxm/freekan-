@extends('template.08.layout')
@section('title','唯美动漫')
@section('css','tv')
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
                        <a href='/dmlist/all/1.html' target='_self'>全部</a>
                        @foreach($dmtype as $key=>$v)
                        <a href='/dmlist/{{$v}}/1.html' target='_self'>{{$key}}</a>
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
                                @foreach($dms as $dm)
                                    <li class='item'>
                                        <a class='js-tongjic' href='/play/{{$dm['url']}}.html' title='{{$dm['title']}}' onclick="jilu(this)" target='_blank'>
                                            <div class='cover g-playicon'>
                                                <img src='{{$dm['img']}}' alt='{{$dm['title']}}'/>
                                                <span class='hint'>{{$dm['js']}}</span>
                                            </div>
                                            <div class='detail'>
                                                <p class='title g-clear'>
                                                    <span class='s1'>{{$dm['title']}}</span>
                                                    <span class='s2'></span></p>
                                                <p class='star'></p>
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