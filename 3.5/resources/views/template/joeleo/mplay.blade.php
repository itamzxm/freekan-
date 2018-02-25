@extends('template.joeleo.layout2')
@section('vodname',$pm)
@section('content')
    <section class="aui-content">

        <!-- 信息条  -->
        <div class="aui-tips" id="tips-1">
            <i class="aui-iconfont aui-icon-info"></i>
            <div class="aui-tips-title">正在播放：{{$pm}}&nbsp;&nbsp;<span id="js"></span></div>
            <i class="aui-iconfont aui-icon-close" tapmode onclick="closeTips()"></i>
        </div>
        <!-- 播放器  -->
        <section class="video-box">
            <iframe width="100%" height="30%" src="/jzad" frameborder="0" border="0" marginwidth="0" marginheight="0" scrolling="no"></iframe>
        </section>




        <!--会隐藏的简介  -->
        <section class="detail-intro" style="margin-bottom: 2.5rem;">
            <p class="detail-intro-txt aui-ellipsis-2">
                简介：{{$desc}}&hellip;&hellip;		</p>
            <div id="_js_detail_area" class="more"><i class="aui-iconfont aui-icon-down"></i></div>
        </section>



        <!-- 信息条  -->
        <p style="line-height:1.5;width: 100%;background: #F9F4D9;color: #8F7F5D;padding:10px ;font-size:12px;border-radius: 4px;">如果播放失败请尝试更换播放线路或者播放源,如果依旧失败请联系管理员! ^_^</p>

        <!-- 播放来源  -->
        <section class="col-head" style="margin-top: 0;">
            <div class="title">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-zhibo"></use>
                </svg>影片片源</div>
            <p style="margin-left: 1rem;float: left;font-size: 12px;color: #FF6666;">下方左右滑动即可切换资源</p>
        </section>

        <section class="col-main">
            <div class="numBox">

                <div class="hd">
                    <ul> @foreach($dyplay as $v)
                        <li  class="active" ><a href="javascript:;">{{isset($v['play'])?$v['playname']:'暂无可用播放源'}}</a></li>
                        @endforeach
                    </ul>
                </div>

                <div class="bd">
                    <div id="tabs-container" class="swiper-container">
                        <div class="swiper-wrapper">
                            @foreach($dyplay as $v)
                            <div class="swiper-slide">
                                <div class="numList">
                                    <ul>
                                        <li class="active playlist"><a data-episode="1" data-href="{{isset($v['play'])?$v['play']:'#'}}" rel="nofollow">超清HD<i class="iNewIcon"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 信息条	-->


        <!-- 评论  -->
        <section class="col-head">
            <div class="title">
                <svg class="icon" aria-hidden="true">
                    <use xlink:href="#icon-guixu"></use>
                </svg>网友评论</div>
        </section>
        <section class="col-main">
            {!! config('webset.cy') !!}
        </section>
    </section>
    <script>
     $(function () {
         $url
     })
    </script>
@endsection

<!-- 尾部  -->
<!-- 特别尾部  -->