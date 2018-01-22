@extends('public.admin')
@section('adminindex','active')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="xe-widget xe-counter" data-count=".num" data-from="20000" data-to="{{$total}}" data-suffix="部" data-duration="4" data-easing="true">
                <div class="xe-icon">
                    <i class="linecons-cloud"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"></strong>
                    <span>影片总数</span>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="2" data-to="{{$used_mem}}" data-suffix="MB" data-duration="4" data-easing="true">
                <div class="xe-icon">
                    <i class="linecons-star"></i>
                </div>
                <div class="xe-label">
                    <strong class="num"></strong>
                    <span>当前内存占用</span>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">

            <h5>服务器信息</h5>

            <ul class="list-group list-group-minimal">
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-primary">{{$info['os']}}</span>
                    服务器系统
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-info">{{$info['core']}}</span>
                    服务器内核
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-danger">{{$info['jsyq']}}</span>
                   服务器解释引擎
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-success">{{$info['port']}}</span>
                    服务器端口
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-warning">{{$info['dir']}}</span>
                    程序绝对路径
                </li>
                <li class="list-group-item">
                    <span class="badge badge-roundless badge-info">{{config('systeminfo.version')}}</span>
                    当前版本
                </li>
            </ul>

        </div>
    </div>
@endsection
