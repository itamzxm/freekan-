@extends('template.kano.layout')
@section('title','热播剧集')
@section('other')
    <link rel="stylesheet" href="/public/static/kano/css/style2.css"/>
@endsection
@section('content')
<!-- 竖图列表 开始 -->
<section class="mod_box mod_lists" id="mod_list_v">
    <div style="height: 40px;width: 100%;background-color: #2D2E2F;text-align: center;line-height: 40px;margin-bottom: 10px"><span style="height: 35px;color:white;width: 100%;font-size: 20px;">"{{$searchkey}}"尝鲜搜索结果</span></div>
    <div class="mod_figures mod_figures_v">
        <ul class="mod_figure" id="show_figures_v">
            @if($cxs)
                @foreach($cxs as $key=>$s)
                    <li class="item">
                        <a href="/play/{{$key}}.html" class="figure" _hot="list.tv.video">
<span class="figure_pic">
<img src="{{$s['dylogo']}}" alt="{{$s['dyname']}}">
<span class="figure_mask"><em class="mask_txt"></em> <span class="mask_scroe">{{$s['dyname']}}</span></span>
</span>
                            <span class="figure_title figure_title_multirow">{{$s['dyname']}}</span>
                        </a>
                    </li>
                @endforeach
            @else
                <span style="height: 35px;color:palevioletred;width: 100%;font-size: 20px;">暂无结果</span>
            @endif

        </ul>
    </div>
    <div style="height: 40px;width: 100%;background-color: #2D2E2F;text-align: center;line-height: 40px;margin-bottom: 10px"><span style="height: 35px;color:white;width: 100%;font-size: 20px;">"{{$searchkey}}"全网搜索结果</span></div>
    <div class="mod_figures mod_figures_v">
        <ul class="mod_figure" id="show_figures_v">
            @if($ss)
                @foreach($ss as $s)
            <li class="item">
                <a href="/play/{{$s['url']}}.html" class="figure" _hot="list.tv.video">
<span class="figure_pic">
<img src="{{$s['img']}}" alt="{{$s['title']}}">
<span class="figure_mask"><em class="mask_txt"></em> <span class="mask_scroe">{{$s['title']}}</span></span>
</span>
                    <span class="figure_title figure_title_multirow">{{$s['title']}}</span>
                </a>
            </li>
                @endforeach
          @else
           @endif

        </ul>
    </div>
    <!-- 分页 开始 -->
    <div class="show_more"><span class="PageBox">首页</span> <span class="PageBox">上一页</span> <span></span><span class="PageBox">下一页</span> <span class="PageBox">尾页</span>&nbsp;18条/页</div>
    <!-- 分页 结束 -->
</section>
<!-- 竖图列表 结束 -->
@endsection
