@extends('public.admin')
@section('zb','active opened active')
@section('addzb','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">增加直播</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">直播名称</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-1" value="" name="zbname" placeholder="请输入直播名称" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7">直播地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-7" name="zbaddr" value="" placeholder="请填写可直接播放的视频地址,否则无法进行播放" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">增加</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            layer.alert('请填写可使用的直播源', {icon: 6});
            $('#submit').click(function () {
                var zbname = $('#field-1').val();
                var zbaddr = $('#field-7').val();
                if(zbname==''||zbaddr==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/addzb",
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
                            window.location = '/{{config('webset.webdir')}}/zblist'
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