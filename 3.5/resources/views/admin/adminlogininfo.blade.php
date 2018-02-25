@extends('public.admin')
@section('passwd','active')
@section('content')
    <div class="row">
        <div class="col-sm-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">修改密码</h3>
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">–</span>
                            <span class="expand-icon">+</span>
                        </a>
                    </div>
                </div>
                <div class="panel-body">

                    <form class="form-inline" id="myform">
                        <div class="form-group">
                            <input type="text" class="form-control" size="25" name="newusername" id="newusername" placeholder="请输入新的用户名">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" size="25" name="newpasswd" id="newpasswd" placeholder="请输入新的密码">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-secondary btn-single" id="shengcheng">修改</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $('#shengcheng').click(function () {
                var username = $('#newusername').val();
                var passwd = $('#newpasswd').val();
                if(username==''||passwd==''){
                    layer.msg('请填写完整信息');
                    return false;
                }
                var fm = new FormData($('#myform')[0]);
                $.ajax({
                    type:"post",
                    url:"/action/changeinfo",
                    dataType:"json",
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: fm,
                    processData: false,
                    contentType: false,
                    success: function (resp){
                        if(resp.status==200){
                            layer.msg('修改成功');
                            window.location = '/adminloginout'
                        }
                        else {
                            layer.msg('修改失败')
                        }
                    }
                })

                return false;
            })
        })
    </script>
@endsection