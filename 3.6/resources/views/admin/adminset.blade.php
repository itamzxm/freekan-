@extends('public.admin')
@section('set','active opened active')
@section('webset','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">基本设置</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">网站名称</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="{{$webset['webname']}}"
                                       name="webname" placeholder="请输入网站名称" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-11">网站副标题</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-11" value="{{$webset['websubname']}}"
                                       name="websubname" placeholder="请输入网站副标题名称" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-9">网站域名</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-9" name="webdomin"
                                       value="{{$webset['webdomin']}}" placeholder="请输入网站关键字,用逗号隔开" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">网站关键字</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" name="webkeywords"
                                       value="{{$webset['webkeywords']}}" placeholder="请输入网站关键字,用逗号隔开" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">网站描述信息</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" name="webdesc"
                                       value="{{$webset['webdesc']}}" placeholder="请输入网站描述信息" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7">后台路径</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-7" name="webdir"
                                       value="{{empty($webset['webdir'])?'admin':$webset['webdir']}}"
                                       placeholder="请输入后台路径" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">网站备案号</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="webicp" id="field-4"
                                       value="{{$webset['webicp']}}" placeholder="请输入网站备案信息" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-12">站长邮箱</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="webmail" id="field-12"
                                       value="{{$webset['webmail']}}" placeholder="请输入站长邮箱" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-13">底部版权</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="copyright" id="field-13"
                                       value="{{$webset['copyright']}}" placeholder="请输入底部版权" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5">网站logo</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="weblogo" id="field-5">
                                <img src="/public/static/{{$webset['weblogo']}}" height="50px" width="100px">
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-14">网站模板</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="field-14"  name="webtemplate" style="display: inline-block;">
                                @if($templates)
                                  @foreach($templates as $v)
                                <option value="{{$v}}"{!! config('webset.webtemplate')==$v?'selected':'' !!}>{{$v}}</option>
                                  @endforeach()
                                 @else
                                    <option value="">暂无模板</option>
                                  @endif
                            </select>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-6">首页视频随机开关</label>
                            <div class="col-sm-9">
                                <div class="form-block">
                                    <input type="checkbox" id="filed-6" name="randmovie" {{config('webset.randmovie')?'checked':''}} class="iswitch iswitch-primary">
                                </div>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-8">畅言代码</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="cy" cols="5" id="field-8"
                                          placeholder="输入畅言代码">{{isset($webset['cy'])?$webset['cy']:''}}</textarea>
                            </div>

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-6">统计代码</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="webtongji" cols="5" id="field-6"
                                          placeholder="输入网站统计代码">{{$webset['webtongji']}}</textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">修改</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                var webname = $('#field-1').val();
                var webkeywords = $('#field-2').val();
                var webdesc = $('#field-3').val();
                var webdir = $('#field-7').val();
                if (webname == '' || webkeywords == '' || webdesc == '' || webdir == '') {
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type: "post",
                    url: "/action/webset",
                    dataType: "json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp) {
                        if (resp.status == 200) {
                            layer.msg(resp.msg);
                            var webdir = resp.path;
                            setTimeout(function () {
                                if('{{config('cacheconfig.autocache')}}'=='on'){
                                    autocache(webdir,'webset');
                                }
                                else {
                                    window.location = '/'+webdir+'/webset'
                                }
                            },1000);

                        }
                        else {
                            layer.msg(resp.msg)
                        }
                    }
                })
            })
        })
    </script>
@endsection