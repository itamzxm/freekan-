@extends('template.joeleo.layout')
@section('title','抢先看')
@section('content')

    <!-- 幻灯片  -->

    <div class="mod_wrap"></div>

    <!-- 分类  -->
    <section class="first_list" style="margin-top: 0.9rem;">
        <div class="wrap">
            <ul class="con">
                <li class="on"> <a href="/cxlist.html">全部</a></li>
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
                        @if(isset($dydata)&&!empty($dydata))
                            @foreach($dydata as $key=>$dy)
                                <li class="item">
                                    <a href="/play/{{$key}}.html" title="{{$dy['dyname']}}" class="item-link">
                                        <div class="item-pic" style="height: 150px; background-image: url({{$dy['dylogo']}});" data-echo="{{$dy['dylogo']}}">
                                            <img onerror="this.src='/public/static/joeleo/images/nopic.gif'" src="/public/static/joeleo/images/nopic.gif" style="height:150px;">
                                        </div>
                                        <span class="covericon">抢先看</span>
                                        <span class="sBottom"><span>超清</span></span>
                                    </a>
                                    <a href="/play/{{$key}}.html" title="{{$dy['dyname']}}" class="item-info">
                                        <span class="sTit">{{$dy['dyname']}}</span>
                                        <span class="sDes"></span>

                                    </a>
                                </li>
                            @endforeach
                        @else
                        @endif
                    </ul>
                </div>

            </div>
            <div class="pag-warpp clearfix">
                <div class="page">
                    <span class="pagenow">共1页</span>
                </div>
            </div>
        </section>


    </section>
@endsection