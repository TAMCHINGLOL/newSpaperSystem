var userList = {
    filter: {},
    init: function() {
        _this = this;
        $('#search').on('click', function() {
            var keyword = $('#keywords').val();
            var auditState = $('#audit_state').val();
            // if (!keyword) {
            //     parent.layer.alert("请输入要查询的关键字");
            //     return false;
            // }
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
                "url": articleList_url,
                "data": function(d) {
                    var filter = {};
                    //添加额外的参数传给服务器
                    // filter.source = "ttt";
                    // filter.dian_id = getUrlParam(window.location.href, 'dian_id');
                    d.extraSearch = _this.filter;
                    d.status = 3;
                }
            }, columnDefs: [{                                                       //配置最后一列样式
                targets: 7,
                render: function (data, type, row, meta) {                      //配置编辑样式并指定触发事件(参数:当前行记录)
                    if(row[6] == 2){
                        return'<button onclick=\'userList.checkAttr1(\"'+row[0]+'\",\"'+row[2]+'\")\' class="btn btn-xs btn-primary center" style="margin-right: 10px">' +
                            '<i class="ace-icon fa fa-search"></i> 查看详情  </button>'+
                            '<button onclick=\'userList.isTop(\"'+row[0]+'\",\"'+1+'\")\' class="btn btn-xs center">' +
                            '<i class="ace-icon fa fa-archive"></i> 已在优文箱  </button>';
                    }else{
                        return'<button onclick=\'userList.checkAttr1(\"'+row[0]+'\",\"'+row[2]+'\")\' class="btn btn-xs btn-primary center" style="margin-right: 10px">' +
                            '<i class="ace-icon fa fa-search"></i> 查看详情  </button>'+
                            '<button onclick=\'userList.isTop(\"'+row[0]+'\",\"'+2+'\")\' class="btn btn-xs btn-danger center">' +
                            '<i class="ace-icon fa fa-archive"></i> 加入优文箱  </button>';
                    }
                },
                orderable: false,                                        //禁止排序
            },{
                targets: 6,
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

    checkAttr1: function(artid,title){
        //alert(title);return false;
        var urlRequest = article_url;
        var titleName = '<span style="font-size: 14px;color: #35B57A;line-height: 26px">文章阅读：'+title+'</span>';
        if(artid) {
            urlRequest += '/artid/' + artid;
            parent.layer.open({
                type: 2,
                title: titleName,
                shadeClose: true,
                shade: true,
                scrollbar: true,
                maxmin: true,
                area: ['85%', '85%'],
                content: urlRequest,
                end: function () {
                }
            });
        }
    },

    isTop: function(artId,status){
        if(artId){
            var title;
            if(status == 1){
                title = '取 消 存 放 优 文 箱 ？';
            }else{
                title = '确 认 放 置 优 文 箱 ？';
            }
            layer.confirm(title,function() {
                $.ajax({
                    url: isBox_url,
                    type: 'post',
                    dataType: 'json',
                    data: {artId: artId, status:status},
                    success: function (result) {
                        parent.ifm.contentWindow.location.reload(true); //关闭前刷新
                        if (result.status == 1) {
                            layer.msg(result.info, {time: 3000}, function () {
                                parent.layer.closeAll();
                                return false;
                            });
                        } else {
                            layer.msg(result.info, {icon: 6});
                            return false;
                        }
                    }
                })
            });
        }
    }
}
