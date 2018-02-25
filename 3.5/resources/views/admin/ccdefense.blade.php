@extends('public.admin')
@section('security','active opened active')
@section('ccdefense','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">CC防御设置</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">每秒最大刷新次数</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="{{config('ccset.cc_max_times')}}" name="cc_max_times" placeholder="请输入每秒最大刷新次数" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">延迟访问时间</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="{{config('ccset.cc_url_time')}}" name="cc_url_time" placeholder="请输入延迟访问时间" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">管理员IP</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" value="{{$cc_admin_ip}}" name="cc_admin_ip" placeholder="请输入管理员ip,如果有多个ip请用#号隔开" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">是否开启防御</label>
                            <div class="col-sm-9">
                                <div class="form-block">
                                    <input type="checkbox" id="filed-4" name="is_cc" {{config('ccset.is_cc')?'checked':''}} class="iswitch iswitch-primary">
                                </div>
                            </div>
                        </div>
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
                for(var i=1;i<3;i++){
                    var v = $('#field-'+i).val();
                    if(v==''){
                        layer.msg('请填写完整信息');
                        return false;
                    }
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/ccdefense",
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
                            window.location = window.location.href
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