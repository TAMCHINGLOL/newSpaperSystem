var userList = {
    filter: "",
    init: function() {
        _this = this;
        $('#search').on('click', function() {
            var keyword = $('#keywords').val();
            var auditState = $('#audit_state').val();
            //alert(auditState);return false;
            var filters = new Array();
            filters[0] = auditState;
            filters[1] = keyword;
            _this.filter = filters;
            dataTable.api().ajax.reload();
        });
        dataTable = $('#table_id').dataTable({
            "processing": false,
            "serverSide": true,
            "scrollX": false,
            "searching": false,
            "ordering": false,
            // ordering: false,//是否启用排序
            "paging": true,
            "bAutoWidth": true, //是否自适应宽度
            // "aaSorting": [
            //     [1, "desc" ]
            // ],
            "aLengthMenu": [
                [10, 20, 30],
                [10, 20, 30]
            ],
            "dom": 'rt<"bottom"iflp<"clear">>',
            "ajax": {
                url: userList_url,
                data: function(d) {
                    d.extraSearch = _this.filter;
                }
            }, columnDefs: [{                                                       //配置最后一列样式
                targets: 10,
                render: function (data, type, row, meta) {                      //配置编辑样式并指定触发事件(参数:当前行记录)
                    if(row[9] == 1){
                        return '<button onclick=\'userList.isPass(\"'+row[1]+'\",\"'+row[2]+'\",\"2\")\' class="btn btn-xs btn-primary center">' +
                            '<i class="ace-icon fa fa-unlock"></i> 白名单 </button>';
                    }else{
                        return '<button onclick=\'userList.isPass(\"'+row[1]+'\",\"'+row[2]+'\",\"1\")\' class="btn btn-xs btn-danger center">' +
                            '<i class="ace-icon fa fa-lock"></i> 黑名单 </button>';
                    }

                },
                orderable: false,                                        //禁止排序
            },{
                targets: 9,
                visible: false
            }],
            language: {
                "sProcessing": "玩命加载中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "暂无查询结果",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                // "oAria": {
                //     "sSortAscending": ": 以升序排列此列",
                //     "sSortDescending": ": 以降序排列此列"
                // }
            },
        });
    },

    isPass: function(uid,phone,status){
        //alert(title);return false;
        if(uid && phone && status){
            var title;
            if(status == 2){
                title = '确 定 拉 黑 该 用 户 ？';
            }else{
                title = '确 定 恢 复 该 用 户 ？';
            }
            layer.confirm(title,function(){
                $.ajax({
                    url: isDefriend_url,
                    type: 'post',
                    dataType: 'json',
                    data: {uid: uid,phone: phone, status: status},
                    success: function(result){
                        if(result.status == 1){
                            layer.msg(result.info,{time: 3000},function(){
                                parent.ifm.contentWindow.location.reload(true); //关闭前刷新
                                return false;
                            });
                        }else{
                            layer.alert(result.info,{icon: 6});
                            return false;
                        }
                    }
                })
            });
        }
    }
}
