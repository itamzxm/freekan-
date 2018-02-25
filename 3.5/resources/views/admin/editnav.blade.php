@extends('public.admin')
@section('nav','active opened active')
@section('navlist','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">编辑导航</h3>
                    <div class="panel-options">

                    </div>
                </div>
                <div class="panel-body">

                    <form role="form" class="form-horizontal" id="myform" enctype="multipart/form-data">

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-1">导航名称</label>

                            <div class="col-sm-10">
                                <input type="hidden" value="{{$id}}" name="navid">
                                <input type="text" class="form-control" id="field-1" value="{{$nav['navname']}}" name="navname" placeholder="请输入导航名称" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-2">导航地址</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-2" value="{{$nav['navaddr']}}" name="navaddr" placeholder="请输入导航地址" required>
                            </div>
                        </div>

                        <div class="form-group-separator"></div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-3">导航排序</label>

                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="field-3" name="navsort" value="{{$nav['navsort']}}" placeholder="数字越大越靠前" required>
                            </div>
                        </div>
                        <div class="form-group-separator"></div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label" for="field-5"></label>
                            <button type="button" class="btn btn-info btn-single" id="submit">更新</button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
    <script>
        $(function () {
            $('#submit').click(function () {
                var navname = $('#field-1').val();
                var navaddr = $('#field-2').val();
                var navsort = $('#field-3').val();
                if(navname==''||navaddr==''||navsort==''){
                    layer.msg('请填写完整信息')
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/editnav",
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
                                    autocache(webdir,'navlist');
                                }
                                else {
                                    window.location = '/'+webdir+'/navlist'
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