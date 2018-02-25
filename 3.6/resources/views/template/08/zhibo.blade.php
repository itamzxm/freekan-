@extends('template.08.layout')
@section('title','热门直播')
@section('css','seacher')
@section('content')
    <section class="container">
        <div class="feilei">
            {!! config('adconfig.list_top') !!}
        </div>
        <div class="am-container main" style="padding:0">
            <strong class="single-strong">{{config('dhconfig.zb')}}</strong>

            <ul class="mvul">
                @if($zblist)
                    @foreach($zblist as $key=>$v)
                        <a href="/zb/{{$key}}.html">
                            <li>{{$v['zbname']}}</li>
                        </a>
                    @endforeach
                @else
                    <a href="#">
                        <li>暂无直播源</li>
                    </a>
                @endif
            </ul>
        </div>
        <div style="clear: both;">
        </div>
    </section>
@endsection