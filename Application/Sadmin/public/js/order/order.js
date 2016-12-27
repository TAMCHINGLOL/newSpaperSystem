$(document).ready(function() {
    var filter={};
    $('#table_id').dataTable( {
        "processing": true,
        "serverSide": true,
        "searching": false,//搜索
        "ajax": get_orderList_url,
        language: {
            lengthMenu: '<select class="form-control input-xsmall">' + '<option value="10">10</option>' + '<option value="20">20</option>' + '<option value="30">30</option>' + '<option value="40">40</option>' + '<option value="50">50</option>' + '</select>条记录',//左上角的分页大小显示。
            search: '<span class="label label-success">搜索：</span>',//右上角的搜索文本，可以写html标签
            data:filter,
            paginate: {//分页的样式内容。
                previous: "上一页",
                next: "下一页",
                first: "第一页",
                last: "最后一页"
            },
            zeroRecords: "没有内容",//table tbody内容为空时，tbody的内容。
            //下面三者构成了总体的左下角的内容。
            info: "总共_PAGES_ 页，显示第_START_ 到第 _END_ ，筛选之后得到 _TOTAL_ 条，初始_MAX_ 条 ",//左下角的信息显示，大写的词为关键字。
            infoEmpty: "0条记录",//筛选为空时左下角的显示。
            infoFiltered: ""//筛选之后的左下角筛选提示，
        },
        // columnDefs: [{
        //     //   指定第最后一列
        //     targets: 14,
        //     render: function(data, type, row, meta) {
        //         return '<button type="button"  href="#" onclick="showConsignee('+row[14]+',\''+row[1]+'\')">查看</button>';
        //     }
        // }]
    } );

} );

