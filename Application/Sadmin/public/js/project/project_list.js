var projectList = {
    filter: {},
    init: function() {
        _this = this;
        $('#search').on('click', function() {
            var keyword = $('#keywords').val();
            // alert(keyword);
            // return false;
            if (!keyword) {
                parent.layer.alert("请输入要查询的关键字");
                return false;
            }
            _this.filter.keyword = keyword;
            dataTable.api().ajax.reload();
        });
        dataTable = $('#table_id').dataTable({
            "processing": false,
            "serverSide": true,
            "scrollX": true,    
            "searching": false,
            "ordering": false,
            "paging": true,
            "bAutoWidth": false, //是否自适应宽度
            "aLengthMenu": [
                [10, 50, 150],
                [10, 50, 150]
            ],
            "dom": 'rt<"bottom"iflp<"clear">>',
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                "url": project_list_data_url,
                "data": function(d) {
                    var filter = {};
                    //添加额外的参数传给服务器
                    // filter.source = "ttt";
                    // filter.dian_id = getUrlParam(window.location.href, 'dian_id');
                    d.extra_search = _this.filter;
                }
            },
            language: {
                "sProcessing": "处理中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sZeroRecords": "没有匹配结果",
                "sInfo": "显示第 _START_ 至 _END_ 项结果，共 _TOTAL_ 项",
                "sInfoEmpty": "显示第 0 至 0 项结果，共 0 项",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "sInfoPostFix": "",
                "sSearch": "搜索:",
                "sUrl": "",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoThousands": ",",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "oAria": {
                    "sSortAscending": ": 以升序排列此列",
                    "sSortDescending": ": 以降序排列此列"
                }
            }
        });
    }
}
