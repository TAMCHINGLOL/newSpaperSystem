/**
 * Created by ludezheng on 2016/8/12.
 */
var contracts = {
    init: function () {                                     //自定义contracts对象初始化方法
        _this = this;                                       //定义自身指针

        $("#add_contract").on('click', function () {           //触发添加新模板按钮事件
            _this.add_contracts();
        });

        table = $('#table_id1').dataTable({               //初始化dataTable示例 并赋予一个对象
            processing: true,                             //开启进度条提示
            serverSide: true,                             //开启服务器端处理(用于接收ajaxSource)
            searching: false,                             //禁止开启搜索
            ajax: get_contractsListData_url,
            language: {
                "sProcessing": "<div align='center' style='font-family: "+'Open Sans'+",font-size: 14px;color: grey'>拼 命 加 载 中...</div>",
                lengthMenu: '<select class="form-control input-xsmall"><option value="10">全部</option></select>条记录', //左上角的分页大小显示
                paginate: {                                                   //分页的样式内容
                    previous: "上一页",
                    next: "下一页",
                    first: "第一页",
                    last: "最后一页"
                },
                zeroRecords: "没有匹配结果...",                                    //tbody内容为空时提示
                //下面三者构成了总体的左下角的内容。
                info: "共 1 页，显示_START_ - _TOTAL_ ，共 _TOTAL_ 条记录",          //左下角的信息显示
                infoEmpty: "0条记录",                                              //筛选为空时左下角的显示
                infoFiltered: "",                                                 //筛选之后的左下角筛选提示
            },
            columnDefs: [{                                                       //配置最后一列样式
                targets: 3,
                render: function (data, type, row, meta) {                      //配置编辑样式并指定触发事件(参数:当前行记录)
                    return '<button onclick=\'contracts.update_contracts(\"'+row[0]+'\")\' class="btn btn-xs btn-primary center"><i class="ace-icon fa fa-pencil-square-o bigger-110"></i>编辑 </button>' +
                        '&nbsp;&nbsp;&nbsp;<button onclick=\'contracts.delete_contracts(\"'+row[0]+'\")\' class="btn btn-xs btn-danger center"><i class="ace-icon fa fa-pencil-square-o bigger-110"></i>删除 </button>';
                },
                orderable: false                                        //禁止排序
            },{
                targets: 0,
                orderable: false
            },{
                targets: 1,
                orderable: false
            },{
                targets: 2,
                orderable: false
            },]
        });
    },


    update_contracts: function (id) {                                          //编辑合同模板函数
        if (id) {
            update_contracts_url += '/contractId/' + id;
            parent.layer.open({                                                 //指定当前页面弹出层
                type: 2,
                title: "编辑合同模板",
                shadeClose: true,
                shade: true,
                scrollbar: true,                                                //开启滚动
                maxmin: true,                                                   //开启最大化最小化按钮
                area: ['90%', '90%'],
                content: update_contracts_url,                                  //指定ajax响应路径(后台处理绑定模板跳转Url)
                end: function() {
                    table.api().ajax.reload();                                  //刷新当前table
                    //parent.ifm.contentWindow.location.reload(true);           //刷新当前iframe
                }
            });
        }
    },

    add_contracts: function () {                                            //新增合同模板函数
        parent.layer.open({                                                 //指定当前页面弹出层
            type: 2,
            title: "新增合同模板",
            shadeClose: false,
            shade: true,
            scrollbar: true,                                                //开启滚动
            maxmin: true,                                                   //开启最大化最小化按钮
            area: ['90%', '90%'],
            content: add_contracts_url,                                     //指定ajax响应路径(后台处理绑定模板跳转Url)
            end: function() {
                table.api().ajax.reload();
            }
        });
    },

    delete_contracts: function(id){
        var confirmLayer = parent.layer.confirm("确定删除该模板?",                 //弹出确认删除框
            {btn: ['确定','取消']},
            function(){
                parent.layer.close(confirmLayer);                               //点击确认后关闭
                $.ajax({
                    url: delete_contract_url,                                   //执行删除
                    type: "post",
                    dataType: "json",
                    data: {contractId:id},
                    success: function(result){
                        if(result.status == 1){
                            parent.layer.msg('<i class="icon-refresh"></i>&nbsp;&nbsp;成 功 删 除',
                                {icon: 6,time: 2000},
                                function(){
                                    layer.closeAll();
                                    table.api().ajax.reload();
                                }
                            );
                        }else if(result.status == 0){
                            parent.layer.msg(result.info);
                        }
                    },
                    error: function(){
                    parent.layer.msg("删除失败", {
                        icon: 5,
                        time: 3000
                        });
                    }
                });
            }
        )
    }

};
