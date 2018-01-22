@extends('public.admin')
@section('ad','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">广告位设置</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">首页搜索栏上方广告位</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="index_ad"  cols="5" id="field-1" placeholder="请输入广告代码">{{config('adconfig.index_ad')}}</textarea>
                            </div>

                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">播放窗口上方广告位</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="play_top"  cols="2" id="field-2" placeholder="请输入广告代码">{{config('adconfig.play_top')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">播放窗口加载广告位</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="play_in"  cols="2" id="field-3" placeholder="请输入广告代码">{{config('adconfig.play_in')}}</textarea>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">列表页广告位</label>

                            <div class="col-sm-10">
                                <textarea class="form-control" name="list_top"  cols="2" id="field-4" placeholder="请输入广告代码">{{config('adconfig.list_top')}}</textarea>
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
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/setad",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp){
                        if(resp.status==200){
                            layer.msg(resp.msg);
                            var webdir =  "{{config('webset.webdir')}}";
                            setTimeout(function () {
                                if('{{config('cacheconfig.autocache')}}'=='on'){
                                    autocache(webdir,'setad');
                                }
                                else {
                                    window.location = '/'+webdir+'/setad'
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