var goods = {
    init: function() {
        _this = this;
        $('#add_goods').on('click', function() {
            _this.goods_public(0);
        });
        $('#import_goods').on('click', function() {
            _this.importGoods();
        });
        $('#search').on('click', function() {
            var keyword = $("#keywords").val(); 
            var goodCategory= $("#goodCategory").val(); //类别
            var goodBrand= $('#goodBrand').val(); //品牌
            var mycars=new Array();
            mycars[0] = keyword;
            mycars[1] = goodCategory;
            mycars[2] = goodBrand;
            _this.filter = mycars;
            table.api().ajax.reload();
        });
        table = $('#table_id').dataTable({
            "processing": true,
            "serverSide": true,
            "scrollX": false,
            "searching": false,
            "ordering": true,
            "paging": true,
            "bAutoWidth": true, //是否自适应宽度
            "aLengthMenu": [
                [10, 50, 150],
                [10, 50, 150]
            ],
            "dom": 'rt<"bottom"iflp<"clear">>',
            "order": [
                [0, "desc"]
            ],
            "ajax": {
                "url": get_goodsList_url,
                "data": function(d) {
                    d.searchValue = _this.filter;
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
            },
            // columnDefs: [{
            //     //   指定第最后一列
            //     targets: 6,
            //     render: function(data, type, row, meta) {
            //         return '<button onclick="goods.goods_public(' + row[0] + ')" class="btn btn-xs btn-primary"><i class="ace-icon fa fa-pencil-square-o bigger-110"></i>编辑 </button> <button onclick="goods.goods_del(' + row[0] + ')" class="btn btn-xs btn-danger"><i class="ace-icon fa fa-trash-o bigger-110"></i>删除 </button>';

            //     },
            //     orderable: false
            // }]
        });
    },
    /**
     * //商品发布弹出窗口
     * @param  {[type]} obj [description]
     * @param  {[type]} gid [description]
     * @return {[type]}     [description]
     */
    goods_public: function(gid) {
        var url = goodsPublicUrl;
        if (gid) {
            url += '/template_id/' + gid;
        }

        parent.layer.open({
            type: 2,
            title: '添加/编辑商品管理',
            shadeClose: true,
            shade: true,
            scrollbar: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['90%', '90%'],
            content: url,
            end: function() {}
        });
    },

    importGoods: function() {
        parent.layer.open({
            type: 2,
            title: '导入商品',
            shadeClose: true,
            shade: true,
            scrollbar: false,
            maxmin: true, //开启最大化最小化按钮
            area: ['90%', '90%'],
            content: importGoodsUrl
        });
    },
    goods_del: function(gid) {
        var confirmDel = parent.layer.confirm('确定要删除此商品？', {
            btn: ['确定', '取消'] //按钮
        }, function() {
            parent.layer.close(confirmDel);
            var loadingIndex = parent.layer.load(2, {
                shade: [0.5, '#fff'] //0.1透明度的白色背景
            });
            $.ajax({
                url: delParentGoodsUrl,
                type: 'post',
                dataType: 'json',
                data: {goodsParentId: gid},
                success: function(result){
                    if(result.status == 1){
                        parent.layer.close(loadingIndex);
                        layer.msg('删 除 成 功',{time: 3000});
                        table.api().ajax.reload();
                    }else if(result.status == 0){
                        parent.layer.close(loadingIndex);
                        layer.alert(result.info,{icon: 6});
                    }
                },error: function(){
                    parent.layer.close(loadingIndex);
                    layer.alert("系统繁忙,请稍后再试");
                }
            });
            //$.post(delParentGoodsUrl, { "goodsParentId": gid },
            //    function(data) {
            //        parent.layer.close(loadingIndex);
            //        if (data.status == 1) {
            //            table.api().ajax.reload();
            //        } else if(data.status == 0) {
            //            layer.alert(data.info);
            //        }
            //    });
        }, function() {

        });

    }
};
