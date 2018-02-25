@extends('template.kano.layout')
@section('title','动漫')
@section('other')
    <link rel="stylesheet" href="/public/static/kano/css/style2.css"/>
@endsection
@section('content')
    <!--导航2-->
    <nav class="mod_nav_sort">
        <div class="nav_row" id="filter_type">
            <span class="nav_label">动漫</span>
            <div class="nav_row_content" >
                <div class="nav_row_content_inner">
                    @foreach($dmtype as $key=>$v)
                        <a href="/dmlist/{{$v}}/1.html" class="{{$v==$cat?'link_nav':''}}">{{$key}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    <!-- 竖图列表 开始 -->
    <section class="mod_box mod_lists" id="mod_list_v">
        <div class="mod_figures mod_figures_v">
            <ul class="mod_figure" id="show_figures_v">
                @foreach($dms as $dm)
                    <li class="item">
                        <a href="/play/{{$dm['url']}}.html" class="figure" _hot="list.tv.video">
<span class="figure_pic">
<img src="{{$dm['img']}}" alt="{{$dm['title']}}">
    <!-- 显示左上和右上的坐标-->
    <!-- 显示左下和右下的坐标-->
<span class="figure_mask"><em class="mask_txt">{{$dm['js']}}</em> <span class="mask_scroe"></span></span>
</span>
                            <span class="figure_title figure_title_multirow">{{$dm['title']}}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>
        <!-- 分页 开始 -->
        <div class="show_more">
            {!! $pagehtml !!}
        </div>
        <!-- 分页 结束 -->
    </section>
    <!-- 竖图列表 结束 -->
@endsection()