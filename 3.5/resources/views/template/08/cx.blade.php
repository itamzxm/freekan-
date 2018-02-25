@extends('template.08.layout')
@section('title','尝鲜列表')
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
                        <a href='/cxlist.html' target='_self'>全部</a>
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
                                @if(isset($dydata)&&!empty($dydata))
                                    @foreach($dydata as $key=>$dy)
                                    <li class='item'>
                                        <a class='js-tongjic' href='/play/{{$key}}.html' title='{{$dy['dyname']}}' onclick="jilu(this)" target='_blank'>
                                            <div class='cover g-playicon'>
                                                <img src='{{$dy['dylogo']}}' alt='{{$dy['dyname']}}'/>
                                            </div>
                                            <div class='detail'>
                                                <p class='title g-clear'>
                                                    <span class='s1'>{{$dy['dyname']}}</span>
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
                <div class="paging"><a>共1页</a>
                </div>
            </div></div>
        <div class="asst asst-list-footer"></div>
    </section>
@endsection