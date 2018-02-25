@extends('public.admin')
@section('zb','active opened active')
@section('zblist','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">编辑直播</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">直播名称</label>

                            <div class="col-sm-10">
                                <input type="hidden" value="{{$id}}" id="zbid" name="zbid">
                                <input type="text" class="form-control" id="field-1" value="{{$zb['zbname']}}" name="zbname" placeholder="请输入直播名称" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-7">直播地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-7" name="zbaddr" value="{{$zb['zbaddr']}}" placeholder="请输入直播地址" required>
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
                var zbname = $('#field-1').val();
                var zbaddr = $('#field-7').val();
                if(zbname==''||zbaddr==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/editzb",
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