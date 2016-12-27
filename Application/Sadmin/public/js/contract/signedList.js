/**
 * Created by ludezheng on 2016/8/15.
 */
var contracts = {
    init: function () {                                     //自定义contracts对象初始化方法
        _this = this;                                       //定义自身指针

        $("#add_contract").on('click', function () {       //触发添加新模板按钮事件
            _this.add_contracts();
        });

        table = $('#table_id1').dataTable({               //初始化dataTable示例 并赋予一个对象
            "processing": true,
            "serverSide": true,
            "searching": false,
            "ordering": true,
            "paging": true,
            //"scrollX": false,
            //"bAutoWidth": true, //是否自适应宽度
            "dom": 'rt<"bottom"iflp<"clear">>',
            "aLengthMenu": [
                [10, 20, 40],
                [10, 20, 40]
            ],
            ajax: get_contractsList_url,
            language: {
                //lengthMenu: '<select class="form-control input-xsmall">' + '<option value="10">10</option>' + '<option value="20">20</option>' + '<option value="30">30</option>' + '<option value="40">40</option>' + '<option value="50">50</option>' + '</select>条记录', //左上角的分页大小显示
                "sProcessing": "处理中...",
                "sLengthMenu": "显示 _MENU_ 项结果",
                "sEmptyTable": "表中数据为空",
                "sLoadingRecords": "载入中...",
                "sInfoFiltered": "(由 _MAX_ 项结果过滤)",
                "oPaginate": {
                    "sFirst": "首页",
                    "sPrevious": "上页",
                    "sNext": "下页",
                    "sLast": "末页"
                },
                "sZeroRecords": "没有匹配结果",                                     //tbody内容为空时提示
                info: "共 _PAGES_  页，显示_START_ -_END_，共 _TOTAL_ 项",          //左下角的信息显示
                infoEmpty: "0条记录",                                             //筛选为空时左下角的显示
                infoFiltered: "",                                                //筛选之后的左下角筛选提示
            },
            "columnDefs": [{                                                       //配置最后一列样式
                targets: 6,
                render: function (data, type, row, meta) {                      //配置编辑样式并指定触发事件(参数:当前行记录)
                    return '<button onclick=\'contracts.find_contract(\"'+row[0]+'\")\' class="btn btn-xs btn-primary center"><i class="ace-icon fa fa-search bigger-110"></i>查 看</button>';
                },
                orderable:false                                               //禁止列[0,1,2,3,6]排序
            },{
                targets: 0,
                orderable: false
            },{
                targets: 1,
                orderable: false
            },{
                targets: 2,
                orderable: false
            },{
                targets: 3,
                orderable: false
            }],
            "aaSorting": [[5,"desc"]]
        });
    },

    find_contract: function (id) {                                              //编辑合同模板函数
        if (id) {
            get_contractsMsg_url += '/contractId/' + id;
            parent.layer.open({                                                //指定当前页面弹出层
                type: 2,
                title: "合 同 详 情",
                shadeClose: false,
                shade: true,
                scrollbar: true,                                                //开启滚动
                maxmin: true,                                                   //开启最大化最小化按钮
                area: ['90%', '90%'],
                content: get_contractsMsg_url,                                  //指定ajax响应路径(后台处理绑定模板跳转Url)
                end: function() {}
            });
        }
    },

};
