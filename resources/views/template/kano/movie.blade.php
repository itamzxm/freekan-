@extends('template.kano.layout')
@section('title','院线大片')
@section('other')
    <link rel="stylesheet" href="/public/static/kano/css/style2.css"/>
@endsection
@section('content')
    <!--导航2-->
    <nav class="mod_nav_sort">
        <div class="nav_row" id="filter_type">
            <span class="nav_label">电影</span>
            <div class="nav_row_content" >
                <div class="nav_row_content_inner">
                    @foreach($dytype as $key=>$v)
                    <a href="/movielist/{{$v}}/1.html" class="">{{$key}}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </nav>

    <!-- 竖图列表 开始 -->
    <section class="mod_box mod_lists" id="mod_list_v">
        <div class="mod_figures mod_figures_v">
            <ul class="mod_figure" id="show_figures_v">
                @foreach($dys as $dy)
                <li class="item">
                    <a href="/play/{{$dy['url']}}.html" class="figure" _hot="list.tv.video">
<span class="figure_pic">
<img src="{{$dy['img']}}" alt="{{$dy['title']}}">
    <!-- 显示左上和右上的坐标-->
    <!-- 显示左下和右下的坐标-->
<span class="figure_mask"><em class="mask_txt">{{$dy['pf']}}</em> <span class="mask_scroe">超清</span></span>
</span>
                        <span class="figure_title figure_title_multirow">{{$dy['title']}}</span>
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