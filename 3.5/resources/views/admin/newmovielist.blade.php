@extends('public.admin')
@section('new','active opened active')
@section('newlist','active')
@section('css')
    <link rel="stylesheet" href="/public/static/admin/assets/js/datatables/dataTables.bootstrap.css">
@endsection()
@section('js')
    <script src="/public/static/admin/assets/js/datatables/js/jquery.dataTables.min.js"></script>
    <script src="/public/static/admin/assets/js/datatables/dataTables.bootstrap.js"></script>
    <script src="/public/static/admin/assets/js/datatables/yadcf/jquery.dataTables.yadcf.js"></script>
    <script src="/public/static/admin/assets/js/datatables/tabletools/dataTables.tableTools.min.js"></script>
@endsection()
@section('content')
    <!-- Basic Setup -->
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">尝鲜列表</h3>

            <div class="panel-options">
                <a href="#" data-toggle="panel">
                    <span class="collapse-icon">&ndash;</span>
                    <span class="expand-icon">+</span>
                </a>
                <a href="#" data-toggle="remove">
                    &times;
                </a>
            </div>
        </div>
        <div class="panel-body">

            <script type="text/javascript">
                jQuery(document).ready(function($)
                {
                    $("#example-2").dataTable({
                        dom: "t" + "<'row'<'col-xs-6'i><'col-xs-6'p>>",
                        aoColumns: [
                            {bSortable: false},
                            null,
                            null,
                            null
                        ],
                    });

                    // Replace checkboxes when they appear
                    var $state = $("#example-2 thead input[type='checkbox']");

                    $("#example-2").on('draw.dt', function()
                    {
                        cbr_replace();

                        $state.trigger('change');
                    });

                    // Script to select all checkboxes
                    $state.on('change', function(ev)
                    {
                        var $chcks = $("#example-2 tbody input[type='checkbox']");

                        if($state.is(':checked'))
                        {
                            $chcks.prop('checked', true).trigger('change');
                        }
                        else
                        {
                            $chcks.prop('checked', false).trigger('change');
                        }
                    });
                });
            </script>

            <table class="table table-bordered table-striped" id="example-2">
                <thead>
                <tr>
                    <th class="no-sorting">

                    </th>
                    <th>电影名称</th>
                    <th>电影海报</th>
                    <th>操作</th>
                </tr>
                </thead>

                <tbody class="middle-align">
                @foreach($dylist as $key=>$v)
                    <tr>
                        <td>
                        </td>
                        <td>{{$v['dyname']}}</td>
                        <td>{{$v['dylogo']}}</td>
                        <td>
                            <a href="/{{config('webset.webdir')}}/editmovie/{{$key}}" class="btn btn-secondary btn-sm btn-icon icon-left">
                                编辑
                            </a>

                            <a href="javascript:void(0)" onclick="shanchu(this)" goodid="{{$key}}" class="btn btn-danger btn-sm btn-icon icon-left">
                                删除
                            </a>
                        </td>
                    </tr>
                  @endforeach
                </tbody>
            </table>

        </div>
    </div>

    <script>
        function shanchu(obj) {
            layer.confirm('您确认要删除？', {
                btn: ['确认','取消'] //按钮
            }, function(){
                $(obj).parent().parent().remove();
                $.ajax({
                    url:'/action/delmovie',
                    type:'post',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data:{dyid:$(obj).attr('goodid')},
                    dataType:'json',
                    success:function (data) {
                        layer.msg(data.msg);
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
                })
            });
        }
    </script>

@endsection()