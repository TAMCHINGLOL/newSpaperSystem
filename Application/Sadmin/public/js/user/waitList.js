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
                "url": articleList_url+'/type/'+1,
                "data": function(d) {
                    var filter = {};
                    //添加额外的参数传给服务器
                    // filter.source = "ttt";
                    // filter.dian_id = getUrlParam(window.location.href, 'dian_id');
                    d.extraSearch = _this.filter;
                    d.status = 2;
                }
            }, columnDefs: [{                                                       //配置最后一列样式
                targets: 6,
                render: function (data, type, row, meta) {                      //配置编辑样式并指定触发事件(参数:当前行记录)
                    return '<button onclick=\'userList.checkAttr(\"'+row[0]+'\")\' class="btn btn-xs btn-primary center">' +
                        '<i class="ace-icon fa fa-pencil-square-o bigger-110"></i> &nbsp;审&nbsp;&nbsp;核&nbsp;&nbsp; </button>';
                },
                orderable: false,                                        //禁止排序
            },{
                //targets: 5,
                //orderable: true
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

    checkAttr: function(uid){
        var urlRequest = artDetail_url;
        if(uid){
            urlRequest += '/articleDetailsArtId/' + uid;
        }
        parent.layer.open({
            type: 2,
            title: " 文 章 审 核",
            shadeClose: false,
            shade: true,
            scrollbar: true,
            maxmin: true,
            area: ['90%','90%'],
            content: urlRequest,
            end: function(){}
        });
    }
}
