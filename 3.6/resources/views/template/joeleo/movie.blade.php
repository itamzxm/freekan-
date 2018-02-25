@extends('template.joeleo.layout')
@section('title','电影')
@section('content')

<!-- 幻灯片  -->

<div class="mod_wrap"></div>

<!-- 分类  -->
<section class="first_list" style="margin-top: 0.9rem;">
    <div class="wrap">
        <ul class="con">
            <li class="on"> <a href="/movielist/all/1.html">全部</a></li>
            @foreach($dytype as $key=>$v)
            <li class="{{$v==$cat?'on':''}}"> <a href="/movielist/{{$v}}/1.html">{{$key}}</a></li>
             @endforeach
        </ul>
    </div>
</section>

<!-- 片库  -->
<section class="aui-content" style="margin-top: -0.3rem;">
    <section class="col-head">
    </section>
    <section class="col-main">
        <div class="row">
            <div class="col-3-List">
                <ul>
                    @foreach($dys as $dy)
                        <li class="item">
                            <a href="/play/{{$dy['url']}}.html" title="{{$dy['title']}}" class="item-link">
                                <div class="item-pic" style="height: 150px; background-image: url({{$dy['img']}});" data-echo="{{$dy['img']}}">
                                    <img onerror="this.src='/public/static/joeleo/images/nopic.gif'" src="/public/static/joeleo/images/nopic.gif" style="height:150px;">
                                </div>
                                <span class="covericon">片库</span>
                                <span class="sBottom"><span>{{$dy['pf']}}</span></span>
                            </a>
                            <a href="/play/{{$dy['url']}}.html" title="{{$dy['title']}}" class="item-info">
                                <span class="sTit">{{$dy['title']}}</span>
                                <span class="sDes">{{$dy['star']}}</span>

                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        <div class="pag-warpp clearfix">
            <div class="page">
                {!! $pagehtml !!}
            </div>
        </div>
    </section>


</section>
@endsection