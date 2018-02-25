@extends('public.admin')
@section('cache','active opened active')
@section('cacheindex','active')
@section('content')
    <div class="vertical-top">

        <button class="btn btn-secondary btn-icon btn-icon-standalone" action="index" onclick="flushcache(this)">
            <i class="fa-print"></i>
            <span>刷新首页缓存</span>
        </button>
    </div>
    <script>
        function flushcache(obj) {
            var action = $(obj).attr('action');
            layer.msg('刷新中', {
                icon: 16
                ,shade: 0.01,time: 10*1000
            });
            $.ajax({
                type:"get",
                url:"/action/flushcache/"+action,
                dataType:"json",
                success: function (resp){
                    if(resp.status==200){
                        layer.msg(resp.msg);
                    }
                    else {
                        layer.msg(resp.msg)
                    }
                }
            })
        }
    </script>
@endsection
