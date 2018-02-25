@extends('public.admin')
@section('new','active opened active')
@section('newlist','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">编辑视频</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">视频名称</label>

                            <div class="col-sm-10">
                                <input type="hidden" value="{{$id}}" id="dyid" name="dyid">
                                <input type="text" class="form-control" id="field-1" value="{{$dy['dyname']}}" name="dyname" placeholder="请输入视频名称" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">视频描述</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" name="dydesc" value="{{$dy['dydesc']}}" placeholder="请输入视频描述" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                        <label class="col-sm-2 control-label" for="field-3">视频图片地址</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="dylogo" id="field-3"  value="{{$dy['dylogo']}}" placeholder="请输入视频图片地址">
                        </div>
                     </div>
                     <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-4">视频播放地址</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="dyaddr" cols="5" rows="5" id="field-4" placeholder="请输入视频播放地址">{{$dy['dyaddr']}}</textarea>
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
                var dyname = $('#field-1').val();
                var dydesc = $('#field-3').val();
                var dyaddr = $('#field-7').val();
                var dylogo = $('#field-6').val();
                if(dyname==''||dydesc==''||dyaddr==''||dylogo==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/editmovie",
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
                                    autocache(webdir,'newmovielist');
                                }
                                else {
                                    window.location = '/'+webdir+'/newmovielist'
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